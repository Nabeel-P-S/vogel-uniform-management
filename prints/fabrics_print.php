
<?php
include '../connect.php';
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
  <title>VOGEL UNIFORMS</title>

</head>
<body>
<style type="text/css">
  td
  {
    font-size: 1.5vw;
  }
  th
  {
    font-size: 1.8vw;
  }
</style>
   <script type="text/javascript">
        window.onload=window.print();
    </script>
  <div class="row" >
   
    <h3  style="text-align: center;color: black;"><b>ITEM LIST</b></h3>
   <table border="1" class="w3-table w3-striped w3-hoverable" id="kit_table" style="border-width: 2px;font-weight: bold; *background-color:red; color: black;">
        <thead style="*background-color: #008080; color: black;">



          <tr>
<th >SL NO:</th>
<th style="text-align: center;">fabric Name</th>
<th style="text-align: center;">fabric Price</th>

</tr>

</thead>
<tbody>
  <?php
  $query=mysqli_query($conn,"SELECT * FROM `fabrics` order by fabric_id desc");
  while($fetch=mysqli_fetch_array($query))
  {
   $fabric_id=$fetch["fabric_id"];
   $fabric=$fetch["fabric"];
   $fabric_price=$fetch["fabric_price"];
  
   
   ?>
   <tr>
     <td style="cursor: pointer;" > <?php echo $fabric_id;?> </td>
     <td style="cursor: pointer;text-align: center;"> <?php echo $fabric;?> </td>
     <td style="cursor: pointer;text-align: center;"> <?php echo $fabric_price;?> </td>
   
     
   </tr>
    <?php

}
?>
</tbody>
</table>

 </div>