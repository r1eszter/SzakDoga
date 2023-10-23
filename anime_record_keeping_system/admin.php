<?php
    $pagename='ADMIN';
    require('components/connection.php');
    
    $sql = "SELECT * FROM anime";
    $result = $con->query($sql);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Include file which makes the
        // Database Connection.
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
        
        <!-- form -->
        <div class="form-popup" id="myForm">
            <form action="admin.php" class="form-container" method="POST">
                <h1>Add</h1>

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
                
                <button type="submit" class="btn">Add</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
        

        <!-- web page name -->
        <div class="name">
            <h1> Administration </h1>
        </div>

        <div class="choose">
            <label onclick="openTable1()"> Anime </label>
            <label for="manga"> Manga </label>
        </div>


        <!-- anime table -->
        <table class="at">
            <tr>
                <th colspan="2"> Name </th>
                <th colspan="7"> Informations </th>
                <th> Edit </th>
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
                if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
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


        <!-- script for the popup form -->
        <script>
            function openForm() {
            document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
            document.getElementById("myForm").style.display = "none";
            }
            
        </script>
    </body>

</html>