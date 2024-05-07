<?php
    $pagename='HOME';
    require('components/connection.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include file which makes the
	    // Database Connection.
	    include('components/connection.php'); 

        $etitle = $_POST['search'];

        $sql = "SELECT etitle FROM anime WHERE etitle='$etitle'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        if($count == 1){  
                /* try */
               /*echo "<h1> You searched for $etitle. </h1>";*/
               /*echo '<a href="animes/Noragami.php"></a>'; */
               header("Location: animes/".$etitle.".php");
               exit;
        }  
        else{  
            echo "<div class='alert' id='alert'>  </div>";  
            echo "<script>
                setTimeout(function() {
                    document.getElementById('alert').style.display = 'none';
                }, 5000);
            </script>";
        } 
    }
?>



<!doctype html>
<html lang="en">

<head>
  <!-- name, icon img, css, scr -->
  <title>Home</title>
  <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
  <link href="home.css" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <!-- navigation bar for the upper side of the page -->
    <div class="uppernav">

        <!-- pfp and username with checking if the user is logged in -->
        <?php 
            if (!isset($_SESSION['loggedin'])) {
                echo "<img class='pfp' src=\"img/nopfp.jpg\" alt=\"PFP\" />";
                echo "<h2 class='uname'> login first </h2>";
            }
            else {
                if (isset($_SESSION['username'])) {
                    echo "<a href='myacc.php'><img class='pfp' src=\"img/".$_SESSION['username'] ."PFP.jpg\" alt=\"PFP\" /> </a>";
                    echo "<h2 class='uname'> ".$_SESSION['username'] ." </h2>";
                } else {
                    echo "<img class='pfp' src=\"img/nopfp.jpg\" alt=\"PFP\" />";
                    echo "<h2 class='uname'> no user name found </h2>";
                }
            }
        ?>

        
        <div class="uppernav-right">
            <!-- the side bar links (working: login, signup, home) -->
            <?php 
                if (!isset($_SESSION['loggedin'])) {
                    echo "<a href='login.php' class='origina'> login </a>";
                    echo "<a href='signup.php' class='origina'> sign up </a>";
                } 
                else {
                    /* Does the img enough for link? */
                    /* echo "<a href='myacc.php' class='newa'> My Account </a>"; */
                    if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin') {
                        echo "<a href='admin.php' class='newa'> admin site </a>";
                    } 
                }
            ?>
        
            <!-- search bar .. anime names-->
            <div class="search-container">
                <form action="home.php" method="POST">
                    <input type="text" placeholder="Search.." id="search" name="search">
                    <!-- do I need a button? -->
                    <!-- <button type="submit"><i class="fa fa-search"></i></button>-->                
                </form>
            </div>
        </div>
    </div>

        
        <!-- webpage name -->
        <div class="name"> Anime Above <br> All </div>

        <!-- teaser -->
        <div class="teaser"> Japan you don't know, atypical, <br> unexplored, uniqe </div>
        

        <!-- anime -->
        <a href='anime.php'><div class="anime"> ANIME </div></a>

        <!-- manga -->
        <a href='manga.php'><div class="manga"> MANGA </div></a>


        <!-- culture -->
        <div class="jc">
            <!-- traditonal dresses, people, architecture, attractions -->
            <div class="culture">
                <h2>JAPANESE CULTURE</h2>
                <a href="culture.php"><img src="img/home1.jpg" alt="img" draggable="false" title="Japan & The Culture"></a>
            </div>

            <div class="festivals">
                <a href="festival.php"><img src="img/festivals.jpg" alt="img" draggable="false" title="Festivals"></a>
            </div>

            <div class="write">
                <a href="language.php"><img src="img/write.jpg" alt="img" draggable="false" title="Language, Writing (Kanji, Hiragana, Katakana, Romanji)"></a>
            </div>

            <div class="food">
                <a href="food.php"><img src="img/food.jpg" alt="img" draggable="false" title="Food, Drink"></a>
            </div>
        </div>

</body>

</html>



