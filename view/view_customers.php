<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>kit list</title>
</head>
<body>

  <div class="row" style="*background-image: linear-gradient(180deg, rgb(1, 88, 96,.8), #002437);color: white;">
      <div class="container">
   <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw; *background-color: white; margin-top: 1vw; color: black;">   </div>
<div class="col-lg-6" ><h3 ><b>CUSTOMERS LIST</b></h3> </div>

     <div class="col-lg-2" style="padding-top: 1vw;"><a class="btn btn-danger"  href="prints/customers_print.php">PRINT</a>
</div> 

        
    </div>
    <div class="col-lg-12" style=" overflow: auto; ">
      <table border="1" class="table table-hover" id="kit_table" style="border-width: 2px;font-weight: bold; color: black;">
        <thead style="*background-color: #008080; color: black;">


<tr>
<th style="width: 5vw;">SL NO:</th>
<th style="text-align: center;">Shop Name </th>
<th style="text-align: center;">Customer Name</th>
<th style="text-align: center;">Customer Address</th>
<th style="text-align: center;">Customer Place</th>
<th style="text-align: center;">Customer Mobile</th>
<!-- <th style="text-align: center;">Action</th>
 --></tr>

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
   $customer_mobile1=$fetch["customer_mobile1"];
   
   ?>
           <tr onclick= "edit_customer('<?php echo $customer_id;?>');">

     <td style="cursor: pointer;" > <?php echo $customer_id;?> </td>
     <td style="cursor: pointer;" > <?php echo $shop_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_address;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_place;?> </td>
     <td style="cursor: pointer;"> <?php echo $customer_mobile1;?> </td>
      <!-- <td> <button class="btn  btn-success active" style="height: 2.5vw;" onclick= "edit_customer('<?php echo $customer_id;?>');"> Edit </button> </td> -->
     
     
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

<script type="text/javascript">
  function edit_customer(customer_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/customer_edit.php",
      data:{
        customer_id:customer_id
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