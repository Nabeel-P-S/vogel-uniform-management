<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$quantity_id=$_POST["quantity_id"];
$vendor_id=$_POST["vendor_id"];
// echo "success";

$addon_id_array=json_decode($_POST['addon_array_json']) ;

	$sum=0;

for ($i=0; $i <sizeof($addon_id_array) ; $i++)
{ 

	$query1=mysqli_query($conn,"SELECT * from factory_addon_price where vendor_id='$vendor_id' and  addon_id='$addon_id_array[$i]'");
	$fetch1=mysqli_fetch_array($query1);
	if ($quantity_id==1){
		$factory_addon_price=$fetch1['factory_addon_price1'];
		$sum+=$factory_addon_price;
	}


	else if ($quantity_id==2){$factory_addon_price=$fetch1['factory_addon_price2'];$sum+=$factory_addon_price;}
	else if ($quantity_id==3){$factory_addon_price=$fetch1['factory_addon_price3'];$sum+=$factory_addon_price;}
 // $addon=$fetch1['addon'];
}
// echo $sum;
echo json_encode(array('sum4'=>$sum));

?>
