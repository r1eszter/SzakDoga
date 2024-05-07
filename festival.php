<?php
    $pagename="Festival";
    session_start();
    require('components/connection.php');
    
?>


<!doctype html>
<html lang="en">

<head>
    <!-- name, icon img, css, scr -->
    <title>Festivals</title>
    <link rel = "icon" href = "img/firework.png" type = "image/x-icon">
    <link href="festival.css" rel="stylesheet" type="text/css" >
</head>


<body>
     <!-- navbar (wp name, links) -->
     <ul>
        <li class="user">
            <?php 
            if (!isset($_SESSION['loggedin'])) {
                echo "<img class='pfp' src=\"img/nopfp.jpg\" alt=\"PFP\" />";
            }
            else {
                /* get user img from database */
                $usern = $_SESSION['username'];
                $result_user = $con->query("SELECT pfp FROM user WHERE username = '$usern'"); 
                
                if($result_user->num_rows > 0){  ?> 
                        <?php while($row = $result_user->fetch_assoc()){ ?> 
                            <a href="myacc.php"><img class="pfp" src="data:pfp/jpg;charset=utf8;base64,<?php echo base64_encode($row['pfp']); ?>" /> </a>
                        <?php } ?> 
                    <?php }else{ ?> 
                    <p class="status error">Image not found...</p> 
                    <?php } ?>
            <?php } ?> 
        </li>

        <li>
            <a class="ha" href="home.php">home</a>
        </li>   
     </ul>

     <div class="season">
        <?php
            $sql = "SELECT * FROM culture WHERE name = 'Spring Festivals'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<h1 class='main'> ". $row["name"] ." </h1>";
        ?>
     </div>

     <div class="festiv_list">
        <div class="first">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Omizutori'";
                $result2 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result2);
                echo "<h2> ". $row["about"] ." </h2>";
                echo"<p> ". $row["description"] ." </p>"; 
            ?>
                <img class="fest" src="img/omizutori.jpg"/>
        </div>

        <div class="second">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Takayama Matsuri'";
                $result3 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result3);
                echo "<h2> ". $row["about"] ." </h2>";
                echo"<p> ". $row["description"] ." </p>";
            ?>
                <img class="fest" src="img/takayama.jpg"/>
        </div>

        <div class="third">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Aoi Matsuri'";
                $result4 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result4);    
                echo "<h2> ". $row["about"] ." </h2>";
                echo"<p> ". $row["description"] ." </p>";
            ?>
                <img class="fest" src="img/aoi.jpg"/>
        </div>
     </div>

</body>

</html>