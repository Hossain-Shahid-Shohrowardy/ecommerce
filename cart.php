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
  		<li><a href="user_register.php">Sign Up</a> </li>
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
 ?>
  	  		  	  		
                    <span> Total Items:<?php items(); ?>
  	          Total Price: <?php 
  	         total_price();  ?>   <a href="index.php" style="color:FF0;">Back To Shoping </a>&nbsp;
              <?php
             if(!isset($_SESSION['customer_email'])){
            echo "<a href='checkout.php' style='color:#F93;'>Login</a>";
          }
          else{

            echo "<a href='logout.php' style='color:#F93;'>Logout</a>";
          }
             ?>

  

               </span>
  	  		
  	  	</div>
  	  	
  	  </div>
  	  
        <div id="products_box"><br>
  	  	<form action="cart.php" method="post" 
        enctype="multipart/form-data">
        <table width="740" align="center" bgcolor="gray" >
          <tr align="center">
            <td>Remove</td>
             <td>Product</td>
              <td>Quantity</td>
               <td>Total Price</td>
             </tr>
               <?php

                $ip_add=getRealIpAddr();
  
    $total=0;
    $sel_price="select * from cart where ip_add='$ip_add'";
    $run_price=mysqli_query($con,$sel_price);

    while($record=mysqli_fetch_array(
      $run_price))
    {
      $pro_id=$record['p_id'];
      $pro_price = "select * from products where products_id= '$pro_id'";
      $run_pro_price=mysqli_query($db,
        $pro_price);
      while($p_price=mysqli_fetch_array(
        $run_pro_price))
      {
        $product_price=array($p_price[
          'product_price']);
        $product_title=$p_price['product_title'];
        $product_image=$p_price['product_img1'];
        $only_price=$p_price['product_price'];
        $values=array_sum($product_price);
        $total +=$values;

  
?>

          
          <tr align="center">
           <td><input type="checkbox" name=
            "remove[]" value="<?php echo
             $pro_id; ?>" ></td>
            <td><?php echo $product_title; ?><br>
               <img src="admin_area/product_images/<?php echo $product_image;?>" height="80" width="80"></td>
             <td><input type="text" name="qty" value=" " size="3" /></td>
             <?php
             if(isset($_POST['update'])){
              $qty=$_POST['qty'];
              $insert_qty="update cart 
             set qty='$qty'where ip_add=
             '$ip_add'";
              $run_qty=mysqli_query($con,
                $insert_qty);

              $total +=$total* $qty;


             }
               ?>
             
              <td>
                <?php echo $only_price;?></td>


          </tr>
           <?php }} ?>  

          <tr align="center">
            <td colspan="3" align="right">Sub Total:</td>
            <td  ><b><?php echo $total; ?><b></td> 
          </tr>
          <tr></tr>
          <tr>
            <td colspan="2 "><input type="submit" name="update" value="Update Cart"/></td>
            <td><input type="submit" name="continue" value="Continue Shopping"/></td>
           <td>
            <a href="checkout.php" style="text-decoration:none;color:#000;">Checkout</a>
            
               </td>
               

        </table>
          
        </form>	
        <?php
        function updatecart(){
          global $con;
        if(isset($_POST['update'])) 
        {
          foreach ($_POST['remove'] as 
            $remove_id) {
            $delete_products="delete from cart where p_id=$remove_id";
          $run_delete=mysqli_query($con,
            $delete_products);
          if($run_delete)
          {
            echo "<script>window.open('cart.php','_self')
            </script>";
            
          }
          }
        }

          
          if(isset($_POST['continue']))
          {
            echo "<script>window.open('index.php','_self')
            </script>";
          }
                }

        echo @$up_cart=updatecart();


              
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