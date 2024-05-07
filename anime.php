<?php
    $pagename='Animes';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include file which makes the
	    // Database Connection.
	    include('components/connection.php'); 

        $etitle = $_POST['search'];

        $sql = "SELECT etitle FROM anime WHERE etitle='$etitle'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        if($count == 1){  
                /* proba */
               /*echo "<h1> You searched for $etitle. </h1>";*/
               /*echo '<a href="animes/DeathParade.php"></a>'; */
               header("Location: animes/".$etitle.".php");
               exit;
        }  
        else{  
            echo "<div class='alert' id='alert'>  </div>";  
            echo "<script>
                setTimeout(function() {
                    document.getElementById('alert').style.display = 'none';
                }, 5000);
            </script>";
        } 
    }
?>


<!doctype html>
<html lang="en">

<head>
  <!-- name, icon img, css, scr -->
  <title>Animes</title>
  <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
  <link href="anime.css" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  <!-- script for the roll gallery -->
  <script src="src/script.js" defer></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <h1><a href="home.php">Anime Above All</a></h1>
        
        <div class="right-side">
            <!-- search bar -->
                <form action="anime.php" method="POST">
                    <input type="text" placeholder="Search.." id="search" name="search">
                </form>
        </div>
    </nav>


    <!-- top slideshow -->
    <div class="container">
        <div class="TopSlide">
            <img class="images" src="img/demo_slide.jpg" style="width:100%; height:500px" alt="Demon Slayer">
        </div>

        <div class="TopSlide">
            <img class="images" src="img/hero_slide.jpg" style="width:100%; height:500px" alt="My Hero Academia">
        </div>

        <div class="TopSlide">
            <img class="images" src="img/attack_slide.jpg" style="width:100%; height:500px" alt="Attack on Titan">
        </div>
            
        <div class="TopSlide">
            <img class="images" src="img/juju_slide.jpg" style="width:100%; height:500px" alt="Jujutsu Kaisen">
        </div>

        <div class="TopSlide">
            <img class="images" src="img/naruto_slide.jpg" style="width:100%; height:500px" alt="Naruto">
        </div>
            
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>
    </div>

    <!-- small slides -->
    <div class="small-slideshow">
        <p>Action</p>
        <div class="SmallSlide1">
            <img src="img/AOT.jpg" style="width:19.8%; height: 400px;">
            <img src="img/jujutsu.jpg" style="width:19.7%; height: 400px;">
            <img src="img/HxH.jpg" style="width:19.8%; height: 400px;">
            <img src="img/naruto.jpg" style="width:19.7%; height: 400px;">
            <img src="img/MHA.jpg" style="width:19.8%; height: 400px;">
        </div>

        <div class="SmallSlide1">
            <img src="img/Angel_Beats.jpg" style="width:19.8%; height: 400px;">
            <img src="img/DeathParade.jpg" style="width:19.7%; height: 400px;">
            <img src="img/SPYxFamily.jpg" style="width:19.8%; height: 400px;">
            <img src="img/noragami.jpg" style="width:19.7%; height: 400px;">
            <img src="img/OnePunchMan.jpg" style="width:19.8%; height: 400px;">
        </div>

        <a class="small-prev" onclick="SmallPlusSlides(-1, 0)">❮</a>
        <a class="small-next" onclick="SmallPlusSlides(1, 0)">❯</a>
    </div>

    <div class="small-slideshow">
        <p>Dark</p>
        <div class="SmallSlide2">
            <img src="img/Angel_Beats.jpg" style="width:19.8%; height: 400px;">
            <img src="img/noragami.jpg" style="width:19.7%; height: 400px;">
            <img src="img/AOT.jpg" style="width:19.8%; height: 400px;">
            <img src="img/jujutsu.jpg" style="width:19.7%; height: 400px;">
            <img src="img/OnePunchMan.jpg" style="width:19.8%; height: 400px;">
        </div>

        <div class="SmallSlide2">
            <img src="img/AOT.jpg" style="width:19.8%; height: 400px;">
            <img src="img/DeathParade.jpg" style="width:19.7%; height: 400px;">
            <img src="img/SPYxFamily.jpg" style="width:19.8%; height: 400px;">
            <img src="img/naruto.jpg" style="width:19.7%; height: 400px;">
            <img src="img/MHA.jpg" style="width:19.8%; height: 400px;">
        </div>

        <a class="small-prev" onclick="SmallPlusSlides(-1, 1)">❮</a>
        <a class="small-next" onclick="SmallPlusSlides(1, 1)">❯</a>
    </div>

    <!-- script for the top slide -->
    <script>
        let slideIndex = 1;
        ShowTopSlide(slideIndex);

        function plusSlides(n) {
            ShowTopSlide(slideIndex += n);
        }

        function currentSlide(n) {
            ShowTopSlide(slideIndex = n);
        }

        function ShowTopSlide(n) {
        let i;
        let slides = document.getElementsByClassName("TopSlide");
        let dots = document.getElementsByClassName("images");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
        }


        let SmallSlideIndex = [1,1];
        let slideId = ["SmallSlide1", "SmallSlide2"]
        ShowSmallSlides(1, 0);
        ShowSmallSlides(1, 1);

        function SmallPlusSlides(n, no) {
            ShowSmallSlides(SmallSlideIndex[no] += n, no);
        }

        function ShowSmallSlides(n, no) {
        let i;
        let x = document.getElementsByClassName(slideId[no]);
        if (n > x.length) {SmallSlideIndex[no] = 1}    
        if (n < 1) {SmallSlideIndex[no] = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        x[SmallSlideIndex[no]-1].style.display = "block";  
        }
    </script>


    <!-- square images -->
    

    <!-- GET THE PHOTOS FROM DATABASE -->
</body>

</html>
