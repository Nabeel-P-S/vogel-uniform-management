
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
    <?php include "../scripts.php";?>

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
  <div class="container-fluid" >
   
    <h3  style="text-align: center;color: black;"><b>ITEM LIST</b></h3>
   
      <table border="1" class="table table-condensed" id="kit_table" >
        <thead >



          <tr >
            <th rowspan="2" style="width: 2vw;">No:</th>
            <th rowspan="2" style="width: 5vw;">Vogel No:</th>
            <th rowspan="2" style="text-align: center;">Item Name</th>
            <th rowspan="2" style="text-align: center;">Item Details</th>
            <th rowspan="2" style="text-align: center;">Item Category</th>
            <th colspan="3" style="text-align: center;">Item Cost</th>
<!--             <th rowspan="2" style="text-align: center;">Actions</th>
 -->            <!-- <th rowspan="2" style="text-align: center;">Item Image</th> -->

          </tr>

<tr>
  <th>0-6</th>
  <th>7-24</th>
  <th>25- </th>
</tr>
        </thead>
        <tbody id="myTable">
          <?php
          $query=mysqli_query($conn,"SELECT items.item_id,items.item_no,items.item_details,items.item_name,items.item_image,item_categories.category,items.item_cost1,items.item_cost2,items.item_cost3 FROM `items` LEFT JOIN item_categories ON item_categories.category_id=items.item_category_id ORDER BY   items.item_id ASC");
          while($fetch=mysqli_fetch_array($query))
          {
           $item_id=$fetch["item_id"];
           $item_no=$fetch["item_no"];
           $item_name=$fetch["item_name"];
           $item_details=$fetch["item_details"];
           $category=$fetch["category"];
           $item_image=$fetch["item_image"];
           $item_cost1=$fetch["item_cost1"];
           $item_cost2=$fetch["item_cost2"];
           $item_cost3=$fetch["item_cost3"];
           
           
           ?>
           <tr onclick= "edit_item('<?php echo $item_id;?>');">
             <td > <?php echo $item_id;?> </td>
             <td > <?php echo $item_no;?> </td>
             <td > <?php echo $item_name;?>
<!--               <img style="width: 5vw;height: 2vw;" src="../item_images/<?php echo $item_image;?>"> 
 -->            </td>
             <td> <?php echo $item_details;?> </td>
             <td> <?php echo $category;?> </td>
             <td> <?php echo $item_cost1;?> </td>
             <td> <?php echo $item_cost2;?> </td>
             <td> <?php echo $item_cost3;?> </td>
             <!-- <td> <button class="btn  btn-success active" style="height: 10px;" > Edit </button> </td> -->

 

          
          
             
           </tr>
           <?php

         }
         ?>
       </tbody>
     </table>

 </div>