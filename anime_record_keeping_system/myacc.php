<?php 
    session_start();

    $pagename= $_SESSION['username'] . "'s page"; 
    echo "<title>$pagename</title>";
?> 


<!doctype html>
<html lang="en">

    <head>
        <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
        <link href="design/acc.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>

    <body>
        <!-- navigation bar for now its on left side -->
        <div class="sidenav">
            <!-- pfp and username with checking if the user is logged in -->
            <?php 
                if ($_SESSION['loggedin'] != true) {
                    echo "<img class='pfp' src=\"img/nopfp.jpg\" alt=\"PFP\" />";
                    echo "<h2 class='uname'> login first </h2>";
                }
                else {
                        /*PFP database try*/
                        /* while($row = $pfp->fetch_assoc()) {
                            echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode( $row['image'] ).'"/>';
                        } */
                        echo "<img class='pfp' src=\"img/".$_SESSION['username'] ."PFP.jpg\" alt=\"PFP\" />";
                        echo "<h2 class='uname'> ".$_SESSION['username'] ." </h2>";
                }
            ?>

            <!-- search bar .. it not really working yet -->
            <div class="search-container">
                <form action="home.php" method="POST">
                    <input type="text" placeholder="Search.." id="search" name="search">
                    <!-- do I need a button? -->
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- side nav links -->
            <a href="home.php"> <i class="material-icons">home</i> Home </a>
            <?php
                if ($_SESSION['loggedin'] == true) {
                    echo "<a href='logout.php'> <i class='material-icons'>logout</i> Logout </a>";
                } 
            ?>
            <a href="anime.php"> <i class="material-icons">co_present</i> Anime </a>
            <a href="manga.php"> <i class="material-icons">import_contacts</i> Manga </a>
        </div>

        <div class="main">

            <!-- webpage name -->
            <div class="name"> Anime Above All </div>
            <br>
            
            <!-- logged in check -->
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    /*echo "Welcome to your page, " . htmlspecialchars($_SESSION['username']) . "!";*/
                } 
                else {
                    echo "<h1> Please log in first to use this page. <h1>";
                }
            ?>
        </div>
    </body>

</html>