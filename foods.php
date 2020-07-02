<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="shortcut icon" type="x/image" href="public/icon/favicon.ico">
        <title>Foods</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        	 @font-face {
		      font-family: 'Playfair Display Italic';
		      src: url('public/fonts/PlayfairDisplay-Italic.ttf');	
			}

			 @font-face {
				font-family: 'Playfair Display';
				src: url('public/fonts/PlayfairDisplay-Regular.ttf');
			}
			* {
				/* outline: 1px solid green; */
			}
			body {
				overflow-x: hidden;
				background-color: #212121;
			}
			.flex-container {
				display: flex;
				justify-content: center;
				align-items: center;	
				padding-top: 0;
				flex-wrap: wrap;
			}

			.wh-100	 {
				width: 100vw;
				height: 100vh;
			}

			.m-2 {
				margin: 2%;
			}
			
			
			.food-item {
				width: 30%;
				height: 45%;
				align-self: flex-start;
				background-size: 100%;
				background-position: center;
				object-fit: contain;
				color: white;
				font-family: 'Playfair Display';
				font-size: 40px;
				transition: all 500ms;
				text-align: center;
				font-weight: bolder;
				/*background-repeat: no-repeat;*/
				padding-top: 5%;
			}
			.food-item:hover {
				transform: scale(0.92);
			}
			.theme-background {
				background-color: #212121;
			}
			.mt-10 {
				margin-top: 10%;
			}
			.w-100 {
				width: 100vw;
			}

			.food-form {
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
			}

			.m-10 {
				margin-right: 10px;
				margin-left: 10px;
			}

			
			#search-bar {
				font-family: 'Playfair Display', serif;
				color: white;
				border: 2px solid crimson !important;
				border-radius: 40px;
				margin: 40px 0px;
				width: 60%;
				padding: 4px 20px;
				font-size: 19px;
				background-color: #212121;
			}
			
			#search-bar:focus {
				outline: none !important;
			}

			input[type=submit], .buttons {
				margin-top: 1vh;
				font-family: 'Playfair Display';
				color: white;
				background-color: firebrick;
				cursor: pointer;
				padding: 10px 15px;
				font-size: 1.3em;
				border: none;
				border-radius: 30px;
				/*box-shadow:  0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);*/
			}
			input[type=submit]:hover, .buttons:hover {
				background-color: crimson;
 		}
			.text {
				width: 100%;
				height: 100%;
				margin-top: 30%;
			}
			.error {
				background-color: #212121; padding-top: 3%; text-align: center;
				color: #f00;
				font-size: 1.4em;
			}
			.yellow-text {
				font-family: 'Playfair Display';
				color: yellow;
			}
			.price {
				font-size: 20px;
			}
			.f-c {
				display: flex;
				justify-content: center;
				-ms-align-items: center;
				align-items: center;
			}

			.f-wrap {
				flex-wrap: wrap;
			}

			.card-item {
				width: 33% ;
				height: 10%;
			}
			.flex {
				display: flex;
			}

			.jc-c {
				justify-content: center;
			}

			.ai-c {
				align-items: center;
			}

			.mt-4 {
				margin-top: 4%;
			}

			.cards {
				display: flex;
				justify-content: center;
				-ms-align-items: center;
				align-items: center;
				flex-direction: column;
				width: 33%;
				height: 50%;
			}

			.header {
				width: 100%;
				height: 20%;
				object-fit: cover;
			}
			img {
				object-fit: cover;
				width: 100%;
				height: 20%;
			}
			.ml-2 {
				margin-left: 2%;
			}
			.title {
				color: #fff;
				font-family: 'Playfair Display';
				/* padding: 3%; */
				font-size: 1em;
			}
			.big-font-size {
				font-size: 2em;
			}
			.br-4 {
				border-radius: 4%;
			}
        </style>
        <link rel="stylesheet" href="vendor/materialize/css/materialize.min.css">
		<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
		<link href="public/css/style.css" rel="stylesheet">

    </head>
    <body>
		<nav class="grey darken-4" style="font-family: 'Playfair Display';">
			<div class="nav-wrapper">
				<a href="#" style="padding-left: 20px" class="brand-logo">
					<span class="red darken-3" style="font-family: 'Playfair Display Italic'; color: white; font-weight: bold; border-radius: 25px; padding: 4px 10px; font-style: italic;">Forks &amp; Spoons</span>
				</a>
				<ul class="right">
					<li id="home"><a style="font-weight: 500; font-size: 1.2em;" href="index.php">Home</a></li>
					<li id="about"><a style="font-weight: 500; font-size: 1.2em;" href="about.php">About</a></li>
					<li id="foods"><a style="font-weight: 500; font-size: 1.2em; " href="foods.php">Foods</a></li>
					<?php
						if (!isset($_SESSION['customer_id'])) 
						{
							echo '<li><a class="btn waves-effect waves-light red darken-3" style="border-radius: 25px; font-size: 1.1em; text-transform: capitalize;" href="login.php">Login</a></li>';
							echo '<li><a class="btn effect waves-light red darken-3" style="color: white; text-transform: capitalize; font-size: 1.1em; margin-left: -2px; border-radius: 25px;" href="register.php">Register</a></li>';
						} 
						else 
						{
							echo '<li><a class="btn waves-effect waves-light red black darken-3" style="border-radius: 25px; " href="logout.php">Logout</a></li>';
						}
					?>
				</ul>	
			</div>
		</nav>

		<!-- SEARCH BAR -->
		<div class="w-100 theme-background">
			<form class="food-form" action="" method="GET">
				<input type="text" name="search" class="search-bar" id="search-bar" placeholder="Type here..">
				<input type="submit" name="submit" value="Search 🔎" class="button">
			</form>
		</div>
		<!-- SEARCH RESULTS -->

		<?php 
			if (isset($_GET['search'])) {
				require 'backend/database/database.php';
				$db = new Database('localhost', 'project', 'root', '');
				$query = $db->connect();
				try {
					$statement = $query->prepare("SELECT * from foods WHERE name=?");		
					$searched_for = htmlspecialchars($_GET['search']);
					$statement->execute([$searched_for]);
					$row = $statement->fetchAll(PDO::FETCH_ASSOC);
					if (!count($row)) {			
						echo '<div class="error yellow-text">'.
								'Sorry nothing found. Try something different'.
							'</div>';
					} 
					else 
					{
					?>
						<div class="flex flex-row flex-wrap justify-center bg-grey-200 my-10">
						
						<?php for($e = 0; $e < sizeof($row); $e++) { ?>
								<div class="max-w-sm rounded overflow-hidden shadow-lg mx-5">
								  <img class="w-full" src="public/images/<?php echo strtolower($row[$e]['name']); ?>.jpg" alt="Sunset in the mountains">
								  <div class="px-6 py-4">
								    <div class="font-bold text-white text-xl mb-2" style="font-family: 'Playfair Display';">
								    	<?= $row[$e]["name"] ?>
								    	<div class="right"> &#8377; <?= $row[$e]['price']; ?> </div>		
								    </div>
								    <p class="text-white text-base py-3" style="font-family: 'Playfair Display';">
								     <?php echo $row[$e]["description"]; ?>
								    </p>
								  </div>
								  <div class="mx-auto text-center mx-7 my-4">
								    <a class="btn mr-2 rounded-full" style="background-color: crimson; font-family: 'Playfair Display'; font-weight: bolder;">Order</a>
								  </div>
								</div>
						<?php } ?>
						
					</div>

		<?php
				}
		?>
		

		<?php
			} catch (Exception $e) {
					echo '<div class="error"> '.$e->getMessage().' </div>';
				}
			}
		?>


			<div class="flex-container wh-100 theme-background" style="padding-top: 5%;">
				<a href="foods/categories/indian.php" class="food-item m-10 br-4" style="background-image: url('public/images/background-edit.jpg');">
					Indian 	
				</a>
				<a href="" class="food-item m-10 br-4" style="background-image: url('public/images/momo.jpg');">
					Chinese
				</a>
				<a href="" class="food-item m-10 br-4" style="background-image: url('public/images/italian.jpg');">
					Italian
				</a>
				<a href="" class="food-item m-10 br-4" style="background-image: url('public/images/table-thai.jpg');">
					Thai
				</a>
				<a href="" class="food-item m-10 br-4" style="background-image: url('public/images/seasame1.jpg');">
					Continental
				</a>
			</div>

		<!-- MAIN PART -->
		
    </body>
</html>