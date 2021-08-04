<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$category_id=$_POST["category_id"];
$category_name=$_POST["category_name"];

mysqli_query($conn,"UPDATE `item_categories` SET `category`='$category_name' WHERE category_id='$category_id'");


?>
