<?php
include ("../connect.php");
$item_id=$_POST["item_id"];
$item_name=$_POST["item_name"];
$item_no=$_POST["item_no"];
$item_details=$_POST["item_details"];
$item_category=$_POST["item_category"];
$item_price1=$_POST["item_price1"];
$item_price2=$_POST["item_price2"];
$item_price3=$_POST["item_price3"];


mysqli_query($conn,"UPDATE `items` SET `item_name`='$item_name',`item_no`='$item_no',`item_details`='$item_details',`item_category_id`='$item_category',`item_cost1`='$item_price1',`item_cost2`='$item_price2',`item_cost3`='$item_price3' WHERE  item_id='$item_id'");




echo json_encode(array('item_id'=>$item_id));
?>
