<!DOCTYPE html>
<?php

include"connect.php";

$sql1="SELECT COUNT(order_id) as orders FROM orders";
$sql2="SELECT COUNT(customer_id) as customers FROM customers";
$sql3="SELECT COUNT(item_id) as items FROM items";
$sql4="SELECT COUNT(vendor_id) as vendors FROM vendors";
$query1=mysqli_query($conn,$sql1);
$query2=mysqli_query($conn,$sql2);
$query3=mysqli_query($conn,$sql3);
$query4=mysqli_query($conn,$sql4);
$fetch1=mysqli_fetch_array($query1);
$fetch2=mysqli_fetch_array($query2);
$fetch3=mysqli_fetch_array($query3);
$fetch4=mysqli_fetch_array($query4);
$orders=$fetch1["orders"];
$customers=$fetch2["customers"];
$items=$fetch3["items"];
$vendors=$fetch4["vendors"];

?>
<html>
<head>
	<title>home</title>
	<style>
		.box
		{
			margin-top: 1vw;
			padding-top: 1vw;
			width: 12vw;
			height: 8vw;
			font-size: 2vw;
			font-weight: bold;
			border: 2px solid #00549A;
			text-align: center;
		}
#example1 {
 background: url("images/logo.jpg");
 height: 50vw;
 width: 80vw;

	 background-size:60vw 50vw;
	

	  background-repeat: no-repeat;
	 

position: fixed;
	
}</style>
</head>
<body>
<div id="example1"><div class="col-lg-9"></div>
  <div class="col-lg-3">
  	
  	<div class="box">AGENTS  <br><?php echo $customers;?></div>
  	 <br>
  	 <br>
  	 <div class="box">ITEMS <br> <?php echo $items;?></div>	 <br>
  	 <br>
  	 <div class="box">FACTORIES <br> <?php echo $vendors;?> </div> <br><br>
  	 <div class="box">ORDERS <br> <?php echo $orders;?></div><br>
  	 <br>
  	 
  	
  	
  
  		
  </div>
</div>
</body>
</html>