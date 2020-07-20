<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width, initial-width=1.0"> 
		<link rel="shortcut icon" type="image/x-icon" href="public/icon/favicon.ico"/>
		<title>Register</title>
		<link rel="stylesheet" href="public/css/register.css">
		<style>

			:root {
				font-size: 16px;
			}

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
				font-size: 1em;
				background-color: #212121;
			}
			input:focus {
				outline: none;
				border-bottom: 2px solid crimson;
			}
			.header {
				font-family: 'Playfair Display', serif;
				text-align: center;
				margin-top: 10vh;
				/*margin-bottom: -10vh;*/
				color: white;
				font-size: 3.5em;
				font-weight: bold;
				letter-spacing: 2px;
			}
			#name {
				margin-top: 5vh;
			}
			.submit {
				font-style: normal;
				margin-top: 2vh;
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

			.header-line {
				display: none;
			}
			.header-line1 {
				display: block;
				font-family: 'Playfair Display Italic', serif;
				text-align: center;
				margin-top: 5vh;
				/*margin-bottom: 4vh;*/
				font-weight: bolder;
				color: white;
				font-size: 2em;
			}
			::-webkit-input-placeholder { /* Chrome/Opera/Safari */
				color: #ddd;
			}
			::-moz-placeholder { /* Firefox 19+ */
				color: #ddd;
			}
			:-ms-input-placeholder { /* IE 10+ */
				color: #ddd;
			}
			:-moz-placeholder { /* Firefox 18- */
				color: #ddd;
			}

			.error {
				font-family: 'Playfair Display';
				color: red;
			}

			.text-center {
				text-align: center;
			}

			.mt-4 {
				margin-top: 4%;
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
				.header-line1 {

					display: none;
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
					Register
				</div>
			</div>
			<div class="second">	
				<div class="header-line">
					Register 
				</div>
				<div class="header-line1">
					Hey, Buddy 🖐
				</div>
				<form action="" method="POST" name="register" class="form" onsubmit="onsubmit()" autocomplete="off">
					<input type="text" name="name" id="name" class="input-style" placeholder="Name">
					<input type="text" name="email" id="email" class="input-style" placeholder="Email">
					<input type="text" name="address" id="address" class="input-style" placeholder="Address">
					<input type="text" name="mobile_no" id="mobile_no" class="input-style" placeholder="Mobile No.">
					<input type="password" onchange="change(e)" name="password" id="password" class="input-style" placeholder="Password">
					<input type="password" name="confirm_password" id="confirm-password" class="input-style" placeholder="Confirm Password">
					<input type="submit" name="submit" class="submit" value="Submit 🍔">
				</form>
				<div class="error"> </div>
				<?php
					if (isset($_POST['name'])) {
						require('backend/register.php');
					}
				?>
				
			</div>
		</div>
	</body>
</html>