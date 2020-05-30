<?php
include("path.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require (ROOT_PATH . "/mailhost/vendor/autoload.php");

?>
<html>
<head>
  <title>LOGIN</title>
  <link href="forms.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php 

include(ROOT_PATH . "/includes/header.php");
include(ROOT_PATH . "/includes/db.php");
include(ROOT_PATH . "/includes/server.php");
include(ROOT_PATH . '/includes/errors.php');

$table = "customer";
$cust = selectAll($table,["username" => $_SESSION['username']]);

$email = $cust[0]["email"];
$password = $cust[0]["password"];

$dbc = mysqli_connect("localhost", "root", "", "akrm");
if (!$dbc) {
  echo 'Database error ... please try again ...';
}
else {
  $q = "select email,password from customer where email = '$email' and password = '$password'";
  $r = mysqli_query($dbc,$q);
  $line = mysqli_fetch_array($r, MYSQLI_ASSOC);
  if (!$line){
    echo "query = $q <br> ";
    echo '<br>Login failed ... please try again ... <br>';
  }
  else {
    $token=rand(100000,999999);
    $_SESSION["token"] = $token;
    $_SESSION["email"] = $email;

    $mail = new PHPMailer(true);
    try {
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;              
      $mail->isSMTP();                                   
      $mail->Host       = 'smtp.gmail.com';               
      $mail->SMTPAuth   = true;                           
      $mail->Username   = 'akrm.bmcc@gmail.com';            
      $mail->Password   = "Majdi495096";                           
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
      $mail->Port       = 587;                            
      $mail->setFrom('akrm.bmcc@gmail.com', 'Mailer');
      $mail->addAddress($email);                          
      $mail->Subject = 'Here is your AKRM security token ... ';
      $mail->Body = $token;
      $mail->SMTPDebug = false;
      $mail->do_debug = 0;
      $mail->send();
     echo  '<div class="header">
  	         <h2><img src="./images/akrm.jpg" width="70" height="70">Login</h2>
              </div>';
      echo '<form action="index.php" method="post">';
      echo '  <p>The AKRM security token has been sent to your email address. <br>
              Please enter the security token below and click LOGIN to proceed ...  
              Enter security token in the space provided, then click LOGIN:</p>';
      echo '<div class="input-group">';
      echo '  <label>Security token: <input type="text" name="token_b" size="20" maxlength="20"  placeholder="Token"  required></label>';
      echo '</div>';
      echo '<div class="input-group">';
  		echo '<button type="submit" class="btn" value= "LOGIN" name="submitToken" >Login</button>';
      echo '</div>';
      echo ' </form>';
    
      // required

    
      
     } catch (Exception $e) {
      echo "Token could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}
?>
</body>
</html>



