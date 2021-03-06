<?php


if(session_status()==PHP_SESSION_NONE) session_start();

//PHP < 5.4
if(session_id()=='') session_start();


$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'akrm');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $street = mysqli_real_escape_string($db, $_POST['street']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($street)) { array_push($errors, "Street is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($zip)) { array_push($errors, "Zip is required"); }

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM customer WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO customer (username, email, password,street,city,zip) 
  			  VALUES('$username', '$email', '$password','$street','$city','$zip')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: login-b.php');
  	// header('location: /akrm/home/index.php');
  }
}
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if ((count($errors) == 0)) {
    $password = md5($password);
    $query = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: login-b.php');
       	// header('location: /akrm/home/index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>