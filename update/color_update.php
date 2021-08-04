<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$color_id=$_POST["color_id"];
$color=$_POST["color"];

mysqli_query($conn,"UPDATE `colors` SET `color`='$color' WHERE color_id='$color_id'");


?>
