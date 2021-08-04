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
    <div class="col-md-3" style="float: right;">
      <form class="navbar-form" role="search">

        <input class="form-control" placeholder="Search" id="kit" type="text" style="background-color: white; margin-top: 1vw; color: black; float: right;">
      </form>
    </div>
    <h3  style="text-align: center;color: black;"><b>Color List</b></h3>
    <div class="col-lg-12" style="*height: 35.85vw; overflow: auto; ">
      <table border="1" class="w3-table w3-striped w3-hoverable" id="kit_table" style="border-width: 2px;font-weight: bold; *background-color:red; color: black;">
        <thead style="*background-color: #008080; color: black;">



          <tr style="font-size: 1vw;">
<th style="width: 5vw;">SL NO:</th>
<th style="text-align: center;">Color Name</th>

</tr>

</thead>
<tbody>
  <?php
  $query=mysqli_query($conn,"SELECT * FROM `colors`");
  while($fetch=mysqli_fetch_array($query))
  {
   $color_id=$fetch["color_id"];
   $color=$fetch["color"];
  
   
   ?>
   <tr onclick= "edit_category('<?php echo $color_id;?>');">
     <td style="cursor: pointer;" > <?php echo $color_id;?> </td>
     <td style="cursor: pointer;"> <?php echo $color;?> </td>
     
     
   </tr>
    <?php

}
?>
</tbody>
</table>
</div>
</div>

<script type="text/javascript">
  function edit_category(color_id)
   {
    // alert(vendor_id);
    $.ajax({
      type:"POST",
      url:"edit/color_edit.php",
      data:{
        color_id:color_id
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