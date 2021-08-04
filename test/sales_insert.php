<?php
include ("config.php");
include ("connect.php");
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  echo "failure";
  exit;
}

// include ("config.php");
// include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$sales_date = $_POST["sales_date"];
$sales_name = $_POST["sales_name"];
$sales = $_POST["sales"];

$user_id = $_SESSION["id"];

$query =  "INSERT INTO `sales`(`sales_id`, `sales_name`, `sale`, `sales_date`, `user_id`) VALUES (NULL,'$sales_name','$sales','$sales_date','$user_id')";

echo $query;
$res = mysqli_query($conn, $query);
echo $res;

?>