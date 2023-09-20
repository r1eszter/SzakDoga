<?php $pagename='LOGIN'; ?>

<html>  
<head>  
    <title>Login</title>  
    <link href="login.css" rel="stylesheet" type="text/css" >   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        body {
            background-image: url("img/backgrd.jpg"); 
        }
    </style>

</head>  

<body>

    <div class="sidenav">
        <p class="name"> Anime Above All </p>

        <img src="img/naruto.jpg" alt="PFP">
        <h2 class="uname"> username </h2>

        <br><br>

        <a href="home.php"> <i class="material-icons">home</i> Home </a>
        <a href="signup.php"> <i class="material-icons">add_reaction</i> Sign Up </a>
    </div>


    <div class="inner">  
        <div class="title"> Login </div>
        <form name="f1" action="myacc.php"  method="POST">  
            
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