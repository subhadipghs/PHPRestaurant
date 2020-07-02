<?php
	try 
	{
		if ($_SERVER['REQUEST_METHOD'] != 'POST' || !file_exists('database/database.php'))
		{
			throw new Exception("Database file not exists");
		}
		else
		{
			require 'database/database.php';
		}
	} 
	catch(Exception $e)
	{
		echo $e->getMessage();
		exit();
	}


	$email = $_POST['email'] ?? null;
	$password = $_POST['password'] ?? null;

	if (empty($email) || empty($password)) 
	{
		$error = array(
			"response" => "failure",
			"message" => "Empty Field(s) deteceted"
		);
		echo json_encode($error);
		exit();
	}

	$db = new Database('localhost', 'project', 'root', '');
	$connection = $db->connect();
 	


	$query = $connection->prepare("SELECT * FROM customer WHERE email=?");

	$query->execute([$email]);

	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	if ($row["password"] !== $password) 
	{
		$error = array(
			"message" => "Password or email mismatch"
		);
		header('Location: ../login.php?message='.$error["message"]);
	} 
	else 
	{
		session_start();
		$_SESSION['customer'] = explode(" ", $row["cust_name"])[0];
		$_SESSION['customer_id'] = md5($mobile);
		$redirectTo = '..\index.php';
		header('Location: '.$redirectTo);
	}