<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>addon list</title>
</head>
<body>

  <div id="addon_list_div" class="row" style="*background-image: linear-gradient(180deg, rgb(1, 88, 96,.8), #002437);color: white; height: 42vw;">
<div class="col-lg-12" >
     <div class="container">
   <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw; *background-color: white; margin-top: 1vw; color: black;">   </div>
<div class="col-lg-6" ><h3 ><b>ADDONS LIST</b></h3> </div>

     <div class="col-lg-2" style="padding-top: 1vw;"><a class="btn btn-danger"  href="prints/addons_print.php">PRINT</a>
</div> 

        
    </div>
    <div class="col-lg-12" style="*height: 35.85vw; overflow: auto; ">
      <table border="1" class="table" id="kit_table" style="border-width: 2px;font-weight: bold; *background-color:red; color: black;">
        <thead style="*background-color: #008080; color: black;">



          <tr  style="font-size: 1vw;">
<th rowspan="2" style="width: 5vw;">SL NO:</th>
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
 <td style="cursor: pointer;" > <?php echo $addon_price1;?> </td>
     <td style="cursor: pointer;"> <?php echo $addon_price2;?> </td>
     <td style="cursor: pointer;"> <?php echo $addon_price3;?> </td>
     
 

     
    
     
   </tr>
    <?php

}
?>
</tbody>
</table>
</div>
</div>
</div>

<script type="text/javascript">
  function vendor_addon_price(value)
  {
    alert("aaaa");
    var vendor_id=value;
     alert(vendor_id);
 $.ajax(
          {
          type:"POST",
          url:"view/addon_vendor_list.php",
          data:{
            vendor_id:vendor_id
          
          },
          success: function(data_output)
          {
            // alert(data_output);
            $("#addon_list_div").html(data_output);
          }   
        });  
  }
</script>

<script type="text/javascript">
  function edit_addon(addon_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/addon_edit.php",
      data:{
        addon_id:addon_id
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