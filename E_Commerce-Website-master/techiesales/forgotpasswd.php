<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  if (isset($_POST['submit']))
{
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
           //Recipient name is optional

          //Address to which recipient will reply
          $mail->addReplyTo("yashp6765@gmail.com", "Reply");

          //CC and BCC
          $mail->addCC("cc@example.com");
          $mail->addBCC("bcc@example.com");

          //Send HTML or Plain Text email
          $mail->isHTML(true);

          $mail->Subject = "Subject Text";
          $mail->Body = "<i>Mail body in HTML</i>";
          $mail->AltBody = "This is the plain text version of the email content";

          if(!$mail->send()) 
          {
              echo "Mailer Error: " . $mail->ErrorInfo;
          } 
          else 
          {
              echo "Message has been sent successfully";
              
          }
}

}
//PHPMailer Object

          
?>
<!DOCTYPE html>
<html>
<head>
	<title> forgot password</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	 <link rel="icon" href="kicon.png">
	<link rel="stylesheet" href="demo1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <style type="text/css">
      body{
    margin:0;
    padding: 0;
    font-family: sans-serif;
    background-size: cover;
    height: 800vh auto;
    width: 100%;
    background-attachment: fixed;
    wekit-background-attachment: fixed;
    -o-background-attachment: fixed;
    -moz-background-attachment: fixed;
}


#main{
    width:100%;
    height: 100vh;
    background-size:cover;
}

nav{
    
    display: flex;
    width: 100%;
    height: 65px;
    background-color:#000;
    background:rgba(0,0,0,0.9);
    line-height: 65px;
    position: sticky;
    min-height: 8vh;
}


nav #sidebar{
    position: absolute;
    top: 65px;
    height: 100%;
    width: 20%;
    left: -20%;
    transition: left 750ms linear;
    z-index: 1;
    


}



nav #sidebar.active{
    left: 0px;

    
}

nav #sidebar > .list > .item
{
    color:#fff;
    padding: 0px 0px;
    border-bottom: 1px solid #448;
    text-align: center;
    font-family: sans-serif;
    background: black;
    list-style-type: none;

}
nav #sidebar > .list > .item:hover
{
    background-image: linear-gradient(to right bottom, #9540eb, #b135e0, #c82ad4, #db1ec7, #eb12ba);
}
nav #sidebar > .list > .item a
{
    text-decoration: none;
    color: #fff;
}

nav #toggle-btn
{
    position: fixed;
    left: 20px;
    top: 20px;

}

/*nav #toggle-btn span
{
    width: 30px;
    height: 5px;
    background: #fff;
    display: block;
    margin: 4px 0px;
    cursor: pointer;
}*/
nav #toggle-btn .one,.two,.three
{
    width: 35px;
    height: 4px;
    background: #fff;
    display: block;
    margin: 4px 0px 0px 0px;
    cursor: pointer;
    top: 100%;
    transition: 1s;


}
nav #toggle-btn.active .one
{
    
    margin: 20% 30% -30% -10%;
    transform: rotate(45deg);
    background-image: linear-gradient(to right bottom, #9540eb, #b135e0, #c82ad4, #db1ec7, #eb12ba);
    transition: 1s;
  
}
nav #toggle-btn.active .two
{
    opacity: 0;
    transition: 750ms ;
    transform: rotate(360deg);
  
}
nav #toggle-btn.active .three
{
    
    margin: -5% 20% 250% -10%;
    transform: rotate(-45deg);
    transition: 1s;
    background-image: linear-gradient(to right bottom, #9540eb, #b135e0, #c82ad4, #db1ec7, #eb12ba);
    
    
}


.nav-links{
  display: flex;
  justify-content: space-around;
  float:right;
  margin-right: 30px;
  margin:0 0 5px auto;  
  list-style-type: none;  

}



.nav-links li a{
  list-style-type: none;
  display: inline-block;
  float: right;
  position: relative;
}


.nav-links li a:hover{
     background-image: linear-gradient(to right bottom, #9540eb, #b135e0, #c82ad4, #db1ec7, #eb12ba);
     


}

.nav-links  a{
  text-decoration:none;
  color:#fff;
  padding:0 30px;

}
.nav-links  a:hover{
  color:black;
}

nav .lines{
  display: none;
  cursor: pointer;
  color: #fff;
  float: right;
  

}





  </style>
</head>
<body>

	 
            
            
        
    <script type="text/javascript">
     function togglesidebar()
     {
        document.getElementById('sidebar').classList.toggle("active");
        document.getElementById('toggle-btn').classList.toggle("active");
     }   
    </script>

        <div class="main">
            <nav >
                <div id="sidebar">
                    <div class="list">
                    
                            <div class="item"><li><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></ii></div>
                            <div class="item"><li><a href="login.php"><i class="fa fa-lock" aria-hidden="true"></i>

  Login</a></ii></div>
                            <div class="item"><li><a href="register.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</a></ii></div>  

              
                        <!--<div class="item"><a href="index.html"><i class="fa fa-fw fa-home"></i> Home</a></div>
                        <div class="item"><a href="register.php"><i class="fa fa-fw fa-home"></i> Signup</a></div>
                        <div class="item"><a href="login.php"><i class="fa fa-fw fa-home"></i> Login</a></div>-->
                    </div>
                    <div id="toggle-btn" onclick="togglesidebar()">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div>
                </div>

            
                 <ul class="nav-links">

                  
                    
                    <li><a href="#home" ><i class="fa  fa-heart"></i> wishlist</a></li>
                    <li><a href="#home"><i class="fa fa-shopping-cart"></i> cart</a></li>
                    

                    
                </ul>


                <!--<div class="lines">
                   <i class="fa fa-bars" aria-hidden="true" ></i>
                </div>-->
            </nav>
        </div>
                
           

            
                 

	
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            
             <div class="panel-body">
                <div class="text-center">
                 <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center" >Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="POST">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="emailid" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

</body>
</html>