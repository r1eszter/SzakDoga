<?php $pagename='HOME'; ?>

<?php
require('components/connection.php');
?>


<!doctype html>
<html lang="en">

<head>
  <title>Home</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    
    <div class="sidenav">
        <p class="name"> Anime <br> Above All </p>

        <img src="img/pfp.jpg" alt="PFP">
        <h2 class="uname"> username </h2>

        <br><br>

        <a href="login.php"> <i class="material-icons">login</i> Login </a>
        <a href="signup.php"> <i class="material-icons">add_reaction</i> Sign Up </a>
        <a href="myacc.php"> <i class="material-icons">person</i> My Account </a>
        <a href="anime.php"> <i class="material-icons">co_present</i> Anime </a>
        <a href="manga.php"> <i class="material-icons">import_contacts</i> Manga </a>
    </div>

    <div class="main">
        <h1> Welcome! </h1>
    </div>


</body>

</html>