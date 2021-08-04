<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$vendor_id=$_POST["vendor_id"];
$item_id=$_POST["item_id"];
$fabric_id=$_POST["fabric_id"];

$query0=mysqli_query($conn,"SELECT item_name from items where item_id='$item_id'");
$fetch0=mysqli_fetch_array($query0);
$item_name=$fetch0["item_name"];
$query02=mysqli_query($conn,"SELECT fabric from fabric where fabric_id='$fabric_id'");
$fetch02=mysqli_fetch_array($query02);
$fabric=$fetch02["fabric"];

$query=mysqli_query($conn,"SELECT * from vendors where vendor_id='$vendor_id'");
$fetch=mysqli_fetch_array($query);
$factory_name=$fetch['factory_name'];
$vendor_name=$fetch['vendor_name'];
$vendor_address=$fetch['vendor_address'];
$vendor_place=$fetch['vendor_place'];
$vendor_pincode=$fetch['vendor_pincode'];
$vendor_district=$fetch['vendor_district'];
$vendor_mobile1=$fetch['vendor_mobile1'];

 $query1=mysqli_query($conn,"SELECT `factory_item_cost1`, `factory_item_cost2`, `factory_item_cost3` FROM `factory_cost` WHERE item_id='$item_id' and vendor_id='$vendor_id'");
 $fetch1=mysqli_fetch_array($query1);
 $factory_item_cost1=$fetch1['factory_item_cost1'];
 $factory_item_cost2=$fetch1['factory_item_cost2'];
 $factory_item_cost3=$fetch1['factory_item_cost3'];
$check= mysqli_num_rows($query1);
if ($check==0)
{?>
	<table><tr><td><p style="color: red;"> <?php echo $item_name." "."is not available here"?></p></td>
<?php }
else
{

 // echo $vendor_name;echo "<br>";
// echo $factory_name; 

 
//  echo " ". $vendor_address." ".$vendor_place;echo "<br>";
//  // echo "pin"." ".$vendor_pincode;echo "<br>";
 
//  echo "Phone"." ". $vendor_mobile1;echo "<br>";
 echo "ITEM ". $item_name." "."-"." ". $factory_item_cost1.", ".$factory_item_cost2." ,".$factory_item_cost3;
 // echo $vendor_district;echo "<br>";



}
 $query2=mysqli_query($conn,"SELECT `factory_fabric_price` FROM `factory_fabric_price` WHERE fabric_id='$fabric_id' and vendor_id='$vendor_id'");
 $fetch2=mysqli_fetch_array($query2);
 $factory_fabric_price=$fetch2['factory_fabric_price'];
 
$check2= mysqli_num_rows($query2);
if ($check2==0)
{?>
	<td><p style="color: red;"> <?php echo $fabric." "."is not available here"?></p></td></tr></table>
<?php }
else
{

 echo "FABRIC ". $fabric." "."-"." ". $factory_fabric_price;



}
?>
