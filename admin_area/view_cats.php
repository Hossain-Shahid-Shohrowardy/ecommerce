<?php if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script> ";
}
else
{
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		tr,th{border:3px groove #000;}
	</style>
</head>
<body>
<table width="794" align="center" bgcolor="silver">
	<tr align="center">
	<td colspan="4">
		<h2 >View All Categories</h2>
	</td>	
	</tr>
	<tr>
		<th>Category Id</th>
		<th>Category Title</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>
	<?php
	include ("include/db.php");
	$get_cats="select * from categories";
	$run_cats=mysqli_query($con,$get_cats);
	while($rows_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$rows_cats['cat_id'];
		$cat_title=$rows_cats['cat_title'];
	
	
	 ?>
	
	<tr align="center">
		<td><?php echo $cat_id; ?></td>
		<td><?php echo $cat_title; ?></td>
		 <td><a href="index.php?edit_cat=<?php echo $cat_id;?>">Edit</a></td>
		<td><a href="index.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>

	</tr>
	<?php } ?>

</table>	

</body>
</html>
<?php } ?>