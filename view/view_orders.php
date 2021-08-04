<?php
include '../connect.php';
session_start();
 $user_id = $_SESSION["id"];
  $user_name = $_SESSION["username"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Orders list</title>
  <?php include"../scripts.php";?>
</head>
<body>

  <div class="container">
   <div class="col-lg-4" ><input class="form-control" placeholder="Search" id="myInput" type="text" style="width: 10vw; *background-color: white; margin-top: 1vw; color: black;">   </div>
<div class="col-lg-6" ><h3 ><b>ORDER LIST</b></h3> </div>

     <div class="col-lg-2" style="padding-top: 1vw;"><a class="btn btn-danger"  href="prints/orders_print.php">PRINT</a>
</div> 

        
    </div>

   
  
      <table border="1" class="table">
        <thead>

         <tr style="font-size: 1vw;">
          <th>No</th>
          
          <th style="text-align: center;">Customer </th>
          <th style="text-align: center;">Item </th>
          <th style="text-align: center;">Qty</th>
          <th style="text-align: center;">Factory </th>
          <th style="text-align: center;">Date </th>
          <th style="text-align: center;">Delivery </th>
          <th style="text-align: center;">Fabric</th>
          <th style="text-align: center;">Color</th>
          <th style="text-align: center;">Status</th>
          <th style="text-align: center;">Action</th>

        </tr>

</thead>
<tbody id="myTable">
    <?php
  $query=mysqli_query($conn,"SELECT orders.order_id,orders.order_date,colors.color,fabrics.fabric,orders.store_delivery_date,orders.status,customers.customer_name,customers.shop_name,items.item_name,vendors.factory_name,orders.order_quantity from orders LEFT JOIN customers on customers.customer_id=orders.customer_id 
LEFT join items on items.item_id=orders.item_id 
LEFT join colors on colors.color_id=orders.color_id 
LEFT join fabrics on fabrics.fabric_id=orders.fabric_id 
left join vendors on vendors.vendor_id=orders.vendor_id ORDER BY   orders.order_id DESC");
  while($fetch=mysqli_fetch_array($query))
  {
   $order_id=$fetch["order_id"];
   $vendor_name=$fetch["factory_name"];

   $customer_name=$fetch["customer_name"];


   $shop_name=$fetch["shop_name"];
   $order_date=$fetch["order_date"];
   
   
   $store_delivery_date=$fetch["store_delivery_date"];
   $item_name=$fetch["item_name"];
   $order_quantity=$fetch["order_quantity"];
   $status=$fetch["status"];
   $color=$fetch["color"];
   $fabric=$fetch["fabric"];
  
  
   
   ?>
   <tr style="font-size: .8vw;font-weight: bold;">
     <td style="cursor: pointer;"> <?php echo $order_id;?>  </td>
     
     <td style="cursor: pointer;" > <?php echo $shop_name ." "."/". $customer_name;?> </td>
     <td style="cursor: pointer;" onclick= "open_addon_list('<?php echo $order_id;?>');"> <?php echo $item_name;?> </td>
     <td style="cursor: pointer;" onclick= "open_size_list('<?php echo $order_id;?>');">  <?php echo $order_quantity;?> </td>
     <td style="cursor: pointer;"> <?php echo $vendor_name;?> </td>
     <td style="cursor: pointer;"> <?php echo $order_date;?>  </td>
     <td style="cursor: pointer;"> <?php echo $store_delivery_date;?> </td>
     <td style="cursor: pointer;"> <?php echo $fabric;?> </td>
     <td style="cursor: pointer;"> <?php echo $color;?> </td>
     <td style="cursor: pointer;"> <?php echo $status;?> </td>
      <td >
        <a style="font-size: 15px;background-color: #429842;border-radius: 2px;color: white;padding: 1px;padding-left: 10px;padding-right: 10px;" href="details/order_view1.php?order_id=<?php echo $order_id;?>">VIEW</a>
               <a onclick="edit_order('<?php echo $order_id;?>');" style="cursor: pointer; font-size: 15px;background-color:blue;border-radius: 2px;color: white;padding: 1px;padding-left: 10px;padding-right: 10px;">EDIT</a>
      </td>
    
     
   </tr>
   <tr >
  <td colspan="8" style="padding: 0;">
     <div style="display: none;" id="size_td<?php echo $order_id; ?>">

      <table class="table" style="background-color:white; color: black;font-weight: bold;">
        <thead style="background-color:#2196F3; font-size:8vw;  color: black;">
   <tr style="font-size: 1vw;">
           <th >SL NO:</th>
           <th style="text-align: center;"> Sizes </th>
            <th style="text-align: center;">Size Quantity</th>

          </tr>
        </thead>
    <?php
              $query2=mysqli_query($conn,"SELECT order_quantity.id, order_quantity.order_id,order_quantity.order_quantity, order_quantity.size_id,sizes.size FROM `order_quantity` left join `sizes` on sizes.size_id=order_quantity.size_id  WHERE order_id='$order_id'");
                 $sleno=1;
                while ($fetch2=mysqli_fetch_array($query2))
                 {
                 $id=$fetch2['id'];
            
         
                $size=$fetch2['size'];
                 $order_quantity=$fetch2['order_quantity'];

        
          ?>
        <tr>

          <td> <?php echo $sleno; ?></td>
          <td> <?php echo $size; ?></td>
          <td> <?php echo $order_quantity; ?></td>
          
            
      </tr>





<?php
$sleno++;
  }
    ?>
  </table>
      </div>
    </td>
  </tr>



  <tr>
    <td colspan="8" style="padding: 0;">
     <div style="display: none;" id="addon_td<?php echo $order_id; ?>">

      <table border="1" class="table" style="background-color:white; color: black;font-weight: bold;">
        <thead style="background-color:pink; font-size:8vw;  color: black;">
         <tr style="font-size: 1vw;">
           <th >SL NO:</th>
           <th style="text-align: center;">
             ADDONS 
           </th>
           <!-- <th style="text-align: center;">item Quantity</th> -->

         </tr>
       </thead>
       <?php
       $query1=mysqli_query($conn,"SELECT order_addons.id, order_addons.order_id, order_addons.addon_id,addons.addon FROM `order_addons`
        left join `addons` on addons.addon_id=order_addons.addon_id  WHERE order_id='$order_id'");
       $sleno=1;
       while ($fetch1=mysqli_fetch_array($query1))
       {
        $id=$fetch1['id'];


        $addon=$fetch1['addon'];


        ?>
        <tr>

          <td> <?php echo $sleno; ?></td>
          <td> <?php echo $addon; ?></td>
          

        </tr>

<?php
$sleno++;
  }
    ?>
  </table>
      </div>
    </td>
  </tr>


    <?php

}
?>
</tbody>
</table>


                  
  <script type="text/javascript">
                    function open_order(order_id)
                    {
                      if ("<?php echo $user_name; ?>" != "admin")
                      {
                        swal("NO ACESS","Contact Admin ","error");
                      }
                      else
                      {

              $.ajax(
              {
                type:"POST",
                // dataType:"json",
                url:"details/order_view.php",
                // url:"details/details_box.php",
                data:{
                  order_id:order_id
                   
                    },
                  
                success:function(data)
                {
                  // alert(data);
// document.getElementById("full_div").style.border=red;
                  // $("#full_div").html(data);
                  $("#total_div").html(data);

                }
              })
                      }
                      // alert(order_id);
     // document.getElementById('buyer_modal').style.display = "block";
// alert("opening order");
           
           
                      

                    }

                  </script>
                  
</body>
    <script type="text/javascript">
      function edit_order(order_id)
   {
 // alert(order_id);
    $.ajax({
      type:"POST",
      url:"edit/order_edit.php",
      data:{
        order_id:order_id
      },
      success:function(data)
      {
        // alert(data);
        $("#total_div").html(data);
      }

    })
  }
    </script>
    <script>
    function open_addon_list(order_id)
  {

if (document.getElementById("addon_td"+order_id).style.display=="block")
{
  document.getElementById("addon_td"+order_id).style.display="none";
  }
  else
  {
   document.getElementById("addon_td"+order_id).style.display="block"; 
  }
}
</script>
<script>
    function open_size_list(order_id)
  {

if (document.getElementById("size_td"+order_id).style.display=="block")
{
  document.getElementById("size_td"+order_id).style.display="none";
  }
  else
  {
   document.getElementById("size_td"+order_id).style.display="block"; 
  }
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
</html>