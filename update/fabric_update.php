<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$fabric_id=$_POST["fabric_id"];
$fabric=$_POST["fabric"];
$fabric_price=$_POST["fabric_price"];

mysqli_query($conn,"UPDATE `fabrics` SET `fabric`='$fabric',`fabric_price`='$fabric_price' WHERE fabric_id='$fabric_id'");


?>
