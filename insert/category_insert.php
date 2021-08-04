<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$category_name=$_POST["category_name"];

mysqli_query($conn,"INSERT INTO `item_categories`(`category_id`, `category`) VALUES (NULL,'$category_name')");


?>
