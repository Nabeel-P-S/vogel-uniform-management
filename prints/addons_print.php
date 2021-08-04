
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
  <title>VOGEL ADDONS</title>

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
  <div class="container-fluid" >
   
    <h3  style="text-align: center;color: black;"><b>ADDONS LIST</b></h3>
   
       <table border="1" class="table" id="kit_table" >
        <thead >



          <tr  >
<th rowspan="2" >SL NO:</th>
<th rowspan="2" style="text-align: center;">Addon Name</th>
<th colspan="3" style="text-align: center;">Addon Vogel Cost</th>

<!-- <th colspan="3" style="text-align: center;">Addon Factory Cost</th> -->

</tr>
<tr>
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
   $addon_price1=$fetch["addon_price1"];
   $addon_price2=$fetch["addon_price2"];
   $addon_price3=$fetch["addon_price3"];
 
  
   ?>
   <tr onclick= "edit_addon('<?php echo $addon_id;?>');">
     <td style="cursor: pointer;"> <?php echo $addon_id;?> </td>
    
     <td style="cursor: pointer;"> <?php echo $addons;?>
  
     

      </td>
 <td style="cursor: pointer;text-align: center;" > <?php echo $addon_price1;?> </td>
     <td style="cursor: pointer;text-align: center;"> <?php echo $addon_price2;?> </td>
     <td style="cursor: pointer;text-align: center;"> <?php echo $addon_price3;?> </td>
     
 

     
    
     
   </tr>
    <?php

}
?>
</tbody>
</table>

 </div>