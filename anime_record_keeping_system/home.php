<?php
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
                /* proba */
               /*echo "<h1> You searched for $etitle. </h1>";*/
               /*echo '<a href="animes/DeathParade.php"></a>'; */
               header("Location: animes/".$etitle.".php");
               exit;
        }  
        else{  
            echo "<h1> There is no anime like this in the database yet. </h1>";  
        } 
    }
?>

<?php $pagename='HOME'; ?>


<!doctype html>
<html lang="en">

<head>
  <!-- name, icon img, css, scr -->
  <title>Home</title>
  <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
  <link href="design/home.css" rel="stylesheet" type="text/css" >
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

        
        <div class="uppernav-right">
            <!-- the side bar links (working: login, signup, home) -->
            <?php 
                if ($_SESSION['loggedin'] != true) {
                    echo "<a href='login.php'> Login </a>";
                    echo "<a href='signup.php'> Sign Up </a>";
                } 
                else {
                    echo "<a href='myacc.php'> My Account </a>";
                    if ( 'admin' == $_SESSION['roles'] ) {
                        echo "<a href='admin.php'> Admin Site </a>";
                    }
                }
            ?>
        
            <!-- search bar .. anime names-->
            <div class="search-container">
                <form action="home.php" method="POST">
                    <input type="text" placeholder="Search.." id="search" name="search">
                    <!-- do I need a button? -->
                    <!-- <button type="submit"><i class="fa fa-search"></i></button>-->                </form>
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
        <div class="culture">

            <div class="dresses">
                <h2>JAPANESE CULTURE</h2>
                <a href="https://sakura.co/blog/a-look-into-japanese-traditional-clothing/"><img src="img/home1.jpg" alt="img" draggable="false" title="Traditional dresses"></a>
            </div>

            <div class="festivals">
                <a href="https://www.japan-guide.com/e/e2063.html"><img src="img/festivals.jpg" alt="img" draggable="false" title="Festivals"></a>
            </div>

            <div class="write">
                <a href="https://www.busuu.com/en/japanese/alphabet"><img src="img/write.jpg" alt="img" draggable="false" title="Language, Writing (Kanji, Hiragana, Katakana, Romanji)"></a>
            </div>

            <div class="food">
                <a href="https://www.japancentre.com/en/page/156-30-must-try-japanese-foods"><img src="img/food.jpg" alt="img" draggable="false" title="Food & Resturants"></a>
            </div>
        </div>


</body>

</html>


