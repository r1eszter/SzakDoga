<?php $pagename='SIGNUP'; 
    $exists=false;
    session_start();
    $backgroundImage = 'url("img/login.png")';
        
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
                /* passwords dont mach */
                $backgroundImage = 'url("img/psw_alert.png")';
            }	
        }// end if
        
        if($num>0)
        {
            /* username already in use */
            $backgroundImage = 'url("img/usern_alert.png")';
        }

        echo '<style>';
        echo '#myDiv {background-image: '.$backgroundImage.';}';
        echo '#myDiv {width : 70%;}';
        echo '#myDiv {height : 90%;}';
        echo '#myDiv {margin-left : -8%;}';
        echo '#myDiv {margin-top : 7%;}';
        echo '</style>';
        
    }	
?>


<!doctype html>
<html lang="en">
<head>  
    <title>Sign Up</title>  
    <link href="signup.css" rel="stylesheet" type="text/css" >   
    <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
    
    <style>
        body {
            background-image: url("img/background.jpg"); 
            background-repeat: no-repeat;
            background-size: cover;
        }

        .title {
            margin: 25px 0 20px 0;
        }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head> 

<body>

    <!-- I wanna make it upper -->
    <div class="uppernav">
        <a href="home.php"> <div class="name">  Anime Above All </div> </a>

        <div class="minis">
            <a class="minibut" href="login.php"> <button> <i class="material-icons">face</i> </button> </a>
        </div>
    </div>


    <!-- image change try -->
    <div id="myDiv" class="img_there"></div>


    <!-- SIGNUP FORM -->
    <div class="inner">  
        <div class="title"> Sign Up </div>  
        <form name="f2" action="signup.php" method="POST">  
            <div>   
                <input placeholder="UserName" type="text" id="user" name="user" value="<?php echo isset($_POST['user']) ? htmlspecialchars($_POST['user']) : ''; ?>" oninvalid="InvalidMsg(this);" required/>  
            </div> 

            <div>  
                <input placeholder="Email" type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" oninvalid="InvalidMsg(this);" required/>  
            </div> 

            <div>   
                <input placeholder="Password" type="password" id="pass" name="pass" value="<?php echo isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : ''; ?>" oninvalid="InvalidMsg(this);" required/>  
            </div> 

            <div>  
                <input placeholder="Password Again" type="password" id="againp" name="againp" value="<?php echo isset($_POST['againp']) ? htmlspecialchars($_POST['againp']) : ''; ?>" oninvalid="InvalidMsg(this);" required/>  
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