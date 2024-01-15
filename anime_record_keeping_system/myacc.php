<!-- pfp and username with checking if the user is logged in -->
<?php 
    session_start();

    /* still not so good log check in */
    if ($_SESSION['loggedin'] != true) { 
        echo "<h2 class='uname'> login first </h2>";
    }

    $pagename= $_SESSION['username'] . "'s page"; 
    echo "<title>$pagename</title>";
?>




<!doctype html>
<html lang="en">

    <head>
        <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
        <link href="acc.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>

    <body>
        <!-- navigation bar on the bottom -->
        <div class="navbar">

            <!-- pfp and username -->
            <div class="bottommain">
                <img class='pfp' src="img/<?php echo $_SESSION['username']; ?>PFP.jpg" alt="PFP"/>
                <h2 class='uname'> <?php echo $_SESSION['username']; ?>  </h2>
            </div>

            <!-- idk maybe stats? -->
            <div class="bottomnav">
                <div class="line">ANIMES</div>
                <div class="line">MANGAS</div>
                <div class="line">CULTURE</div>
                <!-- search bar .. it not really working yet -->
               <!--  <div class="search-container">
                    <form action="home.php" method="POST">
                        <input type="text" placeholder="Search.." id="search" name="search">
                        ** do I need a button? **
                        ** <button type="submit"><i class="fa fa-search"></i></button> **
                    </form>
                </div> -->

                <!-- bottom nav links -->
                <!-- <a href="home.php"> <i class="material-icons">home</i> Home </a>
                <?php
                    /*if ($_SESSION['loggedin'] == true) {
                        echo "<a href='logout.php'> <i class='material-icons'>logout</i> Logout </a>";
                    }*/
                ?>
                <a href="anime.php"> <i class="material-icons">co_present</i> Anime </a>
                <a href="manga.php"> <i class="material-icons">import_contacts</i> Manga </a> -->
            </div>

        </div>


        <!-- <div class="main">

            **webpage name
            <div class="name"> Anime Above All </div>
            <br>

        </div> -->

        
    </body>

</html>