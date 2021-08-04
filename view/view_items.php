
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
    <?php include"scripts.php";?>

  <title>kit list</title>
</head>
<body>

  <div class="row" >
  <div class="container">
   <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw;  margin-top: 1vw; color: black;">   </div>
<div class="col-lg-6" ><h3 ><b>ITEMS LIST</b></h3> </div>

     <div class="col-lg-2" style="padding-top: 1vw;"><a class="btn btn-danger"  href="prints/items_print.php">PRINT</a>
</div> 

        
    </div>
      
      <table border="1" class="table table-hover" id="kit_table">
        <thead >



          <tr style="font-size: .8vw;font-weight: bold;">
            <th rowspan="2" style="width: 4vw;">SL NO:</th>
            <th rowspan="2" style="width: 7vw;">Vogel No:</th>
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
  <th>25 - </th>
</tr>
        </thead>
        <tbody id="myTable">
          <?php
          $query=mysqli_query($conn,"SELECT items.item_id,items.item_no,items.item_details,items.item_name,items.item_image,item_categories.category,items.item_cost1,items.item_cost2,items.item_cost3 FROM `items` LEFT JOIN item_categories ON item_categories.category_id=items.item_category_id ORDER BY   items.item_id DESC");
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
           <tr style="font-size: .8vw;font-weight: bold;" onclick= "edit_item('<?php echo $item_id;?>');">
             <td style="cursor: pointer;" > <?php echo $item_id;?> </td>
             <td style="cursor: pointer;" > <?php echo $item_no;?> </td>
             <td style="cursor: pointer;"> <?php echo $item_name;?>
<!--               <img style="width: 5vw;height: 2vw;" src="../item_images/<?php echo $item_image;?>"> 
 -->            </td>
             <td style="cursor: pointer;"> <?php echo $item_details;?> </td>
             <td style="cursor: pointer;"> <?php echo $category;?> </td>
             <td style="cursor: pointer;"> <?php echo $item_cost1;?> </td>
             <td style="cursor: pointer;"> <?php echo $item_cost2;?> </td>
             <td style="cursor: pointer;"> <?php echo $item_cost3;?> </td>
             <!-- <td> <button class="btn  btn-success active" style="height: 10px;" > Edit </button> </td> -->

 

          
          
             
           </tr>
           <?php

         }
         ?>
       </tbody>
     </table>

 </div>

<script type="text/javascript">
  function edit_item(item_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/item_edit.php",
      data:{
        item_id:item_id
      },
      success:function(data)
      {
        // alert(data);
        $("#total_div").html(data);
      }

    })
  }
  $(document).ready(function(){

  $("#myInput").on("keyup", function()

   {

    var value = $(this).val().toLowerCase();

    $("#myTable tr").filter(function() {

      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

    });

  });

});
</script>

</body>
</html>