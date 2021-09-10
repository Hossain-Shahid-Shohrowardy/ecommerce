<?php
session_start();
include ("includes/db.php");
include ("functions/functions.php") ;
?>
<!DOCTYPE>
<html>
<head></head>
<title> ONLINE SHOPING </title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
<body>
<!--main content status-->
	
<div class="main_wapper">

<!--HEADER Starts-->
  <div class="header_wrapper">
    <h1 align="center">www.EletronicProductsShop.com</h1>
	
  </div>
<!--header end-->

<!--navigationbar starts-->

  <div id="navbar">
  	<ul id="menu">
  		
  		<li><a href="index.php">Home</a></li>
  		<li><a href="all_products.php">All Products</a></li>
  		<li><a href="customer/my_account.php">My Account</a></li>
  		<li><a href="customer_register.php">Sign Up</a> </li>
  		<li><a href="cart.php">Shopping Cart</a></li>
  		<li><a href="contact.php">Contact Us</a></li>

  	</ul>
  	<div id ="form">
  	<form method="get" action="results.php" enctype="multipart/form-data">
  	<input type="text" name="user_query"
  	placeholder="Search a Product"/>
  	<input type ="submit" name="search" 
  	value="search"/>
  	</form>	
  	</div>
  		
  </div>

 <!--navigationbar starts-->
	
  
  <div class="content_wrapper">
  	<div id="left_sidebar">
  		<div id="sidebar_title">Categories
  	</div>
  	<ul id="cats">
  		<?php
  		getCats();
  		?>
  	</ul>
    <div id="sidebar_title">Brands
  	</div>
  	<ul id="cats">
  		<?php 
  		getBrands();

  		?> 	   
  	   
  	</ul>	


  	</div>

  	<div id="right_content">
  	 <?php cart(); ?>	
  	  <div id="headline">
  	  	<div id="headline_content">
          <?php
  	  		if(!isset($_SESSION['customer_email']))
          {
            echo "<b>Welcome Guest!</b><b style=color:'yellow'>Shopping Cart-</b>";
          }
          else
          {
            echo "<b>Welcome:" ."<span style='color:green'>" . 
            $_SESSION['customer_email'] . "</span>" . "</b>" ."<b style=color:'yellow'> Your Shopping Cart-</b>";

          }
          ?>
  	  		
  	  		<span> Total Items:<?php items(); ?>
  	          Total Price: <?php 
  	         total_price();  ?> <a href="cart.php" style="color:FF0;">Go To Cart </a> &nbsp;
              <?php
             if(!isset($_SESSION['customer_email'])){
            echo "<a href='checkout.php' style='color:#F93;'>Login</a>";
          }
          else{

            echo "<a href='logout.php' style='color:#F93;'>Logout</a>";
          }
             ?>

  
  	  		
  	  	</div>
  	  	
  	  </div>
  	  
        <div id="products_box">
  	  	  <?php
  	  	  getPro();
  	  	  getCatPro();
  	  	  getBrandPro();

  	  	  ?>	  	

  	  </div>

  	
     </div>
   </div>
   <!--content end-- >
  <div class ="footer"> 
  	<h1 style="color:#000;padding-top:30px;
  	text-align:center;"></h1>
  	
  </div>

</div>
</body>
</html>