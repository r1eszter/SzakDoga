<?php 
    $pagename='Culture'; 

    session_start();
    require('components/connection.php');
?>
<!-- traditional dresses, people, architecture, attractions -->

<!doctype html>
<html lang="en">

<head>
    <!-- name, icon img, css, scr -->
    <title>Japanese Culture</title>
    <link href="culture.css" rel="stylesheet" type="text/css" >
</head>


<body>
     <!-- navbar (wp name, links) -->
    <ul>
        <li><a href="home.php">home</a></li>
    </ul>


    <!-- Top for presentation -->
    <div class="top">
        <h1>JAPAN CULTURE</h1> 
        <div class="reddot">    
            <h2>Anime Above All</h2>
        </div>
    </div>


    <!-- Links for the same page -->
    <div class="choose">
        <a href="#tokyo"><div class="c1">Capital</div></a>
        <a href="#dress"><div class="c2">Traditional dresses</div></a>
        <a href="#people"><div class="c3">People and Religion</div></a>
        <a href="#arch"><div class="c4">Architect</div></a>
        <a href="#attract"><div class="c5">Attractions</div></a>
    </div>


    <!-- Capital, Tokyo -->
    <div id="tokyo">
        <?php 
            $sql = "SELECT * FROM culture WHERE name = 'Capital'";
            $tokyo_result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($tokyo_result)) {
                echo "<div> TOKYO </div>";
                echo "<div> fowjfopjfpol,dféwlkgőpetkhworjpingqioernb</div>";
            } ?>
    </div>

    <!-- Traditional dresses -->
    <div id="dress">

    </div>

    <!-- People and Religion -->
    <div id="people">

    </div>

    <!-- Architect -->
    <div id="arch">

    </div>

    <!-- Attractions -->
    <div id="attract">

    </div>


</body>

</html>