<?php
include "fetch_data.php"
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='css/cartcss.css' type='text/css' media='all' />
    <title>Product filter in php</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <script >
        $(document).ready(function(){
        $(".filter").click(function(){
            $(this).next("").toggle()
        });    
    });
    </script>

    

</head>

<body>
    

   
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
<?php
    if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div" >
 <span><?php echo $cart_count; ?></span>
</div>
<?php
}?>
                </ul>
                 <div class="container1">
                  <input type="text" class="input" placeholder="Search..." onkeyup="showResult(this.value)">
                  <div class="search" ></div>
                  <div id="livesearch" class="searchbar"></div>
                </div>


                <!--<div class="lines">
                   <i class="fa fa-bars" aria-hidden="true" ></i>
                </div>-->
            </nav>
        </div>

    <div class="container">
        <div class="row">
       
    <div class="col-md-3">  
    <button class="filter" >filter</button>                 
    <div class="list-group" name="filter">
                    <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
     

    <!--<div class="list-group" name="filter">-->
                    <h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     <?php

                    $query = "SELECT DISTINCT(product_brand) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"  > <?php echo $row['product_brand']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
 


    
     <h3>RAM</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(product_ram) FROM product WHERE product_status = '1' ORDER BY product_ram DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['product_ram']; ?>" > <?php echo $row['product_ram']; ?> GB</label>
                    </div>
                    <?php    
                    }

                    ?>
                
    
    
     <h3>Internal Storage</h3>
     <?php
                    $query = "
                    SELECT DISTINCT(product_storage) FROM product WHERE product_status = '1' ORDER BY product_storage DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['product_storage']; ?>"  > <?php echo $row['product_storage']; ?> GB</label>
                    </div>
                    <?php
                    }
                    ?> 
             
            </div>
</div>
            <div class="col-md-9">
             <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>

