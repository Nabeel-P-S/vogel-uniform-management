<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$vendor_id=$_POST["vendor_id"];


$addon_id_array=json_decode($_POST['addon_array_json']) ;


for ($i=0; $i <sizeof($addon_id_array) ; $i++)
 { 


 $query1=mysqli_query($conn,"SELECT addons.addon, factory_addon_price.factory_addon_price1,factory_addon_price.factory_addon_price2,factory_addon_price.factory_addon_price3 FROM `factory_addon_price` left join addons on addons.addon_id=factory_addon_price.addon_id where factory_addon_price.vendor_id='$vendor_id' and factory_addon_price.addon_id='$addon_id_array[$i]'");
 $fetch1=mysqli_fetch_array($query1);
 $factory_addon_price1=$fetch1['factory_addon_price1'];
 $factory_addon_price2=$fetch1['factory_addon_price2'];
 $factory_addon_price3=$fetch1['factory_addon_price3'];
 $addon=$fetch1['addon'];
 $check= mysqli_num_rows($query1);
if ($check==0)
{ ?>
	<p style="color: red;"> <?php echo $addon." Addon not available here"?></p>
<?php }
else
{

 echo $addon;
  // echo "<br>";

 echo $factory_addon_price1.", ".$factory_addon_price2." ,".$factory_addon_price3;

}

}
?>







