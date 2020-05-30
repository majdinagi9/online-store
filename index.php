<?php 
include("path.php");
include(ROOT_PATH . "/includes/db.php");
include(ROOT_PATH . "/includes/server.php");
require_once(ROOT_PATH . "/includes/dbcontroller.php");

if(session_status()==PHP_SESSION_NONE) session_start();

if(session_id()=='') session_start();


if(isset($_POST['submitToken'])){
	
	$token_b = $_POST['token_b'];
    $token   = $_SESSION["token"];
    
    if($token_b == $token){
		
	  $_SESSION["userstatus"] = "authorized";
	  header('location: index.php');
	  }else{
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
		}
	 
	}

if (!isset($_SESSION['username'])) {
  array_push($errors, "Username is required");
    header('location: ./login.php');
}


if (isset($_POST['logout'])) {
  session_destroy();
  unset($_SESSION['username']); 
  unset($_SESSION['token']);   
  header('location: ../login.php');
}

?>
<?php

$db_handle = new DBController();

if(!empty($_GET["action"])) {

switch($_GET["action"]) {
	case "add":											
		if(!empty($_POST["quantity"])) { // HERE 
			$productByCode = $db_handle->runQuery("SELECT * FROM item WHERE item_num='".$_GET['item']."'");
			$itemArray = array($productByCode[0]["item"]=>array('item'=>$productByCode[0]["item"], 'item'=>$productByCode[0]["item"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'item_image'=>$productByCode[0]["item_image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["item"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["item"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;

	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["item_num"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;



	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}

}
?>
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>AKRM-Home</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

<style>
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
    height: 21px;
    width: 10%;
    float: left;
    text-align: 10px;
    border-radius: 20px;
    border-radius: 33px;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
} 
</style>
</head>
<body>



<div class="clearfix">
    <div class="TitleBox">
     <a href="./index.php"><img src="./images/akrm.jpg" width="70" height="70"  ></a>
        <?php if(isset($_SESSION['username'])): ?>
          AKRM STERILIZATION EQUIPMENT_____________________________________
        <?php echo $_SESSION['username']; ?>   
        <a id="log" href="login.php"> 
         <a  href="login.php?logout='1'" id= "logout"style="color: red;">logout</a>
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




<div id="shopping-cart">
<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>


<?php

if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<!-- <th style="text-align:left;">Description</th> -->
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		

    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["item_image"]; ?>" class="cart-item-image"/><?php echo $item["item"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&item_num=<?php echo $item["item"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>							
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>
		

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
<a id="btnCheck" href="checkout.php">Checkout</a>
  <?php
} 

else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php 
	$product_array = $db_handle->runQuery("SELECT * FROM item ORDER BY item_num ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&item=<?php echo $product_array[$key]["item_num"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["item_image"];  ?>" style = 'length: 150px; width:250px ;'></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["item"];?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php

		}

	}
	?>
</div>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<?php include("./includes/footer.php");?>
</BODY>
</HTML>