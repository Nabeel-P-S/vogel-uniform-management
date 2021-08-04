<?php
include "connect.php";
$order_id=$_POST['order_id'];
$status=$_POST['status'];
echo($status);

// echo $order_id;

// $order_unit1=$_POST['order_unit1'];
// $order_category1=$_POST['order_category1'];



if (isset($_POST['advance_status'])){$advance_status="1";}else{$advance_status="0";}
if (isset($_POST['production_status'])){$production_status="1";}else{$production_status="0";}
if (isset($_POST['fabric_status'])){$fabric_status="1";}else{$fabric_status="0";}
if (isset($_POST['stitch_status'])){$stitch_status="1";}else{$stitch_status="0";}
if (isset($_POST['pack_status'])){$pack_status="1";}else{$pack_status="0";}
if (isset($_POST['store_status'])){$store_status="1";}else{$store_status="0";}
if (isset($_POST['dispatch_status'])){$dispatch_status="1";}else{$dispatch_status="0";}
if (isset($_POST['delivery_status'])){$delivery_status="1";}else{$delivery_status="0";}
if (isset($_POST['payment_status'])){$payment_status="1";}else{$payment_status="0";}


      


mysqli_query($conn, "UPDATE `orders` SET `advance_status`='$advance_status',`production_status`='$production_status',`fabric_status`='$fabric_status',`stitch_status`='$stitch_status',`pack_status`='$pack_status',`store_status`='$store_status',`dispatch_status`='$dispatch_status',`delivery_status`='$delivery_status',`payment_status`='$payment_status',`status`='$status' WHERE `order_id`='$order_id'"); 

// echo json_encode(array('item_id'=>$item_id));
// echo "naab";

?>
