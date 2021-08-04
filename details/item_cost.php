<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$quantity_id=$_POST["quantity_id"];
$fabric_id=$_POST["fabric_id"];

$item_id=$_POST["item_id"];
// $vendor_id=$_POST["vendor_id"];
if ($quantity_id==1)
{
	$query=mysqli_query($conn,"select item_cost1 from items where item_id='$item_id'");
	$fetch=mysqli_fetch_array($query);
	$item_cost=$fetch['item_cost1'];}
	else if ($quantity_id==2)
	{
		$query=mysqli_query($conn,"select item_cost2 from items where item_id='$item_id'");
		$fetch=mysqli_fetch_array($query);
		$item_cost=$fetch['item_cost2'];}   
		else if ($quantity_id==3)
		{
			$query=mysqli_query($conn,"select item_cost3 from items where item_id='$item_id'");
			$fetch=mysqli_fetch_array($query);
			$item_cost=$fetch['item_cost3'];} 

			
$query1=mysqli_query($conn,"SELECT fabric_price from fabrics where fabric_id='$fabric_id'");
                        $fetch1=mysqli_fetch_array($query1);
                        $fabric_price=$fetch1['fabric_price'];

			echo json_encode(array('item_cost'=>$item_cost,'fabric_price'=>$fabric_price));
// echo json_encode(array('item_cost'=>$item_cost,'factory_item_cost'=>$factory_item_cost));

			?>

			
			