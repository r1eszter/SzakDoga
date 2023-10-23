<?php 
    $pagename='Attack on Titan'; 
    session_start();
    include('../components/connection.php');  

    echo "<title>$pagename</title>";

    $sql = "SELECT * FROM anime WHERE etitle = '$pagename'";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql);
    $result3 = mysqli_query($con, $sql);

        // output data of each row
        /* while($row = mysqli_fetch_assoc($result)) {
          echo "japan: " . $row["jtitle"]. " - genres: " . $row["genres"]. " - studio: " . $row["studio"]. "<br>";
        } */
?>


<!doctype html>
<html lang="en">

<head>
  <!-- icon img, css -->
  <link rel = "icon" href = "../img/jp.png" type = "image/x-icon">
  <link href="anime's.css" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    body {
        background-color: #9b0800;
    }

    .bar-right a:hover {
        color: #fff;
    }

    .second {
        width: 100%;
        position: absolute;
        top: 600px;
        height: 500px;
    }
  </style>

</head>

<body>
    <div class="upper">
        <img class="first" src="../img/WPaot.jpg" alt="img" draggable="false">
        <div class="bar">
            <!-- pfp and username with checking if the user is logged in -->
            <?php 
            if ($_SESSION['loggedin'] != true) {
                echo "<img class='pfp' src=\"../img/nopfp.jpg\" alt=\"PFP\" />";
                echo "<h2 class='uname'> login first </h2>";
            }
            else {
                     /*PFP database try*/
                    /* while($row = $pfp->fetch_assoc()) {
                        echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode( $row['image'] ).'"/>';
                    } */
                    echo "<img class='pfp' src=\"../img/".$_SESSION['username'] ."PFP.jpg\" alt=\"PFP\" />";
                    echo "<h2 class='uname'> ".$_SESSION['username'] ." </h2>";
    
            }
        ?>

            <div class="bar-right"> 
                <a href="../home.php"> Home </a>
                <a href="../anime.php"> Anime </a>
                <a href="../manga.php"> Manga </a>
                <!-- search bar .. it not really working yet -->
                    <!-- <form action="/action_page.php"> -->
                    <input type="text" placeholder="Search.." name="search">
<!--                     <button type="submit"><i class="fa fa-search"></i></button>-->                    <!-- </form> -->
            </div>
        </div>
        <img class="second" src="../img/blood.png" alt="img" draggable="false">
    </div>    
    
        <div class="page">
            <div class="tag">
                <?php echo"<h1>$pagename</h1>"; ?>
                <?php while($row = mysqli_fetch_assoc($result)) {
                    echo "<h1>". $row["jtitle"] . "</h1>"; } ?>
                <img src="../img/AOT.jpg" alt="img" draggable="false"> 
            </div>

            <div class="datas"> 
                <?php while($row = mysqli_fetch_assoc($result2)) {
                    echo "<h1> Genres : ". $row["genres"] . "</h1> <br> <h1> Episodes : ". $row["episodes"] . "</h1> <br> <h3> ". $row["synopsis"] . "</h3>";  
                } ?>
            </div>

            <br>

            <div class="smallinf"> 
                <?php while($row = mysqli_fetch_assoc($result3)) {
                    echo "<p> Studio : ". $row["studio"] . "</p> <br> <p> ?Finished? : ". $row["fin"] . "</p> <br> <p>  Aired : ". $row["start_aired"]."  to  ". $row["stoped_aired"] . "</p>";  
                } ?>   
            </div>
        </div>
    </div> 

</body>

</html>