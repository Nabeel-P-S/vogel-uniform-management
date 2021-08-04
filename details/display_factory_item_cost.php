<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$quantity_id=$_POST["quantity_id"];
$fabric_id=$_POST["fabric_id"];

$item_id=$_POST["item_id"];
$vendor_id=$_POST["vendor_id"];
	$query=mysqli_query($conn,"SELECT  `factory_item_cost1`, `factory_item_cost2`, `factory_item_cost3` FROM `factory_cost` WHERE  item_id='$item_id' and vendor_id='$vendor_id'");
	$fetch=mysqli_fetch_array($query);
	$check=mysqli_num_rows($query);
	// echo $check;
	// echo $quantity_id;
	if ($check==0)
	{
		$factory_item_cost=0;
	}
	else
	{
		if ($quantity_id==1)
		{

		$factory_item_cost=$fetch['factory_item_cost1'];}
		else if ($quantity_id==2)
		{

		$factory_item_cost=$fetch['factory_item_cost2'];}   
		else if ($quantity_id==3)
		{

		$factory_item_cost=$fetch['factory_item_cost3'];}  
	}
                 
$query1=mysqli_query($conn,"SELECT factory_fabric_price from factory_fabric_price where fabric_id='$fabric_id'and vendor_id='$vendor_id'");
                        $fetch1=mysqli_fetch_array($query1);
                        $factory_fabric_price=$fetch1['factory_fabric_price'];

			echo json_encode(array('factory_item_cost'=>$factory_item_cost,'factory_fabric_price'=>$factory_fabric_price));


// echo json_encode(array('item_cost'=>$item_cost,'factory_item_cost'=>$factory_item_cost));

			?>

			
			