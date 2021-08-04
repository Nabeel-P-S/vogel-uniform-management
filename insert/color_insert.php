<?php
include ("../connect.php");
$color=$_POST["color"];
mysqli_query($conn,"INSERT INTO `colors`(`color_id`, `color`) VALUES (NULL,'$color')");
?>
