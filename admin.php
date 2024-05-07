<?php
    $pagename='ADMIN';
    /* connection */
    require('components/connection.php');
    
    /* for tables */
    $sqlU = "SELECT * FROM user";
    $resultU = $con->query($sqlU);

    $sqlA = "SELECT * FROM anime";
    $resultA = $con->query($sqlA);

    $sqlM = "SELECT * FROM manga";
    $resultM = $con->query($sqlM); 
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- web page name & css -->
        <title>Admin</title>
        <link href="admin.css" rel="stylesheet" type="text/css" >
        <!-- Icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- HOME -->
        <div class="home">
            <a href="home.php"> <i class="fa fa-home"></i></a>
        </div>
        

        <!-- FORM popup - for adding animes to list -->
        <button class="add-button" onclick="openForm()"> ADD </button>
        
        <!-- ADD ANIME FORM -->
        <div class="form-popup" id="myForm">
                <label class="FORManime" onclick="openFormA()"> Anime </label>
                <label class="FORMmanga" onclick="openFormM()"> Manga </label>

            <form action="admin.php" class="form-container" method="POST" id="fa">
                <h1>Add Anime</h1>

                <!-- add anime php -->
                <?php 
                    /* anime add form */
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        /* connection */
                        include('components/connection.php');  

                        $english = $_POST['english'];
                        $japanese = $_POST['japanese'];
                        $genres = $_POST['genres'];
                        $studio = $_POST['studio'];
                        $fin = $_POST['fin'];
                        $start = $_POST['start'];
                        $stop = $_POST['stop'];
                        $eps = $_POST['eps'];
                        $syn = mysqli_real_escape_string($con, $_POST['syn']);
                        

                        $sql2 = "SELECT * FROM anime WHERE etitle='$english'";
                        $result2 = mysqli_query($con, $sql2);
                        $num = mysqli_num_rows($result2);
                        
                        // This sql query is use to check if
                        // the username is already present
                        // or not in our Database
                        if(isset($_POST['AS'])) {
                            if($num == 0) {
                                    $sql2 = "INSERT INTO `anime` (`etitle`, `jtitle`, `genres`, 
                                    `studio`, `fin`, `start_aired`, `stoped_aired`, `episodes`, `synopsis`) VALUES ('$english', '$japanese', 
                                    '$genres', '$studio', '$fin', '$start', '$stop', '$eps', '$syn')";
                                    
                                    $result2 = mysqli_query($con, $sql2);

                                    echo "Successfully added!";    
                            }
                            else {
                                echo "This anime is already in the database!";
                            } 
                        }
                    }
                ?>

                <div class="input-container">
                    <i class="fa fa-info icon"></i>
                    <input type="text" placeholder="English Name" name="english" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-info icon"></i>
                    <input type="text" placeholder="Japanese Name" name="japanese" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-database icon"></i>
                    <input type="text" placeholder="Enter Genres" name="genres" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-film icon"></i>
                    <input type="text" placeholder="Enter Studio" name="studio" required>
                </div>

                <!-- radio try -->
                <div class="input-container">
                    <i class="fa fa-tag icon"></i>
                    <input type="text" placeholder="finished / not yet" name="fin" required>
                    <!-- <input type="radio" name="op" value="finished" required>
                    <label for="fin"> Finished </label>
                    <input type="radio" name="op" value="not yet" required>
                    <label for="not"> Not yet finished</label>  -->
                </div>

                <div class="input-container">
                    <i class="fa fa-calendar-o icon"></i>
                    <input type="date" placeholder="Start of aired" name="start" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-calendar-o icon"></i>
                    <input type="date" placeholder="Stop of aired" name="stop" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-eye icon"></i>
                    <input type="number" placeholder="How many Episodes?" name="eps" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-keyboard-o icon"></i>
                    <input type="text" placeholder="Enter the Synopsis" name="syn" required>
                </div>
                
                <button type="submit" name="AS" class="btn">Add Anime</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>



            <!-- ADD MANGA FORM -->
            <form action="admin.php" class="form-container fm" method="POST" id="fm">
                <h1>Add Manga</h1>

                <!-- add manga php -->
                <?php
                    /* manga add form */
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        /* connection */
                        include('components/connection.php');  

                        $Menglish = $_POST['Menglish'];
                        $Mjapanese = $_POST['Mjapanese'];
                        $Mgenres = $_POST['Mgenres'];
                        $authors = $_POST['authors'];
                        $Mfin = $_POST['Mfin'];
                        $Mstart = $_POST['Mstart'];
                        $Mstop = $_POST['Mstop'];
                        $cha = $_POST['cha'];
                        $Msyn = mysqli_real_escape_string($con, $_POST['Msyn']);
                            

                        $sql3 = "SELECT * FROM manga WHERE etitle='$Menglish'";
                        $result3 = mysqli_query($con, $sql3);
                        $num = mysqli_num_rows($result3);
                            
                        // This sql query is use to check if
                        // the username is already present
                        // or not in our Database
                        if(isset($_POST['MS'])) {
                            if($num == 0) {
                                    $sql3 = "INSERT INTO `manga` (`etitle`, `jtitle`, `genres`, 
                                    `authors`, `fin`, `start_aired`, `stoped_aired`, `chapters`, `synopsis`) VALUES ('$Menglish', '$Mjapanese', 
                                    '$Mgenres', '$authors', '$Mfin', '$Mstart', '$Mstop', '$cha', '$Msyn')";
                                        
                                    $result3 = mysqli_query($con, $sql3);

                                    echo "Successfully added!";    
                                }
                                else {
                                    echo "This manga is already in the database!";
                                }
                        } 
                    }
                ?>

                <div class="input-container">
                    <i class="fa fa-info icon"></i>
                    <input type="text" placeholder="English Name" name="Menglish" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-info icon"></i>
                    <input type="text" placeholder="Japanese Name" name="Mjapanese" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-database icon"></i>
                    <input type="text" placeholder="Enter Genres" name="Mgenres" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-film icon"></i>
                    <input type="text" placeholder="Enter Authors" name="authors" required>
                </div>

                <!-- radio try -->
                <div class="input-container">
                    <i class="fa fa-tag icon"></i>
                    <input type="text" placeholder="finished / not yet" name="Mfin" required>
                    <!-- <input type="radio" name="op" value="finished" required>
                    <label for="fin"> Finished </label>
                    <input type="radio" name="op" value="not yet" required>
                    <label for="not"> Not yet finished</label>  -->
                </div>

                <div class="input-container">
                    <i class="fa fa-calendar-o icon"></i>
                    <input type="date" placeholder="Start of aired" name="Mstart" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-calendar-o icon"></i>
                    <input type="date" placeholder="Stop of aired" name="Mstop" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-eye icon"></i>
                    <input type="number" placeholder="How many Chapters?" name="cha" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-keyboard-o icon"></i>
                    <input type="text" placeholder="Enter the Synopsis" name="Msyn" required>
                </div>
                
                <button type="submit" name="MS" class="btn">Add Manga</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
        

        <!-- web page name -->
        <div class="name">
            <h1> Administration </h1>
        </div>

        <div class="choose">
            <label class="user" onclick="openTableU()"> User </label>
            <label class="anime" onclick="openTableA()"> Anime </label>
            <label class="manga" onclick="openTableM()"> Manga </label>
        </div>



        <!-- user table -->
        <table class="ut" id="ut">
            <tr>
                <th colspan="5"> USERS </th>
                <th rowspan="2"> Edit </th>
            </tr>
            <tr>
                <th> Username </th>
                <th> Email </th>
                <th> Password </th>
                <th> Role </th>
                <th> PFP </th>
            </tr>
            <?php
                if($resultU->num_rows > 0) {
                        while($row = $resultU->fetch_assoc()) {
                            echo " <tr>
                                <td style='width:5%'> ". $row["username"] ." </td>
                                <td style='width:15%'> ". $row["email"] ." </td>
                                <td style='width:10%'> ". $row["password"] ." </td>
                                <td style='width:5%'> ". $row["roles"] ." </td>
                            <tr>";
                        }
                }
            ?>
        </table>


        <!-- anime table -->
        <table class="at" id="at">
            <tr>
                <th colspan="10"> ANIMES </th>
            </tr>
            <tr>
                <th colspan="2"> Name </th>
                <th colspan="7"> Informations </th>
                <th rowspan="2"> Edit </th>
            </tr>
            <tr>
                <th> English </th>
                <th> Japanese </th>
                <th> Genres </th>
                <th> Studio </th>
                <th> Finished </th>
                <th> Start </th>
                <th> Stoped </th>
                <th> Episodes </th>
                <th> Synopsis </th>
            </tr>
            <?php
                if($resultA->num_rows > 0) {
                        while($row = $resultA->fetch_assoc()) {
                            echo " <tr>
                                <td style='width:5%'> ". $row["etitle"] ." </td>
                                <td style='width:5%'> ". $row["jtitle"] ." </td>
                                <td style='width:10%'> ". $row["genres"] ." </td>
                                <td> ". $row["studio"] ." </td>
                                <td> ". $row["fin"] ." </td>
                                <td> ". $row["start_aired"] ." </td>
                                <td> ". $row["stoped_aired"] ." </td>
                                <td> ". $row["episodes"] ." </td>
                                <td class='synopsis'> ". $row["synopsis"] ." </td>
                            <tr>";
                        }
                }
            ?>
        </table>


        <!-- manga table -->
        <table class="mt" id="mt">
            <tr>
                <th colspan="10"> MANGAS </th>
            </tr>
            <tr>
                <th colspan="2"> Name </th>
                <th colspan="7"> Informations </th>
                <th rowspan="2"> Edit </th>
            </tr>
            <tr>
                <th> English </th>
                <th> Japanese </th>
                <th> Genres </th>
                <th> Authors </th>
                <th> Finished </th>
                <th> Start </th>
                <th> Stoped </th>
                <th> Chapters </th>
                <th> Synopsis </th>
            </tr>
            <?php
                if($resultM->num_rows > 0) {
                        while($row = $resultM->fetch_assoc()) {
                            echo " <tr>
                                <td style='width:5%'> ". $row["etitle"] ." </td>
                                <td style='width:5%'> ". $row["jtitle"] ." </td>
                                <td style='width:10%'> ". $row["genres"] ." </td>
                                <td> ". $row["authors"] ." </td>
                                <td> ". $row["fin"] ." </td>
                                <td> ". $row["start_aired"] ." </td>
                                <td> ". $row["stoped_aired"] ." </td>
                                <td> ". $row["chapters"] ." </td>
                                <td class='synopsis'> ". $row["synopsis"] ." </td>
                            <tr>";
                        }
                }
            ?>
        </table>


        <!-- script for the popup form -->
        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
                document.getElementById("fm").style.display = "none";
            }

            function openFormA() {
                document.getElementById("fm").style.display = "none";
                document.getElementById("fa").style.display = "block";
            }

            function openFormM() {
                document.getElementById("fa").style.display = "none";
                document.getElementById("fm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }

            function openTableU() {
                if(document.getElementById("ut").style.display === "none") {
                    document.getElementById("at").style.display = "none";
                    document.getElementById("mt").style.display = "none";
                    document.getElementById("ut").style.display = "block";
                }
                else {
                    document.getElementById("ut").style.display = "none";
                }
            }

            function openTableA() {
                if(document.getElementById("at").style.display === "none") {
                    document.getElementById("ut").style.display = "none";
                    document.getElementById("mt").style.display = "none";
                    document.getElementById("at").style.display = "block";
                }
                else {
                    document.getElementById("at").style.display = "none";
                }
            }

            function openTableM() {
                if(document.getElementById("mt").style.display === "none") {
                    document.getElementById("ut").style.display = "none";
                    document.getElementById("at").style.display = "none";
                    document.getElementById("mt").style.display = "block";
                }
                else {
                    document.getElementById("mt").style.display = "none";
                }
            }
            
        </script>
    </body>

</html>