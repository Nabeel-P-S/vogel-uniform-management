<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>kit list</title>
</head>
<body>

  <div class="row" style="*background-image: linear-gradient(180deg, rgb(1, 88, 96,.8), #002437);color: white; height: 42vw;">
     <div class="container">
   <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw; *background-color: white; margin-top: 1vw; color: black;">   </div>
<div class="col-lg-6" ><h3 ><b>FACTORY LIST</b></h3> </div>

     <div class="col-lg-2" style="padding-top: 1vw;"><a class="btn btn-danger"  href="prints/factories_print.php">PRINT</a>
</div> 

        
    </div>
      <table border="1" class="table table-hover" id="kit_table" style="border-width: 2px;font-weight: bold; *background-color:red; color: black;">
        <thead style="*background-color: #008080; color: black;">



          <tr style="font-size: 1vw;">
<th style="width: 5vw;">SL NO:</th>

<th style="text-align: center;">Factory Name</th>
<th style="text-align: center;">Vendor Name</th>
<th style="text-align: center;">Address</th>
<th style="text-align: center;">Place</th>
<th style="*text-align: center; ">Action</th>

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
  
   
   ?>
   <tr onclick="edit_factory('<?php echo $vendor_id;?>');">
     <td style="cursor: pointer;"> <?php echo $vendor_id;?> </td>
     <td style="cursor: pointer;"> <?php echo $factory_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_address;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_place;?> </td>
     <td> <a  href="view/vendor_view.php?vendor_id=<?php echo $vendor_id;?>"> Print</a></td>
    
     
   </tr>
    <?php

}
?>
</tbody>
</table>
</div>
</div>

<script type="text/javascript">
  function edit_factory(vendor_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/factory_edit.php",
      data:{
        vendor_id:vendor_id
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