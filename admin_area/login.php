<?php
session_start();
include("include/db.php");
  ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---->
<html>
  <head>

  <link href="login.css" rel="stylesheet" media="all"/>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login</h2>
   <p>Please enter your email and password</p>
   </div>
    <form id="Login" method="post">

        <div class="form-group">


            <input type="text" name="admin_email" class="form-control" id="inputEmail" placeholder="Email Address" required="required"/>

        </div>

        <div class="form-group">

            <input type="password" name="admin_name" class="form-control" id="inputPassword" placeholder="Password" required="required"/>

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
        <input type="submit" name="login" value="Login" class="btn btn-primary">

    </form>
    </div>
</div></div></div>


</body>
</html>
<?php 
if(isset($_POST['login'])){
  $user_email=$_POST['admin_email'];
  $user_pass=$_POST['admin_name'];
 echo  $sel_admin="select * from admin where admin_email='$user_email' AND admin_password='$user_pass'";
  $run_admin=mysqli_query($con,$sel_admin);
  $check_admin=mysqli_num_rows($run_admin);
if($check_admin==1){
  $_SESSION['admin_email']=$user_email;
  echo "<script>window.open('index.php?logged_in','_self')</script>";
}
else{
  echo "<script>alert('Admin Email is incorrect.try again')</script> ";
}
 
}

 ?>

