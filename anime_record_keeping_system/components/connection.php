<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "weeb_records";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  


    //test the connection : http://localhost/anime_record_keeping_system/components/connection.php
    /*if($con) {
        echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
        //the concrete error code
    } */
?>  