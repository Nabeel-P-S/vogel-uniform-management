
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
    font-size:1vw;
  }
  th
  {
    font-size: 1.2vw;
  }
</style>
  <title>VOGEL CUSTOMERS</title> <script type="text/javascript">
        window.onload=window.print();
    </script>
    <?php include"../scripts.php";?>
</head>
<body>

  <div class="row" style="*background-image: linear-gradient(180deg, rgb(1, 88, 96,.8), #002437);color: white;">
 
    <h3  style="text-align: center;color: black;"><b>CUSTOMER LIST</b></h3>

    <div class="col-lg-12" style=" overflow: auto; ">
      <table border="1" class="table table-hover" id="kit_table" style="border-width: 2px;font-weight: bold; color: black;">
        <thead style="*background-color: #008080; color: black;">


<tr>
<th style="width: 5vw;">SL NO:</th>
<th style="text-align: center;">Shop Name </th>
<th style="text-align: center;"> Name</th>
<th style="text-align: center;"> Address</th>
<th style="text-align: center;"> Place</th>
<th style="text-align: center;"> Pincode</th>
<th style="text-align: center;"> District</th>
<th style="text-align: center;"> Mobile</th>
<th style="text-align: center;"> Mobile2</th>
<th style="text-align: center;"> Adhar</th>
<th style="text-align: center;"> License</th>
</tr>

</thead>
<tbody id="myTable">
  <?php
  $query=mysqli_query($conn,"SELECT * FROM `customers`ORDER BY customer_id desc");
  while($fetch=mysqli_fetch_array($query))
  {
   $customer_id=$fetch["customer_id"];
   $shop_name=$fetch["shop_name"];
   $customer_name=$fetch["customer_name"];
   $customer_address=$fetch["customer_address"];
   $customer_place=$fetch["customer_place"];
   $customer_pincode=$fetch["customer_pincode"];
   $customer_district=$fetch["customer_district"];
   $customer_mobile1=$fetch["customer_mobile1"];
   $customer_mobile2=$fetch["customer_mobile2"];
   $customer_adhar=$fetch["customer_adhar"];
   $customer_license=$fetch["customer_license"];
   
   ?>
           <tr onclick= "edit_customer('<?php echo $customer_id;?>');">

     <td style="cursor: pointer;" > <?php echo $customer_id;?> </td>
     <td style="cursor: pointer;" > <?php echo $shop_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_address;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_place;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_pincode;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_district;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_mobile1;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_mobile2;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_adhar;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_license;?> </td>
    
     
     
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