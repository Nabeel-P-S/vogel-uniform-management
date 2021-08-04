<?php
include ("../connect.php");
$reference_no=$_POST["reference_no"];
$item_id=$_POST["item_id"];
$color_id=$_POST["color_id"];
$fabric_id=$_POST["fabric_id"];
$quantity1=$_POST["quantity1"];
$quantity2=$_POST["quantity2"];
$quantity3=$_POST["quantity3"];
$quantity4=$_POST["quantity4"];
$quantity5=$_POST["quantity5"];
$quantity6=$_POST["quantity6"];
$quantity7=$_POST["quantity7"];
$quantity8=$_POST["quantity8"];
$order_quantity=$_POST["total"];

$agent_advance=$_POST["advance_amount"];
$agent_balance=$_POST["balance_amount"];
$factory_advance=$_POST["factory_advance_amount"];
$factory_balance=$_POST["factory_balance_amount"];

// echo $color_id;
$addon_id_array=json_decode($_POST['addon_array_json']) ;

$order_date=$_POST["order_date"];
$store_delivery_date=$_POST["store_delivery_date"];
$main_delivery_date=$_POST["main_delivery_date"];
$customer_id=$_POST["customer_id"];
$vendor_id=$_POST["vendor_id"];

$order_item_cost=$_POST["order_item_cost"];
$order_addon_cost=$_POST["order_addon_cost"];
$order_fabric_cost=$_POST["order_fabric_price"];
$order_total_cost=$_POST["order_total_cost"];

$order_factory_item_cost=$_POST["order_factory_item_cost"];
$order_factory_addon_cost=$_POST["order_factory_addon_cost"];
$order_factory_fabric_cost=$_POST["order_factory_fabric_cost"];
$order_factory_total_cost=$_POST["order_factory_total_cost"];

// date_default_timezone_set('Asia/Kolkata');





$sql="INSERT INTO `orders`(`order_id`,`reference_no`, `order_date`, `store_delivery_date`, `main_delivery_date`, `customer_id`, `item_id`, `fabric_id`, `order_quantity`, `vendor_id`, `order_item_cost`, `order_fabric_cost`, `order_addon_cost`, `order_total_cost`, `order_factory_item_cost`, `order_factory_fabric_cost`, `order_factory_addon_cost`, `order_factory_total_cost`, `agent_advance`,`factory_advance`, `agent_balance`, `factory_balance`,`color_id`) VALUES (NULL,'$reference_no','$order_date','$store_delivery_date','$main_delivery_date','$customer_id','$item_id','$fabric_id','$order_quantity','$vendor_id','$order_item_cost','$order_fabric_cost','$order_addon_cost','$order_total_cost','$order_factory_item_cost','$order_factory_fabric_cost','$order_factory_addon_cost','$order_factory_total_cost','$agent_advance','$factory_advance','$agent_balance','$factory_balance','$color_id')";
// echo $sql;
// mysqli_query($conn,$sql);

if($query=mysqli_query($conn,$sql)) 
{
	echo "success";
}
else
{
	echo mysqli_error($conn);
}
// mysqli_query($conn,"INSERT INTO `orders`(`order_id`, `order_date`, `delivery_date`, `customer_id`, `item_id`, `order_quantity`, `factory_id`, `order_item_cost`, `order_addon_cost`, `order_total_cost`, `order_factory_item_cost`, `order_factory_addon_cost`, `order_factory_total_cost`, `advance_amount`, `advance_status`) VALUES (NULL,'$order_date','$delivery_date','$customer_id','$item_id','$total','$vendor_id','$order_item_cost','$order_addon_cost','$order_total_cost','$order_factory_item_cost','$order_factory_addon_cost','$order_factory_total_cost','$advance_amount','$advance_status')");
$order_id = $conn->insert_id; 

if ($quantity1!=0)
{
	mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','1','$quantity1')");

}

if ($quantity2!=0)
{
	mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','2','$quantity2')");

}

if ($quantity3!=0)
{mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','3','$quantity3')");

}
if ($quantity4!=0)
{mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','4','$quantity4')");

}
if ($quantity5!=0)
{mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','5','$quantity5')");

}
if ($quantity6!=0)
{mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','6','$quantity6')");

}
if ($quantity7!=0)
{mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','7','$quantity7')");

}
if ($quantity8!=0)
{mysqli_query($conn,"INSERT INTO `order_quantity`(`id`, `order_id`, `size_id`, `order_quantity`) VALUES(NULL,'$order_id','8','$quantity8')");

}


for ($i=0; $i <sizeof($addon_id_array) ; $i++)
 { 
// echo $addon_id_array[$i];

	mysqli_query($conn,"INSERT INTO `order_addons`(`id`, `order_id`, `addon_id`) VALUES  (NULL,'$order_id','$addon_id_array[$i]')");
}


// echo json_encode(array('item_id'=>$item_id));
?>
