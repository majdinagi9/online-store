<?php 
include("path.php");
include(ROOT_PATH . "/includes/server.php");
include(ROOT_PATH . "/includes/header.php"); 

?>
<!DOCTYPE html>
<html>
<head>
  <title>AKRM-REGISTER</title>
  <link rel="stylesheet" type="text/css" href="forms.css">
</head>
<body>

  <div class="header">
  	<h2><img src="./images/akrm.jpg" width="70" height="70">Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include(ROOT_PATH . '/includes/errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>"  placeholder="Email">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1"  placeholder="Password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2"  placeholder="Confirm password">
  	</div>
    <div class="input-group">
      <label>Street</label>
      <input type="text" name="street" placeholder="Street">
    </div>
    <div class="input-group">
      <label>City</label>
      <input type="text" name="city" placeholder="City">
    </div>
    <div class="input-group">
      <label>Zip</label>
      <input type="number" name="zip" placeholder="Zip">
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
  
</body>
</html>