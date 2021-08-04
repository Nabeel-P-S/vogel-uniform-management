<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$addon_name=$_POST["addon_name"];
$addon_price1=$_POST["addon_price1"];
$addon_price2=$_POST["addon_price2"];
$addon_price3=$_POST["addon_price3"];
mysqli_query($conn,"INSERT INTO `addons`(`addon_id`, `addon`, `addon_price1`, `addon_price2`, `addon_price3`) VALUES  (NULL,'$addon_name','$addon_price1','$addon_price2','$addon_price3')");

?>
