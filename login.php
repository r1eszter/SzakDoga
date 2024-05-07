<?php $pagename='LOGIN'; 
    session_start();
    $_SESSION['loggedin'] = false;
    $backgroundImage = 'url("img/login.png")';

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
            
            if($count == 1)
            {  
                $_SESSION['loggedin'] = true;
                header("Location: myacc.php");
                $_SESSION['username'] = $username;
                $_SESSION['roles'] = $row['roles'];
            } 
            else
            {
                $backgroundImage = 'url("img/login_alert.png")';
            }

            echo '<style>';
            echo '#myDiv {background-image: '.$backgroundImage.';}';
            echo '#myDiv {width : 70%;}';
            echo '#myDiv {height : 90%;}';
            echo '#myDiv {margin-left : -6%;}';
            echo '#myDiv {margin-top : 8%;}';
            echo '</style>';
    }
?>


<!doctype html>
<html lang="en">
<head>  
    <title>Login</title>  
    <link href="log.css" rel="stylesheet" type="text/css" >   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "icon" href = "img/jp.png" type = "image/x-icon">
    
    <style>
        body {
            background-image: url("img/background.jpg"); 
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>  

<body>

    <!-- I wanna make it upper -->
    <div class="uppernav">

        <a href="home.php"> <div class="name">  Anime Above All </div> </a>

        <div class="minis">
            <a class="minibut" href="signup.php"> <button> <i class="material-icons">add_reaction</i> </button> </a>
        </div>
    </div>


    <!-- image change try -->
    <div id="myDiv" class="img_there"></div>
    

    <!-- LOGIN FORM -->
    <div class="inner"> 
        <div class="title"> Hello! <br> Welcome Back </div>
        <form name="f1" action="login.php"  method="POST">  
            
            <div>   
                <input placeholder="UserName" type="text" id="user" name="user" value="<?php echo isset($_POST['user']) ? htmlspecialchars($_POST['user']) : ''; ?>" oninvalid="InvalidMsg(this);" required/>  
            </div>  
            
            <div>   
                <input placeholder="Password" type="password" id ="pass" name ="pass" value="<?php echo isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : ''; ?>" oninvalid="InvalidMsg(this);" required/>  
            </div> 

            <!-- forgot password place -->
            
            <div class="center">
                <button type="submit">
                    Let's Go!
                </button>
            </div>  

            <!-- line -->
            <hr width="95%"/>

            <!-- Dont have an account?  Create Account! -->
            <h2>Don't have an account? <a href="signup.php">Create Account!</a></h2>

        </form>  
    </div>  
  
    <script>   
            //check for every input has text
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