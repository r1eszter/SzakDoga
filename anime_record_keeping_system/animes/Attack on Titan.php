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
  <link href="animes.css" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    body {
        background-color: #9b0800;
    }
  </style>

</head>

<body>
     <!-- navbar (wp name, links) -->
     <ul>
        <li class="user">
            <?php 
            if ($_SESSION['loggedin'] != true) {
                echo "<img class='pfp' src=\"../img/nopfp.jpg\" alt=\"PFP\" />";
            }
            else {
                     /*PFP database try*/
                    /* while($row = $pfp->fetch_assoc()) {
                        echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode( $row['image'] ).'"/>';
                    } */
                    echo "<img class='pfp' src=\"../img/".$_SESSION['username'] ."PFP.jpg\" alt=\"PFP\" />";
            } ?>
        </li>
        <!-- search bar!!! -->
        <li><a href="../home.php">home</a></li>
    </ul>


    <!-- main -->
    <div class="main">
        <!-- the anime titlte and some date -->
        <div class="title">
            <?php echo"<h1>$pagename</h1>"; ?>
            <?php while($row = mysqli_fetch_assoc($result)) {
                    echo "<h1>". $row["jtitle"] . "</h1>"; } ?>
        </div>

        <!-- charachter -->
        <div class="char">
            <img src="../img/titan.png" />
        </div>

        <!-- more datas -->
        <div class="data">
            <?php while($row = mysqli_fetch_assoc($result2)) {
                echo "<p> Genres : ". $row["genres"] . "</p> <br> <p> Episodes : ". $row["episodes"] . "</p> <br> <p> ". $row["synopsis"] . "</p>";  
            } ?>
            <?php while($row = mysqli_fetch_assoc($result3)) {
                    echo "<p> Studio : ". $row["studio"] . "</p> <br> <p> ?Finished? : ". $row["fin"] . "</p> <br> <p>  Aired : ". $row["start_aired"]."  to  ". $row["stoped_aired"] . "</p>";  
            } ?>
        </div>
    </div>

</body>

</html>