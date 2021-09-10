<?php
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
  	<form methods="get" action="results.php" enctype="multipart/form-data">
  	<input type="text" name="user_query" 
  	placeholder="Search a Product"/>
  	<input type ="submit" name="search" 
  	value="search"/>	
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
  	  	    $get_products="select * from products ";
        $run_products= mysqli_query($con,
          $get_products);
        while ($row_products=
          mysqli_fetch_array($run_products))
        {
          $pro_id=$row_products
          ['products_id'];
  $pro_title=$row_products
          ['product_title'];
  $pro_cat=$row_products
          ['cat_id'];
  $pro_brand=$row_products
          ['brand_id'];
  $pro_desc=$row_products
          ['product_desc'];
    $pro_image=$row_products['product_img1'];  
       
  $pro_price=$row_products
          ['product_price'];

  

        echo "
        <div id='single_product'>
        <h3>
        $pro_title
        </h3>
        <img src='admin_area/product_images/$pro_image' width='180' height='180' /><br>
         <p><b>Price: $ $pro_price</b></p>

         <a href='details.php?pro_id=
         $pro_id'style= 'float:left;'>Details</a>
         <a href='index.php?add_cart=$pro_id'><button style ='float:right;'>Add To Cart</button></a>


        </div>";
          

 }

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