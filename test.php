<?php 
	

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
			// echo $regx[$indexed].' => '.$fields[$indexed].PHP_EOL;
			echo preg_match($regx[$indexed], $fields[$indexed]);
			if (!preg_match($regx[$indexed], $fields[$indexed])) 
			{
				return false;
			}
		}
		return true;
	}


	$regex_name = '/^[(A-Z)?(a-z)?(0-9)?\s*]+$/';
	$regex_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
	$regex_password = '/[A-Za-z1?\??-?_?!?@?#?$?%?^?&?*?\(?\)]{8,}+/';
	$regex_mobile = '/?(\d{1, 3})?\d{10}$/';



	$name = 'SubhadipGhosh';
	$email = 'ghosh1gsa1@gmail.com';
	$password= 'Aasdffidds';
	$mobile = '919163267177';

	echo formFieldsValidator(array($name, $email, $password, $mobile), array($regex_name, $regex_email, $regex_password, $regex_mobile)) ? 'done' : 'not done';