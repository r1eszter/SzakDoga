<?php
    $pagename='Animes';
    require('components/connection.php');
    session_start();
?>


<!doctype html>
<html lang="en">

<head>
  <!-- name, icon img, css, scr -->
  <title>Animes</title>
  <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
  <link href="design/anime.css" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  <!-- script for the roll gallery -->
  <script src="src/script.js" defer></script>
</head>

<body>
    <!-- webpage name -->
    <div class="name"> Anime Above All </div>

    <!-- draggable image slider -->
    <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="card">
            <a href="animes/Death Parade.php"><img src="img/DeathParade.jpg" alt="img" draggable="false"></a>
            <a href="animes/Attack on Titan.php"><img src="img/AOT.jpg" alt="img" draggable="false"></a>
            <img src="img/TokyoGhoul.jpg" alt="img" draggable="false">
            <img src="img/naruto.jpg" alt="img" draggable="false">
            <img src="img/HxH.jpg" alt="img" draggable="false">
            <img src="img/MNY.jpg" alt="img" draggable="false">
            <img src="img/MHA.jpg" alt="img" draggable="false">
            <img src="img/jujutsu.jpg" alt="img" draggable="false">
            <img src="img/jujutsu.jpg" alt="img" draggable="false">
            <img src="img/jujutsu.jpg" alt="img" draggable="false">
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>

    <!-- MAKE IT MULTIPLE TIMES! -->
    <!-- GET THE PHOTOS FROM DATABASE -->
</body>

</html>
