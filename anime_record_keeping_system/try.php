<?php
    require('components/connection.php');

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
            echo "<h1> You searched for $etitle. </h1>";
/*             echo '<a href="animes/DeathParade.php"></a>';  */       
        }  
        else{  
            echo "<h1> There is no anime like this in the database yet. </h1>";  
        } 
    }
?>