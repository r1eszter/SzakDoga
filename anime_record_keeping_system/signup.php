<?php $pagename='SIGNUP'; 
    $exists=false;
    session_start();
        
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Include file which makes the
        // Database Connection.
        include('components/connection.php');  
        
        $username = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $againp = $_POST['againp'];
        

        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
        
        // This sql query is use to check if
        // the username is already present
        // or not in our Database
        if($num == 0) {
            if(($password == $againp) && $exists==false) {
                    
                $sql = "INSERT INTO `user` ( `username`, `email`,
                    `password`, `permission`) VALUES ('$username', '$email',
                    '$password', 'general')";
        
                $result = mysqli_query($con, $sql);

                echo "<div class='great'> Successfull sign up! :D <br> Now go to Login and start your journey! </div>";     
                
                //email sending try
                //$msg = "Welcome to my page $username! \n You successfully signed up!";
                //$msg = wordwrap($msg,70);
                //mail($email, "Welcome Letter", $msg);
            }
            else {
                echo "<div class='alert'> Passwords do not match! <br> Make sure to type the same password for both place! </div>";
            }	
        }// end if
        
        if($num>0)
        {
            echo "<div class='alert'> Username already in use sorry. <br> Please figure out a new one. </div>";
        }
        
    }	
?>


<!doctype html>
<html lang="en">
<head>  
    <title>Sign Up</title>  
    <link href="sign.css" rel="stylesheet" type="text/css" >   

    <style>
        body {
            background-image: url("img/backgrd.jpg"); 
        }

        .great {
            margin: auto;
            margin-top: 10px;
            width: fit-content;
            height: 50px;
            border: none;
            text-align: center;
            border-radius: 19px;
            background: #0b9e00;
            box-shadow: inset -29px -29px 44px #065400,
            inset 29px 29px 44px #10e800;
            color: #fff;
            font-size: 20px;
        }

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

        .title {
            margin: 25px 0 20px 0;
        }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
        <a href="login.php"> <i class="material-icons">login</i> Login </a>
    </div>

    <div class="inner">  
        <div class="title"> Sign Up </div>  
        <form name="f2" action="signup.php" method="POST">  
            <div>   
                <input placeholder="UserName" type="text" id="user" name="user" oninvalid="InvalidMsg(this);" required/>  
            </div> 

            <div>  
                <input placeholder="Email" type="email" id="email" name="email" oninvalid="InvalidMsg(this);" required/>  
            </div> 

            <div>   
                <input placeholder="Password" type="password" id="pass" name="pass" oninvalid="InvalidMsg(this);" required/>  
            </div> 

            <div>  
                <input placeholder="Password Again" type="password" id="againp" name="againp" oninvalid="InvalidMsg(this);" required/>  
            </div> 
            
            <button type="submit">
		        Sign Up!
		    </button> 

        </form>  
    </div>


    <script>   
            function InvalidMsg(textbox) {
            if (textbox.value == '') {
                textbox.setCustomValidity('Please fill out this field');
            }
            else if (textbox.validity.typeMismatch){
                textbox.setCustomValidity('Please write a valid e-mail address in the marked field.');
            }
            else {
                textbox.setCustomValidity('');
            }
            return true;
            }
    </script> 

</body>
</html>