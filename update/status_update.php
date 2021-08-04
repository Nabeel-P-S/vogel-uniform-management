<?php
include"../connect.php";
$order_id=$_POST['order_id'];
$status=$_POST['status'];

if (isset($_POST['production_status'])){$production_status="1";}else{$production_status="0";}
if (isset($_POST['send_status'])){$send_status="1";}else{$send_status="0";}
if (isset($_POST['fabric_status'])){$fabric_status="1";}else{$fabric_status="0";}
if (isset($_POST['stitch_status'])){$stitch_status="1";}else{$stitch_status="0";}
if (isset($_POST['pack_status'])){$pack_status="1";}else{$pack_status="0";}
if (isset($_POST['resend_status'])){$resend_status="1";}else{$resend_status="0";}
if (isset($_POST['dispatch_status'])){$dispatch_status="1";}else{$dispatch_status="0";}
if (isset($_POST['store_status'])){$store_status="1";}else{$store_status="0";}
if (isset($_POST['delivery_status'])){$delivery_status="1";}else{$delivery_status="0";}
if (isset($_POST['payment_status'])){$payment_status="1";}else{$payment_status="0";}


$sql="UPDATE `orders` SET `production_status`='$production_status',`fabric_status`='$fabric_status',`stitch_status`='$stitch_status',`pack_status`='$pack_status',`store_status`='$store_status',`dispatch_status`='$dispatch_status',`delivery_status`='$delivery_status',`payment_status`='$payment_status',`status`='$status' WHERE `order_id`='$order_id'";

if ($query=mysqli_query($conn,$sql))
{
	echo "success";
}
else 
{
	echo mysqli_error($conn);
}
// echo json_encode(array('item_id'=>$item_id));

?>