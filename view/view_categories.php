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
  <title>kit list</title>
</head>
<body>

  <div class="row" >
      <div class="container">
   <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw;  margin-top: 1vw; color: black;">   </div>
<div class="col-lg-6" ><h3 ><b>ITEMS LIST</b></h3> </div>

     <div class="col-lg-2" style="padding-top: 1vw;"><a class="btn btn-danger"  href="prints/categories_print.php">PRINT</a>
</div> 

        
    </div>
    <div class="col-lg-12" style="height: *40.85vw; overflow: auto; color: black;">
      <table border="1" class="w3-table w3-striped w3-hoverable" id="kit_table">
        <thead style="*background-color: #008080; ">



          <tr style="font-size: 1vw;">
<th style="width: 5vw;">SL NO:</th>
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
</div>

<script type="text/javascript">
  function edit_category(category_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/category_edit.php",
      data:{
        category_id:category_id
      },
      success:function(data)
      {
        // alert(data);
        $("#total_div").html(data);
      }

    })
  }
</script>

</body>
</html>