<?php
    $pagename="Food";
    session_start();
    require('components/connection.php');
    
?>


<!doctype html>
<html lang="en">

<head>
    <!-- name, icon img, css, scr -->
    <title>Food</title>
    <link rel = "icon" href = "img/ramen.png" type = "image/x-icon">
    <link href="food.css" rel="stylesheet" type="text/css" >
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


    <!-- the foods -->
    <div title="Sushi" class="sushi">
        <img src="img/sushi.jpg"/> 
    </div>

    <div title="Tempura" class="temp">
        <img src="img/tempura.jpg"/> 
    </div>
    
    <div title="Takoyaki" class="tak">
        <img src="img/takoyaki.jpg"/> 
    </div>

    <div title="Onigiri" class="on">
        <img src="img/onigiri.jpg"/> 
    </div>

    <div title="Taiyaki" class="tai">
        <img src="img/taiyaki.jpg"/> 
    </div>
    
    <div title="Fruit Sandwich" class="fru">
        <img src="img/fruit_sando.jpg"/> 
    </div>
    
    <div title="Dumpling" class="dum">
        <img src="img/dumpling.jpg"/> 
    </div>

    <div title="Dango" class="dan">
        <img src="img/dango.jpg"/> 
    </div>

    <div title="Bento Box" class="bento">
        <img src="img/bento_box.jpg"/> 
    </div>


    <!-- the bottom bowl -->
    <div title="Ramen Bowl" class="bowl">
        <img src="img/main_ramen.jpg"/> 
    </div>


</body>


</html>