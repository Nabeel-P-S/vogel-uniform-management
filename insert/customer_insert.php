<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$shop_name=$_POST["shop_name"];
$customer_name=$_POST["customer_name"];
$customer_address=$_POST["customer_address"];
$customer_place=$_POST["customer_place"];
$customer_district=$_POST["customer_district"];
$customer_state=$_POST["customer_state"];
$customer_pincode=$_POST["customer_pincode"];
$customer_mobile1=$_POST["customer_mobile1"];
$customer_mobile2=$_POST["customer_mobile2"];
$customer_email=$_POST["customer_email"];
$customer_adhar=$_POST["customer_adhar"];
$customer_license=$_POST["customer_license"];
$sql="INSERT INTO `customers`(`customer_id`, `shop_name`, `customer_name`, `customer_address`, `customer_place`, `customer_pincode`, `customer_district`, `customer_state`,  `customer_email`, `customer_mobile1`, `customer_mobile2`, `customer_adhar`, `customer_license`) VALUES(NULL,'$shop_name','$customer_name','$customer_address','$customer_place','$customer_pincode','$customer_district','$customer_state','$customer_email','$customer_mobile1','$customer_mobile2','$customer_adhar','$customer_license')";

if($query=mysqli_query($conn,$sql)) 
{
	echo "success";
}
else
{
	echo mysqli_error($conn);
}
?>
