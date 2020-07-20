<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-width=1.0"> 
	<link rel="shortcut icon" type="image/x-icon" href="public/icon/favicon.ico"/>
	<title>Forks &amp; Spoons</title>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


	<style>
		 @font-face {
	      font-family: 'Playfair Display Italic';
	      src: url('public/fonts/PlayfairDisplay-Italic.ttf');	
		}

		 @font-face {
			font-family: 'Playfair Display';
			src: url('public/fonts/PlayfairDisplay-Regular.ttf');
		}


		.main-text {
			font-family: 'Playfair Display';
			overflow-x: none;
			background-image: url('public/images/background-edit.jpg');
			height: 91.5vh;
			width: 100vw;
			background-position: center;
			resize: both;
			color: white;
			font-size: 4em;
			letter-spacing: 3px;
			font-weight: bolder;
			text-align: center;
			padding-top: 10%;
		}
		.text-container {
			font-family: 'Playfair Display Italic';
			font-size: 25px;
			margin-top: 1%;
			margin-bottom: 2%;

		}
		.button {
			font-family: 'Playfair Display Italic';
			background-color: firebrick;
			cursor: pointer;
			padding: 10px 15px;
			letter-spacing: 1px;
			font-size: 16px;
			border: none;
			border-radius: 30px;
			box-shadow:  0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
		}

		.button:hover {
			background-color: crimson;
		}

		.button:focus {
			background-color: crimson !important;
		}
		

	</style>

</head>
<body>
	<!-- NAVBAR -->
	<nav class="grey darken-4" style="font-family: 'Playfair Display'; box-shadow: 0 0px 0px rgba(0,0,0,0) !important;">
		<div class="nav-wrapper">
			<a href="#" style="padding-left: 20px" class="brand-logo">
				<span class="red darken-3" style="font-family: 'Playfair Display Italic'; color: white; font-weight: bold; border-radius: 25px; padding: 4px 10px; font-style: italic;">Forks &amp; Spoons</span>
			</a>
			<ul class="right">
				<li id="home"><a style="font-weight: 500; font-size: 1.2em;" href="index.php">Home</a></li>
				<li id="about"><a style="font-weight: 500; font-size: 1.2em;" href="about.php">About</a></li>
				<li id="foods"><a style="font-weight: 500; font-size: 1.2em;" href="foods.php">Foods</a></li>
				<?php
					if (!isset($_SESSION['customer_id'])) 
					{
						echo '<li><a class="btn waves-effect waves-light red darken-3" style="border-radius: 25px; font-size: 1.1em; text-transform: capitalize;" href="login.php">Login</a></li>';
						echo '<li><a class="btn effect waves-light red darken-3" style="color: white; text-transform: capitalize; font-size: 1.1em; margin-left: -2px; border-radius: 25px;" href="register.php">Register</a></li>';
					} 
					else 
					{
						echo '<li><a class="btn waves-effect waves-light red black darken-3" style="border-radius: 25px; " href="backend/logout.php">Logout</a></li>';
					}
				?>
			</ul>
		</div>
	</nav>

	<!-- BODY PART -->
	<div class="main-text">
		<?php 
			if(!isset($_SESSION['customer_id'])) {
				echo 'FRESH &amp; DELICIOUS';
				echo '<div class="text-container">
						Unexpected flavours forged from nature and mingled with flourish
					</div>';
			} else {
				echo 'Welcome, '.$_SESSION['customer_id'];
			}
		?>
		<div class="btn-container">
			<a href="foods.php" class="button white-text">
				Find More 🍕
			</a>
		</div>
	</div>
	
	<!-- Footer -->
		

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>        
	<script src="vendor/materialize/js/materialize.min.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>