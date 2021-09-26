
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
   <link rel="stylesheet" type="text/css" href="main.css">

  


  
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
                    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> cart</a></li>
                    

                    
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
    <div class="numbertext"></div>
    <img src="image/iphone.webp" style="width:100%">
    <div class="text">IPHONE MAX 11 PRO</div>
  </div>

  <div class="mySlides fade">
    <img src="images/redmi.jpg" style="width:100%">
    <div class="numbertext"></div>
    <div class="text">REDMI SMARTPHONE</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="images/miband1.jpg" style="width:100%">
    <div class="text">MI BANDS</div>
  </div>

 <div class="mySlides fade">
    <div class="numbertext"></div>
    <img src="images/headphone.jpg" style="width:100%">
    <div class="text">HEADPHONE</div>
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
      
<button><a href="filter.php">view all</a></button>     
<div id="heading1">
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-bottom:1%;margin-left:1.5%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/mobile1.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">redmi Note 8</p>
  </div>
</div>
</a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/mobile2.jpg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Iphone XR</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/mobile3.jpg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Asus zenphone</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/mobile4.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Vivo</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/mobile5.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Oppo</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/mobile.jpg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Realme</p>
  </div>
</div>
</a>
</div>

<div id="heading1">
<a href="Harsh/index1/msilapy.html" target="_blank"><div style="float:left;margin-top:1%;margin-bottom:1%;margin-left:1.5%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;"><img style="vertical-align: middle;width:100%;" src="images/lapy1.jpg" alt="#">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">msi Laptop</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/laptop1.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">HP Laptop</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/laptop2.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Mac book</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/laptop3.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Dell Laptop</p>
  </div>
</div>
  </a>
<a href="lenovo.php" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;"><img style="vertical-align: middle;width:100%;" src="images/laptop4.jpeg" alt="#">
  <div style="padding:3px;"><p style="font-size:1vw;font-weight:bold;">Lenevo Laptop</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/laptop5.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Gaming laptop</p>
  </div>
</div>
</a>
</div>

<div id="heading1">
<a href="Harsh/index1/sonyhead.html" target="_blank"><div style="float:left;margin-bottom:1%;margin-top:1%;margin-left:1.5%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;"><img style="vertical-align: middle;width:100%;" src="images/headphone1.jpeg" alt="#">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">headphone</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/miband3.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Miband 3</p>
  </div>
</div>
  </a>
<a href="Harsh/index1/smarttv.html" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/smarttv.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Smart tv</p>
  </div>
</div>
  </a>
<a href="Harsh/index1/watch.html" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/smartwatch.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Smart watch</p>
  </div>
</div>
  </a>
<a href="#8" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img style="vertical-align: middle;width:100%;" src="images/boathead.jpeg" alt="#">
  <div style="padding:3px;"><p style="font-size:1vw;font-weight:bold;">Boat headphone</p>
  </div>
</div>
  </a>
<a href="#" target="_blank"><div style="float:left;margin-top:1%;margin-left:1%;width:15%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center;white-space: nowrap;">
  <img src="images/sonyspeaker.jpeg" alt="#" style="vertical-align: middle;width:100%;">
  <div style="padding:3px;">
    <p style="font-size:1vw;font-weight:bold;">Sony speaker</p>
  </div>
</div>
</a>
  </div>

     
    
  
  <div class="footer-bottom">   
    <footer id="footer">

      <iframe class="frame" style="width:100%;"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Shah+and+Anchor+Kutchhi+Engineering+College,+Govandi,+Mumbai,+Maharashtra,+India&amp;aq=0&amp;oq=shah+and+an&amp;sll=37.0625,-95.677068&amp;sspn=34.945679,86.572266&amp;ie=UTF8&amp;hq=Shah+and+Anchor+Kutchhi+Engineering+College,+Govandi,+Mumbai,+Maharashtra,+India&amp;ll=19.048219,72.91165&amp;spn=0.021094,0.032015&amp;t=m&amp;output=embed" &gt;=""><br />
  </iframe><br>
     
     <a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Shah+and+Anchor+Kutchhi+Engineering+College,+Govandi,+Mumbai,+Maharashtra,+India&amp;aq=0&amp;oq=shah+and+an&amp;sll=37.0625,-95.677068&amp;sspn=34.945679,86.572266&amp;ie=UTF8&amp;hq=Shah+and+Anchor+Kutchhi+Engineering+College,+Govandi,+Mumbai,+Maharashtra,+India&amp;ll=19.048219,72.91165&amp;spn=0.021094,0.032015&amp;t=m" style="color:#0000FF" &gt;=""> View Larger Map
      </a>
     <br>
      
    
<p>Shah &amp; Anchor Kutchhi Engineering College<br>
Mahavir Education Trust Chowk, W. T. Patil Marg, Near Dukes Company, Chembur, Mumbai- 400 088.<br>
© Shah &amp; Anchor Kutchhi Engineering College.<p>
         
  </footer>
  </div>
  
</body>
</html>