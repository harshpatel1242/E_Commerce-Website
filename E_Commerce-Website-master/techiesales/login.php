


<?php

//This script will handle login

session_start();


// check if the user is already logged in

require_once "config.php";
require_once "google.php";


$username = $password = "";
$err = $err1 ="";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim(isset($_POST['username']))) || empty(trim(isset($_POST['password']))))
    {
        $err = "Please enter username + password";
        
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM account1 WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: index.php");
                        }
                    }

                }
        else
        {
            $err1 ="please enter valid username and password";
            echo "<script type='text/javascript'> window.onload = function(){alert(\"$err1\");}</script>";
          	echo "return False";
        }
       

    }
}    


}


?>





















<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<meta name="google-signin-client_id" content="150332019414-8h63otdebob2uhsgeucun4pcafdq087g.apps.googleusercontent.com">
	<title>online shopping site for mobile,electronics,laptop,cloth</title>
	<link rel="stylesheet" href="loginstyle.css">
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	
	
	
</head>
<body>

        <div class="main">
            <nav >
            
                <ul class="nav-links">
                    <li><a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></ii>
                    <li><a href="#home" ><i class="fa  fa-heart"></i> wishlist</a></li>
                    <li><a href="#home"><i class="fa fa-shopping-cart"></i> cart</a></li>

                    
                </ul>

               
            </nav>
        </div>

        <div class="wrap">
			
			<h2>login form</h2>

			<form autocomplete="off" action="" method="POST">
				<div class="input-icon">
					
					<i class="fa fa-user icon"></i>
				<div class="inputbox">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
					<i class="fa fa-lock icon" ></i>
					<div class="inputbox">
					<input type="password"  name="password"  autocomplete="new-password" required="" >
					<label>password</label>
					</div>
                
			</div>
			
				<!--<input type="submit" value="submit">-->
                <button type="submit" value="submit" >login</button><br> 
                <p class="login_link">don't have account?
                <a href="register.php">sinup here</a></p><br>
                <p class="login_link">forgot password 
                <a href="forgotpasswd.php">click here</a></p>
                
                <div id="pl-left">
        <div id="panel">
            <a href="https://accounts.google.com/signin/oauth/oauthchooseaccount?client_id=150332019414-8h63otdebob2uhsgeucun4pcafdq087g.apps.googleusercontent.com&as=pfm8XxZ9bm0k3N92U_x0Hw&destination=http%3A%2F%2Flocalhost&approval_state=!ChRYdi1qa2RoQmt4ZFRIaEpndzlzeBIfTXlIRjBJcnJyNlllOEhuU1JuY2dubXBleElNdjFSWQ%E2%88%99AJDr988AAAAAXYcy16AmD4_b4Zz8AhavNWZEHEhG10ln&oauthgdpr=1&xsrfsig=ChkAeAh8T15JtXk_JLA7GwFH9CFdCWCG35L5Eg5hcHByb3ZhbF9zdGF0ZRILZGVzdGluYXRpb24SBXNvYWN1Eg9vYXV0aHJpc2t5c2NvcGU&flowName=GeneralOAuthFlow"><img src="capture.png">
            
        
        <div id="sidepanel">
            <h2>Google_login</h2>
            
        </div></a>
        </div>
    </div>
			</form>
		
	</div>
    
    
	
</body>

</body>
</html>