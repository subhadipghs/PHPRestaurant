<?php



    require '../../backend/database/database.php';


    $db = new Database('localhost', 'project', 'root', '');

    $connection = $db->connect();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian</title>
    <link rel="stylesheet" href="../../vendor/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">

    <style>
        @font-face {
            font-family: 'Playfair Display Italic';
            src: url('../../public/fonts/PlayfairDisplay-Italic.ttf');	
        }

            @font-face {
            font-family: 'Playfair Display';
            src: url('../../public/fonts/PlayfairDisplay-Regular.ttf');
        }
    </style>
    
</head>
<body class="" style="background-color: #212121; font-family: 'Playfair Display';">
    
    <?php require '../../chunks/navbar.php';  ?>
<div class="flex flex-row flex-wrap justify-center align-center my-5">
    <?php    
        $statement = $connection->prepare("SELECT * from foods WHERE category=?");
        $statement->execute(['Indian']);
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        
        if (!count($row))
        {
            echo '<div class="error yellow-text"> Sorry nothing found </div>';
            exit();
        }
        else 
        {
    ?>

            <?php for($e = 0; $e < sizeof($row); $e++) { ?>
                    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-5">
                        <img class="w-full" src="../../public/images/<?php echo strtolower($row[$e]['name']); ?>.jpg" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                        <div class="font-bold text-white text-xl mb-2" style="font-size: 1.5em; font-family: 'Playfair Display';">
                            <?= $row[$e]["name"] ?>
                            <div class="right" style="font-size: 1.2em;"> &#8377; <?= $row[$e]['price']; ?> </div>		
                        </div>
                        <p class="text-white text-base py-3" style="font-family: 'Playfair Display';">
                            <?= $row[$e]["description"]; ?>
                        </p>
                        </div>
                        <div class="mx-auto text-center mx-7 my-5 mb-10">
                            <a class="buttons mr-2 py-3 px-5 rounded-full text-white strong" style="color: white; background-color: crimson; font-family: 'Playfair Display'; font-weight: bolder;">Order</a>
                        </div>
                    </div>
            <?php } ?>
        </div>
    <?php
        }

    ?>   

</body>
</html>
