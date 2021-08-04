<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$quantity_id=$_POST["quantity_id"];
// echo "success";

$addon_id_array=json_decode($_POST['addon_array_json']) ;

	$sum=0;
for ($i=0; $i <sizeof($addon_id_array) ; $i++)
{ 


	$query1=mysqli_query($conn,"SELECT * from addons where  addon_id='$addon_id_array[$i]'");
	$fetch1=mysqli_fetch_array($query1);
	if ($quantity_id==1){
		$addon_price=$fetch1['addon_price1'];
		$sum+=$addon_price;
	}


	else if ($quantity_id==2){$addon_price=$fetch1['addon_price2'];$sum+=$addon_price;}
	else if ($quantity_id==3){$addon_price=$fetch1['addon_price3'];$sum+=$addon_price;}
 // $addon=$fetch1['addon'];
}

for ($i=0; $i <sizeof($addon_id_array) ; $i++)
{ 


	$query1=mysqli_query($conn,"SELECT * from addons where  addon_id='$addon_id_array[$i]'");
	$fetch1=mysqli_fetch_array($query1);
	if ($quantity_id==1){
		$addon_price=$fetch1['addon_price1'];
		$sum+=$addon_price;
	}


	else if ($quantity_id==2){$addon_price=$fetch1['addon_price2'];$sum+=$addon_price;}
	else if ($quantity_id==3){$addon_price=$fetch1['addon_price3'];$sum+=$addon_price;}
 // $addon=$fetch1['addon'];
}
// echo $sum;
echo json_encode(array('sum4'=>$sum));

?>
