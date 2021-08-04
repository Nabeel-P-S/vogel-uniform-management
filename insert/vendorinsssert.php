<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
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


$fabric_id_array=json_decode($_POST['fabric_array_json']) ;

$fabric_price_array=json_decode($_POST['fabric_price_json']);


print_r($fabric_id_array);
print_r($fabric_price_array);
// echo  $fabric_price_array;

mysqli_query($conn,"INSERT INTO `vendors`(`vendor_id`, `factory_name`, `vendor_name`, `vendor_address`, `vendor_place`, `vendor_district`,  `vendor_pincode`, `vendor_email`, `vendor_mobile1`, `vendor_mobile2`) VALUES(NULL,'$factory_name','$vendor_name','$vendor_address','$vendor_place','$vendor_district','$vendor_pincode','$vendor_email','$vendor_mobile1','$vendor_mobile2')");
$vendor_id = $conn->insert_id; 


for ($i=0; $i <sizeof($item_id_array) ; $i++)
 { 

	mysqli_query($conn,"INSERT INTO `factory_cost`(`factory_item_cost_id`, `item_id`, `vendor_id`, `factory_item_cost1`, `factory_item_cost2`, `factory_item_cost3`) VALUES  (NULL,'$item_id_array[$i]',$vendor_id,'$item_price1_array[$i]','$item_price2_array[$i]','$item_price3_array[$i]')");


}


for ($i=0; $i <sizeof($addon_id_array) ; $i++)
 { 
	mysqli_query($conn,"INSERT INTO `factory_addon_price`(`factory_addon_cost_id`, `addon_id`, `vendor_id`,  `factory_addon_price1`, `factory_addon_price2`, `factory_addon_price3`) VALUES (NULL,'$addon_id_array[$i]',$vendor_id,'$addon_price1_array[$i]','$addon_price2_array[$i]','$addon_price3_array[$i]')");
	
}

for ($i=0; $i <sizeof($fabric_id_array) ; $i++)
 { 
// echo "id"." ".$fabric_id_array[$i];
// echo "price"." ".$fabric_price_array[$i];

		mysqli_query($conn,"INSERT INTO `factory_fabric_price`(`id`, `fabric_id`, `vendor_id`,  `factory_fabric_price`) VALUES (NULL,'$fabric_id_array[$i]',$vendor_id,'$fabric_price_array[$i]')");
	
}
echo("SUCCESS");

?>
