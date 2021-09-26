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


if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM product WHERE product_status = '1'
 ";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
   AND product_brand IN('".$brand_filter."')
  ";
 }
 if(isset($_POST["ram"]))
 {
  $ram_filter = implode("','", $_POST["ram"]);
  $query .= "
   AND product_ram IN('".$ram_filter."')
  ";
 }
 if(isset($_POST["storage"]))
 {
  $storage_filter = implode("','", $_POST["storage"]);
  $query .= "
   AND product_storage IN('".$storage_filter."')
  ";
 }

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="col-sm-4 col-lg-3 col-md-3">
    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
     <form method="post" action="">
     <input type="hidden" name="product_id" value="'.$row['product_id'].'" />
     <img src="image/'. $row['product_image'] .'" alt="" class="img-responsive" name="product_image">
     <p align="center" name="product_name"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
     <h4 style="text-align:center;" class="text-danger" name="product_price">'. $row['product_price'] .'</h4>
     <p>Camera : '. $row['product_camera'].' MP<br />
     Brand : '. $row['product_brand'] .' <br />
     RAM : '. $row['product_ram'] .' GB<br />
     Storage : '. $row['product_storage'] .' GB </p>
    <button type="submit" class="buy" name="cart">Buy Now</button>
    </form>
    </div>
   </div>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
 
</body>
</html>