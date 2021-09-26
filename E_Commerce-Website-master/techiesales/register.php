<?php
require_once "config.php";

$firstname=$lastname = $emailid = $username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = $firstname_err = $lastname_err = $emailid_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
             echo"<font color = '#fff'><p align='center' >Username cannot be blank</p></font>";
    }
    else{
        $sql = "SELECT id FROM account1 WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is not available "; 
                    //echo "$username_err";
                    echo "<script type='text/javascript'>  window.onload = function(){alert(\"$username_err\");}</script>";
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

            // Check for password
            if(empty(trim($_POST['password']))){
                $password_err = "Password cannot be blank";
            }
            elseif(strlen(trim($_POST['password'])) < 5){
                $password_err = "Password cannot be less than 5 characters";
                echo "<script type='text/javascript'>  window.onload = function(){alert(\"$password_err\");}</script>";

            }
            else{
                $password = trim($_POST['password']);
            }

            // Check for confirm password field
            if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
                $password_err = "Password and Confirm Password do not match";
                echo "<script type='text/javascript'>  window.onload=function(){alert(\"$password_err\");}</script>";
                echo "<return false>";

            }
            
            

            //check for firstname
            if(empty(trim($_POST['firstname']))){
                $firstname_err = "firstname  compulsory";
            }
            else{
                $firstname = trim($_POST['firstname']);
            }
            //check for lastname
            if(empty(trim($_POST['lastname']))){
                $lastname_err = "lastname compulsory";
            }
            else{
                $lastname = trim($_POST['lastname']);
            }

            //check for email
           if(empty(trim($_POST['emailid']))){
                    $emailid_err = "lastname compulsory";
                }
                else{
                    $emailid = trim($_POST['emailid']);
                }

	

            


            // If there were no errors, go ahead and insert into the database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($emailid_err))
            {
                $sql = "INSERT INTO account1 (firstname, lastname, emailid, username, password) VALUES (?, ? , ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                if ($stmt)
                {
                    mysqli_stmt_bind_param($stmt, "sssss", $param_firstname , $param_lastname , $param_emailid , $param_username, $param_password);

                    // Set these parameters
                    $param_firstname =$firstname;
                    $param_lastname = $lastname;
                    $param_emailid = $emailid;
                    $param_username = $username;
                    $param_password = password_hash($password, PASSWORD_DEFAULT);

                    // Try to execute the query
                    if (mysqli_stmt_execute($stmt))
                    {

                        session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: index.html");
                            require_once "phpmailer/PHPMailerAutoload.php";
                            require_once "phpmailer/class.smtp.php";
                            require_once "phpmailer/class.phpmailer.php";
                            $mail = new PHPMailer;
                            $mail->SMTPDebug = 0;                               
                            $mail->isSMTP();   
                            $mail->Host='smtp.gmail.com';
                            $mail->Port=587;
                            $mail->Charset='UTF-8';
                            $mail->SMTPAuth=true;
                            $mail->SMTpSecure='tls';
                            $mail->Username='yashp6765@gmail.com';
                            $mail->Password='9930566724yash';
                            //From email address and name
                            $mail->From = "yashp6765@gmail.com";
                            $mail->FromName = "Full Name";
                            //To address and name
                            $mail->addAddress($_POST['emailid']);
                             //Recipient name is optiona
                            //Address to which recipient will reply
                            $mail->addReplyTo("yashp6765@gmail.com", "Reply");
                            //CC and BCC
                            $mail->addCC("cc@example.com");
                            $mail->addBCC("bcc@example.com");
                            //Send HTML or Plain Text email
                            $mail->isHTML(true);
                            $mail->Subject = "successfully register";
                            $mail->Body = '<h1 align=center>WELCOME TO TECHIE SALES</h1>
                            <p>hi' .$_POST['firstname']. '</p>
                            <p>thank you for registration in techie sales</p>';
                            $mail->AltBody = "This is the plain text version of the emaicontent";
                            if(!$mail->send()) 
                            {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } 
                            else 
                            {
                                echo "Message has been sent successfully";
                                
                            }
                            

                        header("location: login.php");
                    }
                    else{
                        echo "Something went wrong... cannot redirect!";
                    }
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($conn);
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
	<title>online shopping site for mobile,electronics,laptop,cloth</title>
	<link rel="stylesheet" href="regstylingsheet.css">
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	
	

	
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
			
			<h2>signup form</h2>

			<form autocomplete="off" action="" method="POST">
				<div class="input-icon">
					<i class="fa fa-user-circle icon" ></i>
					<input type="text"  name="firstname" placeholder="First Name "  required="" autofocus="" />
					<i class="fa fa-user-circle icon" ></i>
					<input type="text"  name="lastname" placeholder="Last Name " required="" autofocus="" />
					<i class="fa fa-user icon"></i>
					<input type="text"  name="username" placeholder="User Name " required="" autofocus="" />
					<i class="fa fa-envelope icon"></i> 
					<input type="email"  pattern=".+@gmail.com" name="emailid" placeholder="Email Id .." data-toggle="tooltip" data-placement="top" title="please provide email-address which contain domain as gmail.com" required="" autofocus="" />
					<i class="fa fa-lock icon" ></i>
					<input type="password"  name="password" placeholder="Password  " autocomplete="new-password" required="" autofocus="" autofocus="" />
					<i class="fa fa-lock icon" ></i>
					<input type="password"  name="confirm_password" placeholder="re-enter Password " autocomplete="new-password" required="" autofocus="" />
			
				<!--<input type="submit" value="submit">-->
                    <button type="submit" value="submit" >Register</button><br> 
                    <p class="login_link">already have an account?
                    <a href="login.php">login here</a></p>
            </div>
			</form>
		
	</div>
</body>

</body>
</html>