<!-- pfp and username with checking if the user is logged in -->
<?php 
    session_start();
    include('components/connection.php'); 

    /* still not so good log check in */
    if ($_SESSION['loggedin'] != true) { 
        echo "<h2 class='uname'> login first </h2>";
    }

    $pagename = $_SESSION['username'] . "'s page"; 
    echo "<title>$pagename</title>";
    $usern = $_SESSION['username'];

    $result = $con->query("SELECT pfp FROM user WHERE username = '$usern'"); 
?>




<!doctype html>
<html lang="en">

    <head>
        <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
        <link href="myacc.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>

    <body>

        <!-- things for the top -->
        <div class="uppernav">
            
            <a href="home.php"> <div class="name">  Anime Above All </div> </a>

            <div class="minis">
                <a class="minibut" href="logout.php"> <button> <i class="material-icons">logout</i> </button> </a>
            </div>

        </div>


        <!-- navigation bar on the bottom -->
        <div class="navbar">

            <!-- pfp and username -->
            <div class="bottommain">
                <!-- get the image from sql -->
                <?php if($result->num_rows > 0){ ?> 
                <div class="profile"> 
                    <?php while($row = $result->fetch_assoc()){ ?> 
                        <img class="pfp" src="data:pfp/jpg;charset=utf8;base64,<?php echo base64_encode($row['pfp']); ?>" /> 
                    <?php } ?> 
                </div> 
                <?php }else{ ?> 
                    <p class="status error">Image not found...</p> 
                <?php } ?>
                
                <!-- username -->
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