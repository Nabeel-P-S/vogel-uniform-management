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
<div class="col-lg-6" ><h3 ><b>FABRIC LIST</b></h3> </div>

     <div class="col-lg-2" style="padding-top: 1vw;"><a class="btn btn-danger"  href="prints/fabrics_print.php">PRINT</a>
</div> 

        
    </div>
    <div class="col-lg-12" style="overflow: auto; ">
      <table border="1" class="w3-table w3-striped w3-hoverable" id="kit_table" style="border-width: 2px;font-weight: bold; *background-color:red; color: black;">
        <thead style="*background-color: #008080; color: black;">



          <tr style="font-size: 1vw;">
<th style="width: 5vw;">SL NO:</th>
<th style="text-align: center;">fabric Name</th>
<th style="text-align: center;">fabric Price</th>
<th style="text-align: center;">Action</th>

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
     <td style="cursor: pointer;"> <?php echo $fabric;?> </td>
     <td style="cursor: pointer;"> <?php echo $fabric_price;?> </td>
    <td> <button class="btn  btn-success active"  onclick= "edit_fabric('<?php echo $fabric_id;?>');"> Edit </button> </td>
     
   </tr>
    <?php

}
?>
</tbody>
</table>
</div>
</div>

<script type="text/javascript">
  function edit_fabric(fabric_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/fabric_edit.php",
      data:{
        fabric_id:fabric_id
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