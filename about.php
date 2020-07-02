<?php
	session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>About</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="site.webmanifest">
	<link rel="shortcut icon" type="image/x-icon" href="public/icon/favicon.ico">
	<!-- Place favicon.ico in the root directory -->
	<!-- <link rel="stylesheet" href="css/normalize.css"> -->
	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="vendor/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="public/css/about.css">
	<style>
		@font-face {
			font-family: 'Playfair Display';
			src: url('../fonts/PlayfairDisplay-Regular.ttf');
		}

		* {
			/*outline: 4px solid green;*/

		}
		body {
			box-sizing: border-box;
			margin: 0 auto;
			scroll-behavior: smooth;
			overflow-x: hidden;
		}


		.about-container {
			width: 100vw;
			height: 91.4vh;
			background-image: url('public/images/our-story.jpg');
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			text-align: center;
		}

		.header-2 {
			font-family: 'Playfair Display', serif;
			padding-top: 10vh;
			font-size: 3em;
			text-align: center;
			font-weight: bolder;
			color: white;
		}
		.f-c {
			display: flex;
			justify-content: center;
			-ms-align-items: center;
			align-items: center;
		}
		.s-divider {
			width: 40%;
			/*text-align: center;*/
			border-top: 2px solid crimson;
			line-height: 0.1em;
			font-size: 20px;
			margin: 15px;
		}

		.wh-100 {
			width: 100vw;
			height: 100vh;
		}
		.img {
			width: 60%;
			height: 60%;
			margin-left: -40%;
		}

		img {
			object-fit: cover;
			width: 100%;
			height: 100%;
		}
		.flex {
			display: flex;
			justify-content: center;	
			align-items: center;
			padding-left: 30%;
			background-color: #212121;
		}
		.text-ex {
			width: 50%;
			height: 40%;
			margin-left: 12%;
			margin-top: -15%;
			line-height: 2em;
		}
		.header {
			font-family: 'Playfair Display' ,serif;
			font-size: 3em;
			color: crimson;
			text-align: center;
			font-weight: bold;
		}
		.quote {
			color: white;
			font-family: 'Playfair Display Italic', serif;
			font-size: 1.5em;
			text-align: center;
		}
		.author {
			color: crimson;
			text-align: right;
			font-size: 20px;
		}

		.buttons {
			font-family: 'Playfair Display';
			background-color: firebrick;
			cursor: pointer;
			padding: 10px 15px;
			font-size: 15px;
			border: none;
			border-radius: 30px;
			box-shadow:  0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
		}
		.buttons:hover {
			background-color: crimson;
		}

		.other-text {
			color: white;
			font-family: 'Playfair Display',serif;
			padding-top: 40px;
			font-size: 1.1em;
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

	<!-- BODY -->

	<div class="about-container">
		<div class="header-2">
			About Forks &amp; Spoons
		</div>
		<div class="f-c">
			<div class="s-divider">
			</div>
		</div>
	</div>

	<div class="wh-100 flex" id="more-about">
		<div class="img">
			<img src="public/images/inside-res.jpg" alt="restaurant table" class="img-block">
		</div>
		<div class="text-ex">
			<div class="header">
				Since 1975
				<div class="s-divider" style="margin-left: 30%">
				</div>
			</div>
			<div class="quote">
				"One cannot think well, love well, sleep well, If one has not dined well"
				<div class="author">
					- Virginia Woolf
				</div>
			</div>
			<div class="other-text">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	
			</div>
		</div>
	</div>



	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>