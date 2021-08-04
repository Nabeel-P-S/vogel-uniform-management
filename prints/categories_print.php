
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
  <style type="text/css">
  td
  {
    font-size: 1vw;
  }
  th
  {
    font-size: 1.3vw;
  }
</style>
  <title>VOGEL UNIFORMS</title>
</head>
<body>
<style type="text/css">
  td
  {
    font-size: 1.3vw;
  }
  th
  {
    font-size: 1.6vw;
  }
</style>
   <script type="text/javascript">
        window.onload=window.print();
    </script>
  <div class="row" >
   
    <h3  style="text-align: center;color: black;"><b>CATEGORIES LIST</b></h3>
    <table border="1" class="w3-table w3-striped w3-hoverable" id="kit_table">
        <thead style="*background-color: #008080; color: black;">



          <tr>
<th >SL NO:</th>
<th style="text-align: center;">Category Name</th>

</tr>

</thead>
<tbody>
  <?php
  $query=mysqli_query($conn,"SELECT * FROM `item_categories`");
  while($fetch=mysqli_fetch_array($query))
  {
   $category_id=$fetch["category_id"];
   $category=$fetch["category"];
  
   
   ?>
   <tr onclick= "edit_category('<?php echo $category_id;?>');"> 
     <td style="cursor: pointer;" > <?php echo $category_id;?> </td>
     <td style="cursor: pointer;"> <?php echo $category;?> </td>
 
     
   </tr>
    <?php

}
?>
</tbody>
</table>

 </div>