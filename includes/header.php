
<?php 

include("server.php");

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

?>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>

  </style>
</head>

<div class="clearfix">
    <div class="TitleBox">   
     <a href="./index.php"><img src="./images/akrm.jpg" width="70" height="70"  ></a>
        <?php if(isset($_SESSION['username'])): ?>
          AKRM STERILIZATION EQUIPMENT_________________________________________
        <?php echo "         ".$_SESSION['username']; ?>   
        <a id="log" href="login.php"> 
         <a href="login.php?logout='1'" id= "logout"style="color: red;">logout</a>
    <?php else: ?>
      AKRM STERILIZATION EQUIPMENT____________________________________________
        <a href="<?php echo  "login.php"?>"> Login</a>
        <?php endif; ?></a>
    </div>
    <div class="CirclesPic">
      <div id="header-manu" onclick="window.location.href = 'https://www.cdc.gov/coronavirus/2019-ncov/cases-updates/index.html';">COVID-19</div>
      <div id="header-manu" onclick="window.location.href = './index.php';">Protections</div>
      <div id="header-manu" onclick="window.location.href = './index.php';">Medications</div>
      <div id="header-manu" onclick="window.location.href = './checkout.php';">Payment</div>
      <div id="header-manu" onclick="window.location.href = '#';">About us</div>
      <div id="header-manu" onclick="window.location.href = '#';">Help</div>
 
    </div>
  </div>




 


