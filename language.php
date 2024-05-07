<?php
    $pagename="Language";
    session_start();
    require('components/connection.php');
    
?>


<!doctype html>
<html lang="en">

<head>
    <!-- name, icon img, css, scr -->
    <title>Writing System</title>
    <link rel = "icon" href = "img/kanji.png" type = "image/x-icon">
    <link href="language.css" rel="stylesheet" type="text/css" >
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


    <div class="writing_list">
        <div class="hiragana">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Hiragana'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "<h2> ". $row["about"] ." </h2>";
                /* echo"<p> ". $row["description"] ." </p>";  */
            ?>
                <img class="abc" src="img/hiragana.jpg"/>
        </div>

        <div class="katakana">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Katakana'";
                $result2 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result2);
                echo "<h2> ". $row["about"] ." </h2>";
                /* echo"<p> ". $row["description"] ." </p>"; */
            ?>
                <img class="abc" src="img/katakana.jpg"/>
        </div>

        <div class="kanji">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Kanji'";
                $result3 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result3);    
                echo "<h2> ". $row["about"] ." </h2>";
                /* echo"<p> ". $row["description"] ." </p>"; */
            ?>
                <img class="abc" src="img/kanji's.jpg"/>
        </div>
    </div>



    <div class="info_list">
        <div class="info_h">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Hiragana'";
                $result4 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result4);
                echo"<p> ". $row["description"] ." </p>"; 
            ?>
        </div>

        <div class="info_kat">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Katakana'";
                $result5 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result5);
                echo"<p> ". $row["description"] ." </p>";
            ?>
        </div>

        <div class="info_kan">
            <?php
                $sql = "SELECT * FROM culture WHERE about = 'Kanji'";
                $result6 = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result6);    
                echo"<p> ". $row["description"] ." </p>"; 
            ?>
        </div>
    </div>
    


</body>

</html>