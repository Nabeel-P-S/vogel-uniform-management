<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$customer_id=$_POST["customer_id"];
$query=mysqli_query($conn,"select * from customers where customer_id='$customer_id'");
$fetch=mysqli_fetch_array($query);
$shop_name=$fetch['shop_name'];
$customer_name=$fetch['customer_name'];
$customer_address=$fetch['customer_address'];
$customer_place=$fetch['customer_place'];
$customer_pincode=$fetch['customer_pincode'];
$customer_district=$fetch['customer_district'];
$customer_mobile1=$fetch['customer_mobile1'];
 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
 echo $customer_name;echo "<br>";
echo $shop_name; echo "<br>";

 
 echo $customer_address." ".$customer_place;echo "<br>";
 // echo "pin"." ".$customer_pincode;echo "<br>";
 
 echo "Phone"." ". $customer_mobile1;echo "<br>";
 // echo $customer_district;echo "<br>";
?>

</body>
</html>