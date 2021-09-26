<?php

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['product_id'] === $_POST["code"]){
        $value['product_quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
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
<?php
    if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart-div" >
 <span><?php echo $cart_count; ?></span>
</div>
<?php
}?>

                    
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



<title>Demo Shopping Cart</title>
<link rel='stylesheet' href='cartcss.css' type='text/css' media='all' />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <title>online shopping site for mobile,electronics,laptop,cloth</title>

</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>techiesales Shopping Cart</h2>   


<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["product_image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["product_name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["product_id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["product_id"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["product_quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["product_quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["product_quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["product_quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["product_quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "Rs. ".$product["product_price"]; ?></td>
<td><?php echo "Rs. ".$product["product_price"]*$product["product_quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["product_price"]*$product["product_quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs.".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>



</body>
</html>