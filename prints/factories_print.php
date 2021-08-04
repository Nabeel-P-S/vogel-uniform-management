
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
    font-size:1.2vw;
  }
  th
  {
    font-size: 1.5vw;
  }
</style>


  <title>VOGEL VENDORS</title> <script type="text/javascript">
        window.onload=window.print();
    </script>
</head>
<body>

  <div class="container-fluid" style="*background-image: linear-gradient(180deg, rgb(1, 88, 96,.8), #002437);color: white;">
 
    <h3  style="text-align: center;color: black;"><b>VENDORS LIST</b></h3>

    <div class="col-lg-12" style=" overflow: auto; ">
      <table border="1" class="table table-hover" id="kit_table" style="border-width: 2px;font-weight: bold; *background-color:red; color: black;">
        <thead style="*background-color: #008080; color: black;">



          <tr style="font-size: 1vw;">
<th style="width: 5vw;">SL NO:</th>

<th style="text-align: center;">Factory Name</th>
<th style="text-align: center;">Vendor Name</th>
<th style="text-align: center;">Address</th>
<th style="text-align: center;">Place</th>
<th style="text-align: center;">Pincode</th>
<th style="text-align: center;">District</th>
<th style="text-align: center;">Mobile1</th>
<th style="text-align: center;">Mobile2</th>


</tr>

</thead>
<tbody>
  <?php
  $query=mysqli_query($conn,"SELECT * FROM `vendors` order by vendor_id desc");
  while($fetch=mysqli_fetch_array($query))
  {
   $vendor_id=$fetch["vendor_id"];
   $factory_name=$fetch["factory_name"];
   $vendor_name=$fetch["vendor_name"];
   $vendor_address=$fetch["vendor_address"];
   $vendor_place=$fetch["vendor_place"];
   $vendor_pincode=$fetch["vendor_pincode"];
   $vendor_district=$fetch["vendor_district"];
   $vendor_mobile1=$fetch["vendor_mobile1"];
   $vendor_mobile2=$fetch["vendor_mobile2"];
  
   
   ?>
   <tr onclick="edit_factory('<?php echo $vendor_id;?>');">
     <td style="cursor: pointer;"> <?php echo $vendor_id;?> </td>
     <td style="cursor: pointer;"> <?php echo $factory_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_address;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_place;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_pincode;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_district;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_mobile1;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_mobile2;?> </td>
    
     
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