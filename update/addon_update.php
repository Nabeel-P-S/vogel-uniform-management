<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$addon_id=$_POST["addon_id"];
$addon_name=$_POST["addon_name"];
$addon_price1=$_POST["addon_price1"];
$addon_price2=$_POST["addon_price2"];
$addon_price3=$_POST["addon_price3"];
mysqli_query($conn,"UPDATE `addons` SET `addon`='$addon_name',`addon_price1`='$addon_price1',`addon_price2`='$addon_price2',`addon_price3`='$addon_price3' WHERE addon_id='$addon_id'");

?>
