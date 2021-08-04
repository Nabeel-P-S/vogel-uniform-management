
<?php
include"connect.php";
$reference_no=$_POST["reference_no"];
$sql="SELECT * from orders where reference_no=$reference_no";
// echo $sql;
$query=mysqli_query($conn,$sql);
$fetch=mysqli_fetch_array($query);
$order_id=$fetch["order_id"];
$agent_id=$fetch["customer_id"];
$store_delivery_date=$fetch["store_delivery_date"];
$main_delivery_date=$fetch["main_delivery_date"];
$order_quantity=$fetch["order_quantity"];
$order_date=$fetch["order_date"];
echo json_encode(array('order_id'=>$order_id));

?>

