<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$fabric_name=$_POST["fabric_name"];
$fabric_price=$_POST["fabric_price"];

mysqli_query($conn,"INSERT INTO `fabrics`(`fabric_id`, `fabric`, `fabric_price`) VALUES (NULL,'$fabric_name','$fabric_price')");


?>
