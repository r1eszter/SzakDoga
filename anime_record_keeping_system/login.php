<?php $pagename='LOGIN'; 

    session_start();
    $_SESSION['loggedin'] = false;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include('components/connection.php'); 
        
        $username = $_POST['user'];  
        $password = $_POST['pass'];  
        
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  

            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            
            /* PFP database try */
            /*$pfp = $con->query("SELECT pfp FROM user WHERE username = $username");*/            

            $_SESSION['username'] = "login first";

            if($count == 1)
            {  
                $_SESSION['loggedin'] = true;
                header("Location: myacc.php");
                $_SESSION['username'] = $username;
                $_SESSION['roles'] = $row['roles'];
            }
            else {
                echo "<div class='alert'> Invalid username or password! <br> Try again. </div>";
            }    
    }
?>


<!doctype html>
<html lang="en">
<head>  
    <title>Login</title>  
    <link href="design/log.css" rel="stylesheet" type="text/css" >   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        body {
            background-image: url("img/backgrd.jpg"); 
        }

        /* alert for invalid username or psw */
        .alert {
            margin: auto;
            margin-top: 10px;
            width: fit-content;
            height: 50px;
            border: none;
            padding: 5px;
            text-align: center;
            border-radius: 19px;
            background: #9e0000;
            box-shadow: inset -29px -29px 44px #540000,
            inset 29px 29px 44px #e80000;
            color: #fff;
            font-size: 20px;
        }
    </style>

</head>  

<body>

    <div class="sidenav">
        <p class="name"> Anime <br> Above All </p>

        <?php 
            if ($_SESSION['loggedin'] != true) {
                echo "<img class='pfp' src=\"img/nopfp.jpg\" alt=\"PFP\" />";
                echo "<h2 class='uname'> login first </h2>";
            }
            else {
                     /*PFP database try*/
                    /* while($row = $pfp->fetch_assoc()) {
                        echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode( $row['image'] ).'"/>';
                    } */
                    echo "<img class='pfp' src=\"img/".$_SESSION['username'] ."PFP.jpg\" alt=\"PFP\" />";
                    echo "<h2 class='uname'> ".$_SESSION['username'] ." </h2>";
            }
        ?>
        

        <br><br>

        <a href="home.php"> <i class="material-icons">home</i> Home </a>
        <a href="signup.php"> <i class="material-icons">add_reaction</i> Sign Up </a>
    </div>


    <div class="inner">  
        <div class="title"> Login </div>
        <form name="f1" action="login.php"  method="POST">  
            
            <div>   
                <input placeholder="UserName" type="text" id="user" name="user" oninvalid="InvalidMsg(this);" required/>  
            </div>  
            
            <div>   
                <input placeholder="Password" type="password" id ="pass" name ="pass" oninvalid="InvalidMsg(this);" required/>  
            </div> 
            
            <button type="submit">
		        Let's Go!
		    </button>  

        </form>  
    </div>  
  
    <script>   
            function InvalidMsg(textbox) {
            if (textbox.value == '') {
                textbox.setCustomValidity('Please fill out this field');
            }
            else {
                textbox.setCustomValidity('');
            }
            return true;
            }
    </script> 


</body>     
</html>  