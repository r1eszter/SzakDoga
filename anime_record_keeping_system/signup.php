<?php $pagename='SIGNUP'; ?>

<?php
$exists=false;
	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include('components/connection.php');  
	
	$username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $againp = $_POST['againp'];
	

	$sql = "select * from user where username='$username'";
	$result = mysqli_query($con, $sql);
	$num = mysqli_num_rows($result);
	
	// This sql query is use to check if
	// the username is already present
	// or not in our Database
	if($num == 0) {
		if(($password == $againp) && $exists==false) {
				
			$sql = "INSERT INTO `user` ( `username`, `email`,
				`password`) VALUES ('$username', '$email',
				'$password')";
	
			$result = mysqli_query($con, $sql);

            echo "<div class='great'> Successfull sign up! :D <br> Now go to Login and start your journey! </div>";     
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



<html>
<head>  
    <title>Sign Up</title>  
    <link href="login.css" rel="stylesheet" type="text/css" >   

    <style>
        body {
            background-image: url("img/backgrd.jpg"); 
        }

        .great {
            width: 100%;
            height: 5%;
            text-align: center;
            background-color: #66bb6a;
            color: #fff;
            font-size: 20px;
        }

        .alert {
            width: 100%;
            height: 5%;
            text-align: center;
            background-color: #f44336;
            color: #fff;
            font-size: 20px;
        }

        .title {
            margin: 25px 0 20px 0;
        }

        form {
            gap: 20px;
        }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head> 

<body>

    <div class="sidenav">
        <p class="name"> Anime Above All </p>

        <img src="img/naruto.jpg" alt="PFP">
        <h2 class="uname"> username </h2>

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