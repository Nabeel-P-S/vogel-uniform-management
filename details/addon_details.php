<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$addon_id=$_POST["addon_id"];
$vendor_id=$_POST["vendor_id"];
$query=mysqli_query($conn,"SELECT * FROM `addons` WHERE addon_id='$addon_id'");
$fetch=mysqli_fetch_array($query);

$addon_price1=$fetch["addon_price1"];
   $addon_price2=$fetch["addon_price2"];
   $addon_price3=$fetch["addon_price3"];



   $query1=mysqli_query($conn,"SELECT * FROM `factory_addon_price` WHERE addon_id='$addon_id' AND vendor_id='$vendor_id'");
$fetch1=mysqli_fetch_array($query1);

$factory_addon_price1=$fetch1["factory_addon_price1"];
   $factory_addon_price2=$fetch1["factory_addon_price2"];
   $factory_addon_price3=$fetch1["factory_addon_price3"];



echo json_encode(array('addon_price1'=>$addon_price1,'addon_price2'=>$addon_price2,'addon_price3'=>$addon_price3,'factory_addon_price1'=>$factory_addon_price1,'factory_addon_price2'=>$factory_addon_price2,'factory_addon_price3'=>$factory_addon_price3));
	


?>
