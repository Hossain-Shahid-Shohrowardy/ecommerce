<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
include ("includes/db.php");

?>


<div align="center" style="padding: 20px;">
<h2> Payment Option For You</h2>
<?php $ip=getRealIpAddr();
$get_customer="select * from customers where customer_ip='$ip'";
$run_customer=mysqli_query($con,$get_customer );
$customer=mysqli_fetch_array($run_customer);
$customer_id=$customer['customer_id'];
 ?>	

<br>Pay With</b><img src="images/paypal.png"><b>
Or <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a></b>	

</div>
</body>
</html>