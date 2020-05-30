<?php 
include("path.php");
include(ROOT_PATH . "/includes/db.php");
include(ROOT_PATH . "/includes/server.php");
$table = "item";
// $table = "cart_detial";
$q = "";
$item =  selectAll($table);


if(session_status()==PHP_SESSION_NONE) session_start();

if(session_id()=='') session_start();

if (!isset($_SESSION['username'])) {
  array_push($errors, "Username is required");
    header('location: login.php');
}
if(!($_SESSION["userstatus"] == "authorized")){
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  margin: 0px;
  padding: 0px;
 box-sizing: border-box;
}
body {
   font-family: Georgia;
  font-size: 90%;
  background: #3b3b56;
}

.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap; IE10
  flex-wrap: wrap;
  margin: 30px 10px;
} 


.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}


.col-75 {
  padding: 0px 655px 100px 23px;
}
.col-25 {
  padding: 0px 655px 100px 23px;
} 
.col-50 {
  padding:0px 655px 100px 23px
}

.container {
  background-color: #f2f2f2;
  padding: 5px 2px 10px 0px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 500%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  width: 500%;
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #3b3b56;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #9b9bd8;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

.TitleBox {
  text-align: center;
  box-shadow: 7px 7px 6px #888888;
  font-size: 30px;
  padding-top:-100px;
  padding-bottom: 0px;
  color: black;
  background-color: white;
}

.CirclesPic {
  text-align: center;
  padding-top: -50px;
  padding-left: 100px;
  margin-top: 13px;
  font-family: "Georgia";
  color: white;
}



#header-manu {
    padding: 15px;
  margin-right: 50px;
  margin-bottom: 15px;
  border: 0px solid rgb(255, 255, 255);
  box-shadow: 3px 3px 3px black;
  background-color: rgb(201, 23, 41);
  height: 40px;
  width: 10%;
  float: left;
  text-align: 10px;
  border-radius: 20px;
  border-radius: 20px;

}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
} */
</style>
</head>
<body>



<div class="clearfix">
    <div class="TitleBox">
     <a href="./index.php"><img src="./images/akrm.jpg" width="70" height="70"  ></a>
        <?php if(isset($_SESSION['username'])): ?>
          AKRM STERILIZATION EQUIPMENT______________________________
        <?php echo $_SESSION['username']; ?>   
        <a id="log" href="login.php"> 
         <a href="login.php?logout='1'" id= "logout"style="color: red;">logout</a>
    <?php else: ?>
      AKRM STERILIZATION EQUIPMENT___________________________________________________
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
 <br><br>
  <br><br>
  <br><br>
 <!--
  <div class="col-50">
    <div class="container">
    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
    <?php //foreach($item as $item): ?> 
      <p><a href="#"><?php //echo $item['item']; ?></a> <span class="price">$<?php //echo $item['price']; ?></span></p>
      <hr>
      <?php //endforeach; ?>
      <p>Total <span class="price" style="color:black"><b><?php //echo "$323"; ?></b></span></p>
    </div>
  </div>
</div> -->

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <label for="expyear">Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder="2018">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="352">
   
          </div> <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
          
        </div>
       
      </form>

    </div>
  </div>




</body>
<?php include("./includes/footer.php") ?>
</html>
