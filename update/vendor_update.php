<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$vendor_id=$_POST["vendor_id"];
$factory_name=$_POST["factory_name"];
$vendor_name=$_POST["vendor_name"];
$vendor_address=$_POST["vendor_address"];
$vendor_place=$_POST["vendor_place"];
$vendor_district=$_POST["vendor_district"];
$vendor_pincode=$_POST["vendor_pincode"];
$vendor_mobile1=$_POST["vendor_mobile1"];
$vendor_mobile2=$_POST["vendor_mobile2"];
$vendor_email=$_POST["vendor_email"];

$item_id_array=json_decode($_POST['items_array_json']) ;
$item_price1_array=json_decode($_POST['item_price1_json']);
$item_price2_array=json_decode($_POST['item_price2_json']);
$item_price3_array=json_decode($_POST['item_price3_json']);

$addon_id_array=json_decode($_POST['addon_array_json']) ;
$addon_price1_array=json_decode($_POST['addon_price1_json']);
$addon_price2_array=json_decode($_POST['addon_price2_json']);
$addon_price3_array=json_decode($_POST['addon_price3_json']);



mysqli_query($conn,"UPDATE `vendors` SET`factory_name`='$factory_name',`vendor_name`='$vendor_name',`vendor_address`='$vendor_address',`vendor_place`='$vendor_place',`vendor_district`='$vendor_district',`vendor_pincode`='$vendor_pincode',`vendor_email`='$vendor_email',`vendor_mobile1`='$vendor_mobile1',`vendor_mobile2`='$vendor_mobile1' WHERE `vendor_id`='$vendor_id'");


mysqli_query($conn,"DELETE FROM `factory_cost` WHERE vendor_id='$vendor_id'");
mysqli_query($conn,"DELETE FROM `factory_fabric_price` WHERE vendor_id='$vendor_id'");
mysqli_query($conn,"DELETE FROM `factory_addon_price` WHERE vendor_id='$vendor_id'");

// ========================================== ITEM ======================================================================

$item_id_array=json_decode($_POST['items_array_json']) ;
$item_price1_array=json_decode($_POST['item_price1_json']);
$item_price2_array=json_decode($_POST['item_price2_json']);
$item_price3_array=json_decode($_POST['item_price3_json']);

for ($i=0; $i <sizeof($item_id_array) ; $i++)
 { 

	mysqli_query($conn,"INSERT INTO `factory_cost`(`factory_item_cost_id`, `item_id`, `vendor_id`, `factory_item_cost1`, `factory_item_cost2`, `factory_item_cost3`) VALUES  (NULL,'$item_id_array[$i]',$vendor_id,'$item_price1_array[$i]','$item_price2_array[$i]','$item_price3_array[$i]')");


}
// =============================================ITEM--------------------------------------------------------



// =========================================addon ===========================================================


$addon_id_array=json_decode($_POST['addon_array_json']) ;
$addon_price1_array=json_decode($_POST['addon_price1_json']);
$addon_price2_array=json_decode($_POST['addon_price2_json']);
$addon_price3_array=json_decode($_POST['addon_price3_json']);

for ($i=0; $i <sizeof($addon_id_array) ; $i++)
 { 
	mysqli_query($conn,"INSERT INTO `factory_addon_price`(`factory_addon_cost_id`, `addon_id`, `vendor_id`,  `factory_addon_price1`, `factory_addon_price2`, `factory_addon_price3`) VALUES (NULL,'$addon_id_array[$i]',$vendor_id,'$addon_price1_array[$i]','$addon_price2_array[$i]','$addon_price3_array[$i]')");
	
}

// =========================================addon ===========================================================



// ====================================================fabric===========================================================

$fabric_id_array=json_decode($_POST['fabric_array_json']) ;
$fabric_price_array=json_decode($_POST['fabric_price_json']);
for ($i=0; $i <sizeof($fabric_id_array) ; $i++)
 { 

$sql = "INSERT INTO `factory_fabric_price`(`id`, `fabric_id`, `vendor_id`,  `factory_fabric_price`) VALUES (NULL,'$fabric_id_array[$i]',$vendor_id,'$fabric_price_array[$i]')";
// echo($sql);
// echo mysqli_error;
	mysqli_query($conn,$sql);
	
}

// ====================================================fabric===========================================================


echo("SUCCESS");

?>
