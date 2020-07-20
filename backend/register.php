<?php

date_default_timezone_set('Asia/Kolkata');

function formFieldsValidator(array $fields, array $regx) : string
{
	try 
	{
		if (count($fields) !== count($regx)) 
		{
			throw new Exception('Number of Fields and Regexes must be equal');
		}
	} 
	catch (Exception $e) 
	{
		echo $e->getMessage();
		exit();
	}

	$errors = '';

	for ($i = 0; $i < count($fields); $i++)
	{
		if (!preg_match($regx[$i], $fields[$i])) 
		{
			switch($i) 
			{
				case 0: $errors .= 'Name (It must contain only alphabets), <br>'; break;
				case 1: $errors .= 'Email (correct format is username@host.com|net) <br>'; break;
				case 2: $errors .= 'Password (It must contain atleast 8 characters(1 Capital, 1 Special character, 1 number) <br>'; break;
				case 3: $errors .= 'Mobile Is Incorrect (only 10 character)'; break;
			} 
		}
	}
	return $errors;
}




$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$address = $_POST['address'] ?? null;
$mobile = $_POST['mobile_no'] ?? null;
$confirm_password = $_POST['confirm_password'] ?? null;

if (empty($name) || empty($email) || empty($password) || empty($address) || empty($mobile) || empty($confirm_password)) 
{
	echo '<div class="error text-center mt-4">Please, Fill all the fields</div>';
	exit();
}


$regex_name =  '/^[A-Za-z]+[\sA-Za-z]+$/';
$regex_email = '/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/';
$regex_password = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/';
$regex_mobile = '/^(\+\d{1,3}\s)?\d{10}$/';
$errorMessages = formFieldsValidator(array($name, $email, $password, trim($mobile)), array($regex_name, $regex_email, $regex_password, $regex_mobile)); 
if ($errorMessages != '') 
{
	echo '<div class="error text-center mt-4">'.$errorMessages.'</div>';
	exit();
}



$host = 'localhost';
$database = 'project';
$user = 'root';
$pwd = '';


try 
{
	$connection = new PDO("mysql:host=$host; dbname=$database", $user, $pwd, array( PDO::ATTR_PERSISTENT => true ));
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
	echo $e->getMessage().PHP_EOL;
	exit();
}


$timest = date("d:m:Y h:i:sa");

$query = $connection->prepare("SELECT * FROM customer WHERE email=?");
$query->execute([htmlspecialchars($email)]);

if (count($query->fetchAll(PDO::FETCH_ASSOC))) 
{
	echo '<div class="error mt-4 text-center"> You\'re already Registered! 🙄 </div>';
	exit();
}


$sql =
"INSERT INTO customer(cust_id, cust_name, address, phone_no, email, password) VALUES(?, ?, ?, ?, ?, ?)";
$insertQuery = $connection->prepare($sql);



if ($insertQuery->execute([$timest, $name, $address, $mobile, $email, $password]))
{
	session_start();
	ob_start();
	$_SESSION['customer_id'] = explode(" ", $name)[0];
	$_SESSION['customer'] = md5($mobile);
	$redirectTo = '..\index.php';
	header('Location: '.$redirectTo);
}