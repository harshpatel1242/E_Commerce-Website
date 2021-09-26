<?php

 

//fetch_data.php
session_start();

include "config.php";
$connect = new PDO("mysql:host=localhost;dbname=register", "root", "");
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cart']))
$status="";
if (isset($_POST['product_id']) && $_POST['product_id']!=""){
$code = $_POST['product_id'];
//echo "$code";
$result = mysqli_query($conn,"SELECT * FROM `product` WHERE `product_id`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['product_name'];
$code = $row['product_id'];
$price = $row['product_price'];
$image = $row['product_image'];

$cartArray = array(
  $code=>array(
  'product_name'=>$name,
  'product_id'=>$code,
  'product_price'=>$price,
  'product_quantity'=>0,
  'product_image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
  $_SESSION["shopping_cart"] = $cartArray;
  $status = "<div class='box'>Product is added to your cart!</div>";
}else{
  $array_keys = array_keys($_SESSION["shopping_cart"]);
  if(in_array($code,$array_keys)) {
    $status = "
    Product is already added to your cart!"; 
     echo "<script type='text/javascript'>  window.onload = function(){alert(\"$status\");}</script>"; 
  } else {
  $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
  $status = "<div class='box'>Product is added to your cart!</div>";
   echo "<script type='text/javascript'>  window.onload = function(){alert(\"$status\");}</script>";
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
  <title>online shopping site for mobile,electronics,laptop,cloth</title>
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <link rel="stylesheet" type="text/css" href="indexstyle.css">
   <link rel="stylesheet" type="text/css" href="style.css">

  


  
</head>
<body>
    <script type="text/javascript">
     function togglesidebar()
     {
        document.getElementById('sidebar').classList.toggle("active");
        document.getElementById('toggle-btn').classList.toggle("active");
     }   
    </script>
    <script>
      function showResult(str) {
        if (str.length==0) {
          document.getElementById("livesearch").innerHTML="";
          document.getElementById("livesearch").style.border="0px";
          return;
        }
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="0px";
          }
        }
        xmlhttp.open("GET","livesearch.php?q="+str,true);
        xmlhttp.send();
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

                            <div class="item"><li><a href="#">Categories</a></li>
                              <ul class="sub-menu">
                            <li><a href="filter.php">smart_phone</a></li>
                            <li><a href="#home">television</a></li>
                        </ul> 

                      </div>

              
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

               <div class="container">
                  <input type="text" class="input" placeholder="Search..." onkeyup="showResult(this.value)">
                  <div class="search" ></div>
                  <div id="livesearch" class="searchbar"></div>
                </div>

                <!--<div class="lines">
                   <i class="fa fa-bars" aria-hidden="true" ></i>
                </div>-->
            </nav>
        </div>



    
    
<section class="p1">
      <div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="slider">
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="images/dell1.jpeg" style="width:100%">
    
  </div>

  <div class="mySlides fade">
    <img src="images/dell2.jpeg" style="width:100%">
    <div class="numbertext">2 / 3</div>
    
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="images/laptop4.jpeg" style="width:100%">
    
  </div>

 
  <!-- Next and previous buttons -->
  <!--<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>-->
</div>
<br>

<!-- The dots/circles -->
<div class="dot" style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>
  </section>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
		    					<div class="col-md-7">
		    						<p class="new-arrival text-center">NEW</p>
                    <form method="POST" action="">
		    						<h2>Lenovo Ideapad 330 Core i5 8th Gen - (8 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) 330-15IKB Laptop  (15.6 inch, Onyx Black, 2.2 kg)</h2>
		    						<p>Sold by Appario Retail Private Ltd.</p>
		    						<i class="fa fa-star"></i>
		    						<i class="fa fa-star"></i>
		    						<i class="fa fa-star"></i>
		    						<i class="fa fa-star"></i>
		    						<i class="fa fa-star-half-o"></i>
		    						<p class="price">INR Rs.53,490</p>
		    						<p><b>Avialability: </b>In Stock</p>
		    						<p><b>Condidtion: </b>NEW</p>
		    						<label><b>Quantity: </b> </label>
		    						<input type="text" value="1">
		    						<button type="submit" class="btn-btn-primary" name="cart">Add to cart</button>
		    					</div>
				</div>	
			</div>
		</section>
		<section class="description">
			<div class="container">
				<h6>Product Discription</h6>
				<p>
					Processor :	Up to 8th Gen Intel® Quad Core i7-8550U<br>
					Operating System :Windows 10 Home <br> 
					Graphics:  Up to NVIDIA® GeForce® GTX1050
    Up to AMD Radeon™ 540
    Intel Integrated Graphics<br>
    				Display : 15.6” FHD (1920 x 1080) IPS
    15.6” HD (1366 x 768)<br>
    				Memory 	:  4 GB onboard DDR4 + 8 GB DIMM
    4 GB onboard DDR4 + 4 GB DIMM
    4 GB onboard DDR4 + 2 GB DIMM
    16 GB DIMM
    4 GB onboard DDR4
    16 GB Intel® Optane™ (optional)<br>
	

Storage : 128 GB PCIe SSD
    256 GB PCIe SSD
    500 GB SATA HDD
    1 TB SATA HDD
    2 TB SATA HDD
    128 GB PCIe SSD + 1 TB SATA HDD
    256 GB PCIe SSD + 1 TB SATA HDD
<br>
    
Battery :Up to 6 hours*; Rapid Charge (Charge 15 minutes for up to 2 hours use**)
*Based on testing with MobileMark 2014. Battery life varies significantly with settings, usage, & other factors.
**Power-off mode; requires 65W power source<br>
	

   



  
	

   
	


				</p>
			</div>		
		</section>
	</body>
</html>