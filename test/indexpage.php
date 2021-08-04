<!DOCTYPE html>
<html>
<head>
	<title>index page</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
">
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
<div class="jumbotron">
<div class="row w-100">
        <div class="col-md-3"  onclick="my_function('2','6')">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Orders</h4></div>
                <div class="text-info text-center mt-2"><h1><?php echo $orders;?></h1></div>
            </div>
        </div>
        <div class="col-md-3" onclick="my_function('2','2')">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Agents</h4></div>
                <div class="text-success text-center mt-2"><h1><?php echo $customers;?></h1></div>
            </div>
        </div>
        <div class="col-md-3" onclick="my_function('2','3')">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Factories</h4></div>
                <div class="text-danger text-center mt-2"><h1><?php echo $vendors;?></h1></div>
            </div>
        </div>
        <div class="col-md-3" onclick="my_function('2','1')">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3"><h4>Items</h4></div>
                <div class="text-warning text-center mt-2"><h1><?php echo $items;?></h1></div>
            </div>
        </div>
     </div>
</div>
</body>
</html>