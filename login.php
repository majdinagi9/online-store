<?php 
include("path.php");
include(ROOT_PATH . "/includes/server.php");
include(ROOT_PATH . "/includes/header.php"); 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>AKRM-LOGIN</title>
  <link rel="stylesheet" type="text/css" href="forms.css">
</head>
<body>
  <div class="header">
  	<h2><img src="./images/akrm.jpg" width="70" height="70">Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include(ROOT_PATH .'/includes/errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" placeholder="Username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password"  placeholder="Password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
  <?php

 
 
 
 //include("/includes/footer.php"); ?>

</body>
</html>