<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width, initial-width=1.0"> 
		<link rel="shortcut icon" type="image/x-icon" href="public/icon/favicon.ico"/>
		<title>Login</title>
		<link rel="stylesheet" href="public/css/register.css">
		<style>
			 @font-face {
			      font-family: 'Playfair Display Italic';
			      src: url('public/fonts/PlayfairDisplay-Italic.ttf');
			}
			 @font-face {
				font-family: 'Playfair Display';
				src: url('public/fonts/PlayfairDisplay-Regular.ttf');
			}
			body {
				box-sizing: border-box;
				margin: 0 auto;
			}
			.flex-container	{
				width: 100vw;
				height: 100vh;
				display: flex;
				align-items: center;
			}

			.first {
				background-image: url("public/images/restaurant-table.jpg");
				height: 100vh;
				width: 70vw;
				background-position: center;
				background-repeat: no-repeat;
				/*filter: blur(1px);*/
			}
			.second {
				background-color: #212121;
				width: 30vw;
				height: 100vh;
			}
			.form {
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
			}
			.header {
				font-family: 'Playfair Display', serif;
				text-align: center;
				margin-top: 40vh;
				color: white;
				font-size: 3.5em;
				font-weight: bold;
				letter-spacing: 2px;
			}
			.header-line {
				font-family: 'Playfair Display Italic', serif;
				text-align: center;
				margin-top: 10vh;
				font-weight: bolder;
				color: white;
				font-size: 2em;
			}
			.input-style {
				font-family: 'Playfair Display', serif;
				color: white;
				border-bottom: 1px solid white;
				border-right: none;
				border-left: none;
				border-top: none;
				margin: 20px 0px;
				width: 80%;
				padding: 10px;
				font-size: 14px;
				background-color: #212121;
			}
			input:focus {
				outline: none;
				border-bottom: 1px solid crimson;
			}
			#name {
				margin-top: 12vh;
			}
			.submit {
				font-style: normal;
				margin-top: 4vh;
				font-family: 'Playfair Display';
				color: white;
				background-color: firebrick;
				cursor: pointer;
				padding: 10px 15px;
				font-size: 15px;
				border: none;
				border-radius: 30px;
				box-shadow:  0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
			}


			::-webkit-input-placeholder { /* Chrome/Opera/Safari */
				color: #eeeeee;
			}
			::-moz-placeholder { /* Firefox 19+ */
				color: #eeeeee;
			}
			:-ms-input-placeholder { /* IE 10+ */
				color: #eeeeee;
			}
			:-moz-placeholder { /* Firefox 18- */
				color: #eeeeee;
			}


			.error {
				font-family: 'Playfair Display', serif;
				background-color: #212121; padding-top: 4%; text-align: center;
				color: rgb(255, 0, 0);
			}

			
			@media only screen and (max-width: 978px) {
				.first {
					display: none;
				}
				.flex-container {
					flex-direction: column;
				}
				.second {
					width: 100vw;
					height: 100vh;
				}
				.header-line {
					display: block;
					font-family: 'Playfair Display', serif;
					text-align: center;
					margin-top: 10vh;
					font-weight: bolder;
					color: white;
					font-size: 2em;
				}
				#name {
					margin-top: 2vh;
				}
				.submit {
					margin-top: 0;
				}
			}


		</style>
	</head>
	<body>
		<div class="flex-container">
			<div class="first">
				<div class="header">
					Login 
				</div>
			</div>
			<div class="second">	
				<div class="header-line">
					Welcome Back, Buddy 🤩
				</div>
				<form action="" method="POST" class="form" onsubmit="submit()">
					<input type="text" name="email" id="name" class="input-style" placeholder="Email">
					<input type="password" name="password" class="input-style" placeholder="Password">
					<input type="submit" name="submit" class="submit" value="Submit 🍔">
				</form>
				<?php
					if (isset($_POST['email']) && isset($_POST['password'])) {
						try 
						{
							if (!file_exists('./backend/database/database.php'))
							{
								throw new Exception("Database file not exists");
							}
							else
							{
								require 'backend/database/database.php';
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
							echo '<div class="error">Empty Fields</div>';
							exit();
						}
						try {	
							$db = new Database('localhost', 'project', 'root', '');
							$connection = $db->connect();
							$query = $connection->prepare("SELECT * FROM customer WHERE email=?");
							$query->execute([$email]);
							$row = $query->fetch(PDO::FETCH_ASSOC);
						} catch(Exception $e) {
							echo '<div class="error"> '.$e->getMessage().' </div>';
						}

						if (!$row) {
							echo '<div class="error"> User not found </div>';
							exit();
						}

						$real_password = $row["password"];
						if ($password !== $real_password) 
						{
							echo '<div class="error">Invalid password or email</div>';
							exit();
						} 
						else 
						{
							session_start();
							$_SESSION['customer_id'] = explode(" ", $row["cust_name"])[0];
							$redirectTo = 'index.php';
							header('Location: '.$redirectTo);
						}
					}
				?>
			</div>
		</div>
	</body>
</html>