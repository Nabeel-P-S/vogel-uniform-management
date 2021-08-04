<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$item_no=$_POST["item_no"];
$item_name=$_POST["item_name"];
$item_details=$_POST["item_details"];
$item_category=$_POST["item_category"];
$item_price1=$_POST["item_price1"];
$item_price2=$_POST["item_price2"];
$item_price3=$_POST["item_price3"];

$sql="INSERT INTO `items`(`item_id`, `item_no`, `item_name`,`item_details`, `item_category_id`,  `item_cost1`, `item_cost2`, `item_cost3`) VALUES  (NULL,'$item_no','$item_name','$item_details','$item_category','$item_price1','$item_price2','$item_price3')";
if($query=mysqli_query($conn,$sql)) 
{
	echo "success";
}
else
{
	echo mysqli_error($conn);
}
$item_id = $conn->insert_id; 


echo json_encode(array('item_id'=>$item_id));
?>
