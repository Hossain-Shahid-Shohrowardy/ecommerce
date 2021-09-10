<?php 
error_reporting(0);
?>
<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../index.php");
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
	<meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Brad Traversy">
    <title>Web Deisgn | Menu</title>
	<link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style2.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Restaurant Management System</span></h1>
        </div>
        <nav>
<ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="add_menu.php">Add Menu</a></li>
			<li><a href="view_user.php">View User</a></li>
			<li><a href="view.php">View Menu</a></li>
			<li><a href="view_booking.php">Booking</a></li>
			<li><a href="bill.php">Billing</a></a></li>
			<li><a href="?sign=out">Logout</a></li>
       </ul>
        </nav>
      </div>
    </header>
    <section id="newsletter">
      <div class="container">
		<form name = "form1" action="add_menu.php" method = "POST" enctype="multipart/form-data" onsubmit="return checkscript()">
<table border=2 style=text-align:center; align=left; width=400>
<tr><label for = "food_name"><td>Name </td></label><td><input type="text" name="food_name"/></td></tr>
<tr><label for = "food_price"><td>Price </td></label><td><input type="text" name="food_price"/></td></tr>
<tr><label for = "food_category"><td>Category </td></label><td><input type="radio" name="type" value="stsrters" checked>Starters
																<input type="radio" name="type" value="biryani"> Biryani
																<input type="radio" name="type" value="seafood"> Seafood
																<input type="radio" name="type" value="desserts">Desserts <br>
																
<tr><label for = "food_description"><td>Description </td></label><td><input type="text" name="description"/></td></tr>
<tr><label for = "browse_picture"><td>Browse Picture</td></label><td><input type="file" name="browsepicture"/></td></tr>
</table><br/>
<table border=0 style=text-align:center; align=left;><tr><td><input type="submit" name="submitbutton" value="Add"></td></tr></table>
</form>
      </div>
    </section>
	   
    <footer>
      <p>Copyright &copy; 2019</p>
    </footer>
  </body>
</html>

<?php 
	$servername="localhost";
	$username="root";
	$pass="";
	$db_name="restaurant management";
	$con=mysqli_connect($servername,$username,$pass,$db_name);
	if(!$con)
	{
		echo "connection failed: ".mysqli_connect_error();
	}
	else
	{
		echo "connection successfull";
	}
	if(isset($_POST['submitbutton']))
	{	
		$name=$_POST['food_name'];
		$price=$_POST['food_price'];
		$category=$_POST['type'];
		$description=$_POST['description'];
		$filename=$_FILES['browsepicture']['name'];
		$temoname=$_FILES['browsepicture']['tmp_name'];
		$folder="../img".$filename;
		move_uploaded_file($temoname,$folder);
		$sql="INSERT INTO menu(name,price,category,description,browse_picture)
		VALUES('$name','$price','$category','$description','$folder')";
		
		$result=mysqli_query($con,$sql);
		echo mysqli_error($con);

		if(!$result)
		{
			echo "insert faield".mysqli_error();
		}
		else
		{
		echo "insert successfull";
		}
	}
?>