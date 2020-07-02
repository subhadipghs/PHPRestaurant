<?php
	
	date_default_timezone_set('Asia/Kolkata');
	
	function formFieldsValidator(array $fields, array $regx) : bool
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
		for ($indexed = 0; $indexed < count($fields); $indexed++) 
		{
			if (!preg_match($regx[$indexed], $fields[$indexed])) 
			{
				return false;
			}
		}
		return true;
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

	
	$regex_name = '/^[(A-Z)?(a-z)?(0-9)?\s*]+$/';
	$regex_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
	$regex_password = '/[A-Za-z1?\??-?_?!?@?#?$?%?^?&?*?\(?\)]{8,}+/';
	$regex_mobile = '/^\d{10}$/';

	if (!formFieldsValidator(array($name, $email, $password, $mobile), array($regex_name, $regex_email, $regex_password, $regex_mobile))) 
	{
		echo '<div class="error text-center mt-4">Invalid Inputs</div>';
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

			$_SESSION['customer_id'] = explode(" ", $name)[0];
			$_SESSION['customer'] = md5($mobile);
			$redirectTo = '..\index.php';
			header('Location: '.$redirectTo);
	}

