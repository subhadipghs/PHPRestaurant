<nav class="grey darken-4" style="font-family: 'Playfair Display'; box-shadow: 0 0px 0px rgba(0,0,0,0) !important;">
    <div class="nav-wrapper">
        <a href="#" style="padding-left: 20px" class="brand-logo">
            <span class="red darken-3" style="font-family: 'Playfair Display Italic'; color: white; font-weight: bold; border-radius: 25px; padding: 4px 10px; font-style: italic;">Forks &amp; Spoons</span>
        </a>
        <ul class="right">
            <li id="home"><a style="font-weight: 500; font-size: 1.2em;" href="../index.php">Home</a></li>
            <li id="about"><a style="font-weight: 500; font-size: 1.2em;" href="../about.php">About</a></li>
            <li id="foods"><a style="font-weight: 500; font-size: 1.2em;" href="../foods.php">Foods</a></li>
            <?php
                if (!isset($_SESSION['customer_id'])) 
                {
                    echo '<li><a class="btn waves-effect waves-light red darken-3" style="border-radius: 25px; font-size: 1.1em; text-transform: capitalize;" href="../login.php">Login</a></li>';
                    echo '<li><a class="btn effect waves-light red darken-3" style="color: white; text-transform: capitalize; font-size: 1.1em; margin-left: -2px; border-radius: 25px;" href="../register.php">Register</a></li>';
                } 
                else 
                {
                    echo '<li><a class="btn waves-effect waves-light red black darken-3" style="border-radius: 25px; " href="../backend/logout.php">Logout</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>