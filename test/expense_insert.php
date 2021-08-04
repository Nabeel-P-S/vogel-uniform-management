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
$expense_date = $_POST["expense_date"];
$expense = $_POST["expense"];
$expense_name = $_POST["expense_name"];

$user_id = $_SESSION["id"];

$query =  "INSERT INTO `expenses`(`expense_id`, `date`, `expense_name`, `expense`, `user_id`) VALUES(NULL,'$expense_date','$expense_name','$expense','$user_id')";

echo $query;
$res = mysqli_query($conn, $query);
echo $res;

?>