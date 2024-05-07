<?php 
    $pagename='Hunter x Hunter'; 
    session_start();
    include('../components/connection.php');  

    echo "<title>$pagename</title>";

    $sql = "SELECT * FROM anime WHERE etitle = '$pagename'";
    $title_result = mysqli_query($con, $sql);
    $data_result = mysqli_query($con, $sql);


    /* get img from database */
    $result_for_main = $con->query("SELECT main_img FROM anime WHERE etitle = '$pagename'");
    $result_for_bg = $con->query("SELECT WP FROM anime WHERE etitle = '$pagename'");


    /* for search */
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $etitle = $_POST['search'];

        $sql = "SELECT etitle FROM anime WHERE etitle='$etitle'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        if($count == 1){  
            header("Location: ".$etitle.".php");
            exit;
        }  
        else{  
            echo "<div class='alert' id='alert'>  </div>";  
            echo "<script>
                setTimeout(function() {
                        ocument.getElementById('alert').style.display = 'none';
                }, 5000);
            </script>";
        } 
    }   
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

   <?php if($result_for_bg->num_rows > 0)
    { $row = $result_for_bg->fetch_assoc(); 
    echo "<style>"; 
        echo "body {"; 
            echo "background-image: url(data:image/jpeg;base64," . base64_encode($row['WP']) . ");";
        echo "}"; 
    echo "</style>"; } ?>

    <style>
        a:visited {
            color: rgb(0, 0, 102);
        }

        .title {
            margin-left: 45%;
        }

        .data {
            margin-left: 55%;
            margin-top: 13%
        }
    </style>
</head>

<body>
     <!-- navbar (wp name, links) -->
     <ul>
        <li class="user">
            <?php 
            if (!isset($_SESSION['loggedin'])) {
                echo "<img class='pfp' src=\"../img/nopfp.jpg\" alt=\"PFP\" />";
            }
            else {   
                /* get user img from database */
                $usern = $_SESSION['username'];
                $result_user = $con->query("SELECT pfp FROM user WHERE username = '$usern'"); 

                if($result_user->num_rows > 0){  ?>
                    <div class="profile"> 
                        <?php while($row = $result_user->fetch_assoc()){ ?> 
                            <a href="../myacc.php"><img class="pfp" src="data:pfp/jpg;charset=utf8;base64,<?php echo base64_encode($row['pfp']); ?>" /> </a>
                        <?php } ?> 
                    </div> 
                    <?php }else{ ?> 
                    <p class="status error">Image not found...</p> 
                    <?php } ?>
            <?php } ?> 
        </li>

        <li>
            <a class="ha" href="../home.php">home</a>
        </li>   

        <li>
            <?php echo "<form action='$pagename.php' method='POST'>"; ?>
                <input type="text" placeholder="Search.." id="search" name="search">
            </form>
        </li>
    </ul>


    <!-- main -->
    <div class="main">
        <!-- the anime titlte and some date -->
        <div class="title" style="color: white;">
            <?php while($row = mysqli_fetch_assoc($title_result)) {
                echo "<p> - ". $row["fin"] ." - </p>"; 
            
            /* the english title of the page */
            echo"<h1 class='eng'>$pagename</h1>";

            /* the japanes title */
            echo "<h1 class='jap' style='color: rgb(0, 0, 102);'>". $row["jtitle"] . "</h1>"; 
            } ?>
        </div>


        <!-- more datas -->
        <div class="data" style="color: white;">
            <?php while($row = mysqli_fetch_assoc($data_result)) {
                echo "<p class='prog' style='color: rgb(0, 0, 102);'>Synopsis</p>";
                echo $row["synopsis"];

                echo "<p class='prog' style='text-align: center; font-size: 140%; color: rgb(0, 0, 102);'> <br> ". $row["episodes"] . " episodes </p>";
                
                echo "<p class='prog' style='color: rgb(0, 0, 102);'> <br> Genres </p>";
                echo $row["genres"];
                
                echo "<p class='prog' style='color: rgb(0, 0, 102);'> <br> Studio </p>";
                echo $row["studio"];

                echo "<p class='prog' style='color: rgb(0, 0, 102);'> <br> Aired </p>";
                echo "<p> ". $row["start_aired"]."  -to-  ". $row["stoped_aired"] . "</p>";  
            } ?>
        </div>
    </div>

</body>

</html>