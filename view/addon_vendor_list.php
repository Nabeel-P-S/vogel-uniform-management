<?php
include '../connect.php';
$vendor_id=$_POST["vendor_id"];
ob_start();
session_start();
 $user_id = $_SESSION["id"];
  $user_name = $_SESSION["username"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit; 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="col-lg-12">
    <div class="col-md-3" style="float: right;">
      <form class="navbar-form" role="search">

        <input class="form-control" placeholder="Search" id="kit" type="text" style="background-color: white; margin-top: 1vw; color: black; float: right;">
      </form>
    </div>
    <h3  style="text-align: center;color: black;"><b>ADDON LIST</b></h3>
    <div class="col-lg-12" style="height: 35.85vw; overflow: auto; ">
      <table border="1" class="table" id="kit_table" style="border-width: 2px;font-weight: bold; *background-color:red; color: black;">
        <thead style="*background-color: #008080; color: black;">



          <tr  style="font-size: 1vw;">
<th rowspan="2" style="width: 5vw;">SL NO:</th>
<th rowspan="2" style="text-align: center;">Addon Name</th>
<th colspan="3" style="text-align: center;">Addon Vogel Cost</th>
<th colspan="3" style="text-align: center;">

 <?php echo $vendor_id; ?> Addon Cost

</th>
<!-- <th colspan="3" style="text-align: center;">Addon Factory Cost</th> -->

</tr>
<tr>
  <th>1</th>
  <th>2</th>
  <th>3</th>

  <th>1</th>
  <th>2</th>
  <th>3</th>
</tr>
</thead>
<tbody>
  <?php
  $query=mysqli_query($conn,"SELECT * FROM `addons`");
  while($fetch=mysqli_fetch_array($query))
  {
   $addon_id=$fetch["addon_id"];
   $addons=$fetch["addon"];
 
  
   ?>
   <tr>
     <td style="cursor: pointer;" onclick= "open_kit_list('<?php echo $kit_id;?>');"> <?php echo $addon_id;?> </td>
     <td style="cursor: pointer;" onclick= "open_kit_list('<?php echo $kit_id;?>');"> <?php echo $addons;?> </td>

     
      <?php $query1=mysqli_query($conn,"SELECT quantity_id,addon_price FROM `addon_price` where addon_id='$addon_id'");
  while($fetch1=mysqli_fetch_array($query1))
   {
    $addon_price=$fetch1["addon_price"];
    ?>
    <td><?php echo $addon_price;?></td> 
    <?php
   }
    ?>

     <?php $query2=mysqli_query($conn,"SELECT quantity_id,factory_addon_cost FROM `factory_addon_price` where addon_id='$addon_id' and vendor_id='$vendor_id'");
  while($fetch2=mysqli_fetch_array($query2))
   {
    $factory_addon_cost=$fetch2["factory_addon_cost"];
    ?>
    <td> <?php 
    echo $factory_addon_cost;
    ?> 
  </td> 
    <?php
   }
    ?>
    
     
   </tr>
    <?php

}
?>
</tbody>
</table>
</div>
</div>
</body>
</html>