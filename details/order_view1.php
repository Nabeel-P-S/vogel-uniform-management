<?php
include("../connect.php");

if (isset($_GET['order_id']))
{
  $order_id=$_GET['order_id'];

}
else
{
  $order_id=$_POST['order_id'];
}
include("order_complete.php");
include "order_images.php";


// include("../view/view_orders.php");




?>

<html>
<script type="text/javascript">
  // function view_image()
  // {
  //   document.getElementById("image_preview").src= URL.createObjectURL(event.target.files[0]);
  // }
</script>
<style>


ul.ks-cboxtags {
    list-style: none;
    padding: 20px;
}
ul.ks-cboxtags li{
  display: inline;
}
ul.ks-cboxtags li label{
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 2px solid rgba(139, 139, 139, .3);
    color: #adadad;
    border-radius: 25px;
    white-space: nowrap;
    /*margin: 3px 0px;*/
    /*-webkit-touch-callout: none;*/
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.ks-cboxtags li label {
    padding: 4px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label {
    border: 2px solid #1bdbf8;
    background-color: #12bbd4;
    color: #fff;
    transition: all .2s;
}

ul.ks-cboxtags li input[type="checkbox"] {
  display: absolute;
}
ul.ks-cboxtags li input[type="checkbox"] {
  position: absolute;
  opacity: 0;
}
ul.ks-cboxtags li input[type="checkbox"]:focus + label {
  border: 2px solid #e9a1ff;
}
</style> 
<style type="text/css">
  body
  {
    
   font-family: "Poppins", sans-serif !important;
   color: black;
 }
 td
 {
  font-size: 1.1vw;
  color: black;
 }

</style>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  <title>Application Preview</title>

</head>
<body>
  

  <div class="container-fluid" > 
    <div class="col-lg-2">
      <table border="1" class="table" >
    <thead>
     <tr >

       <th style="text-align: center;">Customer  Image </th>
       <!-- <th style="text-align: center;"><?php echo $factory_name ?></th> -->
       <tr>
        <td ><div style="text-align: center;"><img width="100" src="../customer_images/<?php echo $customer_image; ?>"></div></td>
      </tr>
    </thead>

    <tr></tr></table>
        <table border="1" class="table" >
    <thead>
     <tr >

       <th style="text-align: center;">Item Image </th>
       <!-- <th style="text-align: center;"><?php echo $factory_name ?></th> -->
       <tr>
        <td ><div style="text-align: center;"><img width="100" src="../item_images/<?php echo $item_image; ?>"></div></td>
      </tr>

    </thead>

    <tr></tr></table>

    </div>
    <div class="col-lg-6"style="border: 3px solid #00549A;padding-left: 0;
    padding-right: 0;padding-bottom: 0vw;">
      <table class="table table-striped table-bordered table-hover" >
<tr><td colspan="2"><h3  style="text-align: center;color: black;"><b><?php echo $order_id." "."-"." ".$shop_name; ?></b></h3></td></tr>
        <tr><td>Reference No</td><td><?php echo $reference_no; ?></td></tr>
   <tr>
          <td> Order Date</td>
          <td> <?php echo $order_date; ?></td>           
        </tr>
        <tr>
          <td> Delivery Date</td>
          
          <td> <?php echo $store_delivery_date; ?></td>           
        </tr>
        <tr>
           <tr>
          <td> Main Delivery Date</td>
          <td> <?php echo $main_delivery_date; ?></td>           
        </tr>
        <tr><td colspan="2"><a href="order_print.php?order_id=<?php echo $order_id;?>"><button class="btn  btn-primary active" style="height: 2.5vw;">Purchase Order</button></a>
          <a href="order_store_print.php?order_id=<?php echo $order_id;?>"><button class="btn  btn-success active" style="height: 2.5vw;">Recieved voucher</button></a>
 <a href="delivery_sheet.php?order_id=<?php echo $order_id;?>"><button class="btn  btn-warning active" style="height: 2.5vw;"> Delivery Sheet</button>
  <a href="bundle_sticker.php?order_id=<?php echo $order_id;?>"><button class="btn  btn-danger" style="height: 2.5vw;">Bundle sticker</button></a>
        </td></tr>
      </table>
      

    </div>
     <div class="col-lg-4" id="status_div" >


     <div class="col-lg-7">

      <form id="table_data"  method="post" enctype="multipart">

  <ul class="ks-cboxtags">
<!--     <li><input  type="checkbox" id="advance_status" name="advance_status" value=" "<?php  //echo 'checked';?>><label for="advance_status">Advance Paid</label></li><br>
 -->    <li><input  type="checkbox" id="production_status" name="production_status" value=" "<?php  if ($production_status=='1') { echo 'checked';}?>><label for="production_status">Order Confirmed</label></li><br>
    <li><input  type="checkbox" id="fabric_status" name="fabric_status" value=" "<?php  if ($fabric_status=='1') { echo 'checked';}?>><label for="fabric_status">Fabric Selected</label></li><br>
    <li><input type="checkbox" id="stitch_status" name="stitch_status" value=" "<?php  if ($stitch_status=='1') { echo 'checked';}?>><label for="stitch_status">Print/Embroidery</label></li><br>
    <li><input type="checkbox" id="pack_status" name="pack_status" value=" "<?php  if ($pack_status=='1') { echo 'checked';}?>><label for="pack_status">Stiching/QC</label></li><br>
    <li><input type="checkbox" id="store_status" name="store_status" value=" "<?php  if ($store_status=='1') { echo 'checked';}?>><label for="store_status">Packing</label></li><br>
    <li><input type="checkbox" id="dispatch_status" name="dispatch_status" vvalue=" "<?php  if ($dispatch_status=='1') { echo 'checked';}?>><label for="dispatch_status">Dispatched</label></li><br>
    <li><input type="checkbox" id="delivery_status" name="delivery_status" value=" "<?php  if ($delivery_status=='1') { echo 'checked';}?>><label for="delivery_status">Delivered</label></li><br>

    <li><input type="checkbox" id="payment_status" name="payment_status" value=" "<?php  if ($payment_status=='1') { echo 'checked';}?>><label for="payment_status">Cash Recieved</label></li>

    
  </ul>  <input type="hidden" name="order_id" value="<?php echo $order_id ;?>">
</div>
<div class="col-lg-5" style="padding-top: 10vw;">
  <h3>status</h3>
<select class="selectpicker form-control" style="width: 10vw;color: black;
" name="status">

    <option value="">Select status</option>
    <option value="Order Confirmed" <?php if($status=='Order Confirmed') { echo 'selected';}?>>Order Confirmed</option>
    <option value="Fabric Selected"<?php if($status=='Fabric Selected') { echo 'selected';}?> >Fabric Selected</option>
        <option value="Print/Embroidery"<?php if($status=='Print/Embroidery') { echo 'selected';}?> >Print/Embroidery</option>

    <option value="Stiching/QC" <?php if($status=='Stiching/QC') { echo 'selected';}?>> Stiching/QC</option>

    <option value="Packing"<?php if($status=='Packing') { echo 'selected';}?>> Packing</option>
    <option value="Dispatched" <?php if($status=='Dispatched') { echo 'selected';}?>>Dispatched</option>
    <option value="Delivered" <?php if($status=='Delivered') { echo 'selected';}?>> Delivered</option>
    <option value="Cash Recieved" <?php if($status=='Cash Recieved') { echo 'selected';}?>> Cash Recieved</option>
  </select>
</div>
   <input type="button" onclick="update_order('<?php echo $order_id;?>')"; value="Update" style="width: 7vw;background-color:#133d47;margin-top: 4vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;">
 </form>

<!-- </div> -->
    </div> 
  </div>
  <div class="container-fluid" > 
    <div class="col-lg-4">
      <h4  ><b>CUSTOMER</b></h4>
      <table border="1" class="table table-striped table-bordered table-hover" >
        <thead >
          <tr >
            <th> Shop Name </th>
            <th><?php echo $shop_name ?></th>
          </tr>
        </thead>
        <tr>
          <td> Customer</td>
          <td> <?php echo $customer_name; ?></td>           
        </tr>
        <tr>
          <td> Customer Address</td>
          <td> <?php echo $customer_address; ?></td>           
        </tr>
        <tr>
          <td> Customer Place</td>
          <td> <?php echo $customer_place; ?></td>           
        </tr>
        <tr>
          <td> District</td>
          <td> <?php echo $customer_district; ?></td>           
        </tr>
        <tr>
          <td>  Mobile 1</td>
          <td> <?php echo $customer_mobile1; ?></td>           
        </tr>
        <tr>
          <td>  Mobile 2</td>
          <td> <?php echo $customer_mobile2; ?></td>           
        </tr>
        <tr>
          <td> Customer Adhar</td>
          <td> <?php echo $customer_adhar; ?></td>           
        </tr>
        <tr>
          <td>  License No</td>
          <td> <?php echo $customer_license; ?></td>           
        </tr>
     </table>
    </div>


    <div class="col-lg-4">
      <h4  ><b>FACTORY</b></h4>
      <table border="1" class="table table-striped table-bordered table-hover" >
        <thead >
          <tr >
            <th > Factory Name </th>
            <th ><?php echo $factory_name ?></th>
          </tr>
        </thead>
        <tr>
          <td> Factory</td>
          <td> <?php echo $vendor_name; ?></td>           
        </tr>
        <tr>
          <td> Factory Address</td>
          <td> <?php echo $vendor_address; ?></td>           
        </tr>
        <tr>
          <td> Factory Place</td>
          <td> <?php echo $vendor_place; ?></td>           
        </tr>
        <tr>
          <td> Factory District</td>
          <td> <?php echo $vendor_district; ?></td>           
        </tr>
        <tr>
          <td> Factory Mobile 1</td>
          <td> <?php echo $vendor_mobile1; ?></td>           
        </tr>
        <tr>
          <td> Factory Mobile2</td>
          <td> <?php echo $vendor_mobile2; ?></td>           
        </tr>
        <tr>
          <td> Customer Adhar</td>
          <td> <?php echo $customer_adhar; ?></td>           
        </tr>
        <tr>
          <td> Customer License</td>
          <td> <?php echo $customer_license; ?></td>           
        </tr>
     </table>
    </div>

    <div class="col-lg-3">
      <h4  ><b>ITEM</b></h4>

      <table border="1" class="table table-striped table-bordered table-hover" >
        <thead >
          <tr>
            <th > Item</th>
            <th ><?php echo $item_name ?></th>
          </tr>
        </thead>
        <tr>
          <td> Art No </td>
          <td> <?php echo $item_no; ?></td>           
        </tr>
        <tr>
          <td> Quantity </td>
          <td> <?php echo $order_quantity; ?></td>           
        </tr>
           <tr>
          <td> Fabric</td>
          <td> <?php echo $fabric; ?></td>           
        </tr>
        <tr>
     
          <td> Category</td>
          <td> <?php echo $category; ?></td>           
        </tr>
        <tr>
          <td> Order Cost</td>
          <td> <?php echo $order_total_cost; ?></td>           
        </tr>

     </table>
    </div>

</div>


<div class="container-fluid">
  <div class="col-lg-3">
    <h4  ><b>ADDONS</b></h4>
    <table  border="1" class="table" >
      <thead >
       <tr>
        <th >SL NO:</th>
         <th >
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
<div class="col-lg-3">
  <h4 ><b>SIZES</b></h4>

  <table border="1" class="table" >
    <thead >
     <tr >
       <th >SL NO:</th>
       <th > Sizes </th>
       <th >Size Quantity</th>

     </tr>
   </thead>
   <?php
   $query2=mysqli_query($conn,"SELECT order_quantity.id, order_quantity.order_id,order_quantity.order_quantity, order_quantity.size_id,sizes.size FROM `order_quantity`
    left join `sizes` on sizes.size_id=order_quantity.size_id  WHERE order_id='$order_id'");
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







    <div class="col-lg-3">
      <h4  ><b>AMOUNT</b></h4>
      <table border="1" class="table table-striped table-bordered table-hover" >
        <thead >
          <tr >
            <th > Order Total Cost</th>
            <th ><?php echo $order_total_cost ?></th>
          </tr>
        </thead>
        <tr>
          <td> Fabric Cost</td>
          <td> <?php echo $order_fabric_cost; ?></td>           
        </tr>
        <tr>
          <td>Addon Cost</td>
          <td> <?php echo $order_addon_cost; ?></td>           
        </tr>
        <tr>
          <td> Item Cost</td>
          <td> <?php echo $order_item_cost; ?></td>           
        </tr>
      
     </table>
    </div>
        <div class="col-lg-3">
      <h4  ><b>FACTORY AMOUNT</b></h4>
      <table border="1" class="table table-striped table-bordered table-hover" >
        <thead >
          <tr >
            <th > Order Total Cost</th>
            <th ><?php echo $order_factory_total_cost ?></th>
          </tr>
        </thead>
        <tr>
          <td> Fabric Cost</td>
          <td> <?php echo $order_factory_fabric_cost; ?></td>           
        </tr>
        <tr>
          <td>Addon Cost</td>
          <td> <?php echo $order_factory_addon_cost; ?></td>           
        </tr>
        <tr>
          <td> Item Cost</td>
          <td> <?php echo $order_factory_item_cost; ?></td>           
        </tr>
      
     </table>
    </div>
       <div style="width: 60%;float: left;">
                <h4 style="margin-left: 4vw;"><b>PHOTOS</b></h4>
                <table border="1"  style="margin-left: 4vw;">

          
                    <tr><td> <label>Image 1</label> </td><td> <label>Image 2</label> </td><td> <label>Image 3</label> </td><td> <label>Image 4</label> </td><td> <label>Image 5</label> </td><td> <label>Image 6</label> </td>  </tr>
                     <tr style="height: 13vw;"><td>
                    <img width="100" src="../order_images/<?php echo $image_1;?>">
                </td><td> <img width="100" src="../order_images/<?php echo $image_2;?>"></td>
                                   

   <td> <img width="100" src="../order_images/<?php echo $image_3;?>"></td><td> <img width="100" src="../order_images/<?php echo $image_4;?>"></td>   <td> <img width="100" src="../order_images/<?php echo $image_5;?>"></td><td> <img width="100" src="../order_images/<?php echo $image_6;?>"></td></tr>
    <tr><td> <label><?php echo $data1 ?></label> </td><td> <label><?php echo $data2 ?></label> </td><td> <label><?php echo $data3 ?></label> </td><td> <label><?php echo $data4 ?></label> </td><td> <label><?php echo $data5 ?></label> </td><td> <label><?php echo $data6 ?></label> </td>  </tr>
   
</table>
</div>
       
  </div>
<!-- <a hrssef="order_view.php?order_id=<?php echo $order_id;?>">Order View</a> -->
   <input type="button" onclick="update_order('<?php echo $order_id;?>')"; value="Update" style="width: 7vw;background-color:#133d47;margin-left: 4vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;">


      </body>
      <script>
function update_status(order_id)
{
  alert(order_id);
  var form = new FormData(document.getElementById('table_data'));
                 $.ajax({
        type: "POST",
        url: "../update/status_update.php",
                     data: form, 
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false,
                      success: function(data)
        {
          alert(data);
                     swal("success","Order Updated","success");
                  
        }    
        });        
}
</script> 

<script>
function update_order(order_id)
{
  // alert("updating");
  var form = new FormData(document.getElementById('table_data'));
                   $.ajax({
                      type: "POST",
                      url: "../update/status_update.php",
                       data: form, 
                      cache: false,
                      contentType: false, 
                      processData: false,

                      success: function(data)
                      {
                                // alert(data);
                                alert("succes");
                      // swal("success","status Updated","success");
                  
                        }    
        });
       
}

</script> 
      </html>
