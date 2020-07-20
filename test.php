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
			if (!preg_match($regx[$indexed], $fields[$indexed])) 
			{
				return false;
			}
		}
		return true;
	}


	$regex_name =  '/^[A-Za-z]+[\sA-Za-z]+$/';
	/**
	 * Regex for email 
	 * @var string
	 */
	$regex_email = '/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/';
	/**
	 * Regex for password containing one special character, one number and one caps minimum 8 character
	 * @var string
	 */
	$regex_password = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/';
	$regex_mobile = '/^(\+\d{1,3}\s)?\d{10}$/';



	$name = 'Subhadip Nath Ghosh';
	echo preg_match($regex_name, "Subhadip Nath Ghosh");

	// $email = 'ghosh1gsa1@gmail.com';
	// echo preg_match($regex_email, "ghosh.po m12_@gmail.com");
	// $password= 'Affas0?sadf';
	// $mobile = '`9163267177';
	
	// echo preg_match($regex_password, $password);
	// echo preg_match($regex_mobile, $mobile);

	// echo preg_match('/\d{4}-\d{4}-\d{4}-\d{4}/', '2222-2222-2222-2222');
	// echo preg_match('/^[A-Za-z\s]+$/', 'Himachhar pradeshh342');
	// echo preg_match('/^[A-Za-z0-9\s\,\.]+$/', 'K. P. Roy Lane3');