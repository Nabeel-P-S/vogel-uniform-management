<?php
include("connect.php");
$order_id=$_POST['order_id'];

    $query=mysqli_query($conn,"SELECT orders.order_id, orders.order_date,orders.delivery_date, orders.order_quantity,orders.order_cost, orders.advance_status,orders.production_status,orders.fabric_status,orders.stitch_status,orders.pack_status,orders.store_status,orders.dispatch_status,orders.delivery_status,orders.payment_status, customers.customer_name, customers.customer_address, customers.customer_place, customers.customer_pincode, customers.customer_district, customers.customer_state, customers.customer_country, customers.customer_email, customers.customer_mobile1, customers.customer_mobile2,customers.shop_name,customers.customer_adhar,customers.customer_license,vendors.factory_name,vendors.vendor_name,vendors.vendor_id, vendors.vendor_address,vendors.vendor_place,vendors.vendor_district,vendors.vendor_pincode,vendors.vendor_email,vendors.vendor_mobile1, vendors.vendor_mobile2,items.item_name,items.item_image,item_categories.category,orders.status     FROM orders
INNER JOIN customers on customers.customer_id=orders.customer_id
INNER JOIN vendors on vendors.vendor_id=orders.factory_id
INNER JOIN items on items.item_id=orders.item_id

LEFT JOIN item_categories on item_categories.category_id=items.item_category_id 

where orders.order_id='$order_id'");

    $fetch=mysqli_fetch_array($query);
    $order_id=$fetch['order_id'];
    $order_date=$fetch['order_date'];
    $delivery_date=$fetch['delivery_date'];
    $order_cost=$fetch['order_cost'];
    $order_category=$fetch['category'];
    $order_quantity=$fetch['order_quantity'];
    $customer_name=$fetch['customer_name'];
    $customer_address=$fetch['customer_address'];
    $customer_place=$fetch['customer_place'];
    $customer_district=$fetch['customer_district'];
    $customer_state=$fetch['customer_state'];
    $customer_pincode=$fetch['customer_pincode'];
    $customer_country=$fetch['customer_country'];
    $customer_mobile1=$fetch['customer_mobile1'];
    $customer_mobile2=$fetch['customer_mobile2'];
    $customer_email=$fetch['customer_email'];
    $shop_name=$fetch['shop_name'];
    $customer_adhar=$fetch['customer_adhar'];
    $customer_license=$fetch['customer_license'];
    $factory_name=$fetch['factory_name'];
    $vendor_name=$fetch['vendor_name'];
    $vendor_id=$fetch['vendor_id'];
    $vendor_address=$fetch['vendor_address'];
    $vendor_place=$fetch['vendor_place'];
    $vendor_district=$fetch['vendor_district'];
    $vendor_pincode=$fetch['vendor_pincode'];
    $vendor_email=$fetch['vendor_email'];
    $vendor_mobile1=$fetch['vendor_mobile1'];
    $vendor_mobile2=$fetch['vendor_mobile2'];
    $item_name=$fetch['item_name'];
    $item_image=$fetch['item_image'];
    echo "item_image";
    $category=$fetch['category'];
        $advance_status=$fetch['advance_status'];
        $production_status=$fetch['production_status'];
        $fabric_status=$fetch['fabric_status'];
        $stitch_status=$fetch['stitch_status'];
        $pack_status=$fetch['pack_status'];
        $store_status=$fetch['store_status'];
        $dispatch_status=$fetch['dispatch_status'];
        $delivery_status=$fetch['delivery_status'];
        $payment_status=$fetch['payment_status'];
        $status=$fetch['status'];

  ?>

<!DOCTYPE html>

<html lang="en">
<head><!-- <style type="text/css">

    #printable { display: none; }

    @media print
    {
       p.bodyText {font-family:georgia, times, serif;}
        #non-printable { display: none; }
        #printable { display: block; }
    }
    </style> -->
  </head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <title>store management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">@media print{@page {size: landscape}}</style>
  


<style type="text/css">
.table_preview
{
background-color:#016060;
width: 100%;
margin-top: 0vw;
padding-top:1vw;

}

/*span
{
  padding-left: 1vw;
  color: yellow;
  font-size: 2vw;
  /*text-align: center;
}*/

#table_preview_id td
{
  padding-bottom: 2vw;
  padding-left: 1vw;
  column-span: 2vw;


}
  .fields
{
  
  font-size: 1.1vw;
  color:white;

}
.inputs
{
 padding-left: 1vw;
  color: yellow;
  font-size: 1.2vw;}

  
</style>


<!-- 
<style type = "text/css">

      @media screen {
         p.bodyText {font-family:verdana, arial, sans-serif;}
      }

      @media print {
         p.bodyText {font-family:georgia, times, serif;}
      }
      @media screen, print {
         p.bodyText {font-size:30pt}
      }
  
</style> -->

<!-- <style>
.main_button1
{
  width:7vw;height:2vw; font-size:1.3vw; *margin-top: 1vw; background-color: #f4511e; border-radius: 5px; color: white;font-family:Courier New;background-color:#008CBA; margin-top: 0vw; font-weight: bold; margin-top: 1vw;
}
table#kit_table{

    width:60%;

}

table#item_table, table#item_table th,table#item_table td {

    border: 1px solid #3e7cab;

    border-collapse: collapse;

}

table#item_table th,table#item_table td {

    padding: 5px;
color: black;
    text-align: left;

}

table#item_table tr:nth-child(even) {

    background-color: #eee;

}

table#item_table tr:nth-child(odd) {

   background-color:#fff;

}

table#item_table th {

    background-color: #3e7cab;

    color: white;

}

</style> -->
 <!-- <style>
.select_box_css
{
  padding-left: 2vw;
  width:10vw;
  color:black;
height: 2vw;
 font-style: italic;
  border-radius: 10px;
  font-size: 1vw;
}
 
       .table tr:hover
        {
        background-color: grey;
        color: blue;
        font-weight: bold;
        }
  td

 {
 text-align: center;
 /*width: 15vw;*/
 }
.radio_options
{
  color: black;
padding: 5px;
  font-size: 1.2vw;

  }
 </style> -->

<!-- <STYLE>
.enquiry_td
{
  padding: 0.8vw;
  color: white;
  font-size: 1.5vw;

}
.input_box
{
 width: 12vw;
color:black;
font-weight: bold;
  height: 1.8vw;
font-size: 1.2vw;
}

</STYLE> -->
<!--  <style type="text/css">
   body
   {
    color: black;
   }
 </style> -->
<body>


<div  style="background-color: #016060; color: black;width: 100%;">
<div class="col-md-3" style="float: right;">

   <form>
<input class="form-control" placeholder="Search" id="myInput" type="text" style="background-color: white; color: #280314; float: right; border-radius: 50px; border-color: #280314;" >
</form>
</div>
  <h2  style="text-align: center; color: white;padding-bottom: .5vw;"><b>
 <?php echo $customer_name;?></b>
<input type="button" class="btn btn-danger" value="close" onclick= "open_order('<?php echo $order_id;?>');">
</h2>
  <div class="col-lg-12 col-md-12 col-sm-12" style="*height: 35.85vw; overflow: auto;border-color: blue; ">
    
 <div id="non-printable">
        Your normal page contents
    </div>

  <div id="printable" class="col-lg-10 col-md-10 col-sm-10">
  <table id="table_preview_id" class=table_preview border="1">
  <tr style="padding-top: 1vw;">
        <td ><div ><span class="fields">Order No :</span><span class="inputs"><?php echo $order_id; ?></span></div></td>
 

  <td><div ><span class="fields">Date :</span><span class="inputs"><?php echo $order_date; ?></span></div></td>
  <td><div ><span class="fields">Delivery Date :</span><span class="inputs"><?php echo $delivery_date; ?></span></div></td>

   </tr>
   <tr>
          <td><div ><span class="fields">item_name :</span><span class="inputs"><?php echo $item_name; ?></span></div></td>
       <td><div ><span class="fields">Category :</span><span class="inputs"><?php echo $category; ?></span></div></td>

       
  <td rowspan="2"><div ><img width="100" src="item_images/<?php echo $item_image; ?>"></div></td>

    </tr>
    <tr>
  <td><div ><span class="fields">Quantity :</span><span class="inputs"><?php echo $order_quantity; ?></span></div></td>
  <td><div ><span class="fields">order_cost :</span><span class="inputs"><?php echo $order_cost; ?></span></div></td>
    </tr>
<tr>
  <td><div ><span class="fields">Customer :</span><span class="inputs"><?php echo $customer_name; ?></span></div></td>
  <td><div ><span class="fields">Shop :</span><span class="inputs"><?php echo $shop_name; ?></span></div></td>
  <td><div ><span class="fields">Phone 1:</span><span class="inputs"><?php echo $customer_mobile1 ?></span></div></td></tr>
<tr>

  <td colspan="1" ><div ><span class="fields"> Address :</span><span class="inputs"><?php echo $customer_address ?></span></div></td>
    <td><div ><span class="fields">Place :</span><span class="inputs"><?php echo $customer_place; ?></span></div></td>
      <td><div ><span class="fields">District :</span><span class="inputs"><?php echo $customer_district; ?></span></div></td>

</tr>
    <tr>
          <td><div ><span class="fields">Adhar :</span><span class="inputs"><?php echo $customer_adhar; ?></span></div></td>

        <td><div ><span class="fields">License :</span><span class="inputs"><?php echo $customer_license; ?></span></div></td>

<td><div ><span class="fields">Phone 1:</span><span class="inputs"><?php echo $customer_mobile1 ?></span></div></td></tr>
<tr>

    <td><div ><span class="fields">Phone 2:</span><span class="inputs"><?php echo $customer_mobile2 ?></span></div></td>
     <td><div ><span class="fields">Pincode :</span><span class="inputs"><?php echo $customer_pincode; ?></span></div></td>       
  <td><div ><span class="fields">E-Mail :</span><span class="inputs"><?php echo $customer_email; ?></span></div></td></tr>
      
  
 

  <tr>
      
<td><div ><span class="fields">Factory:</span><span class="inputs"><?php echo $factory_name ?></span></div></td>
    <td><div ><span class="fields">vendor:</span><span class="inputs"><?php echo $vendor_id ?></span></div></td>
    <td><div ><span class="fields">vendor:</span><span class="inputs"><?php echo $vendor_name ?></span></div></td>
  </tr>
  <tr>
    <td><div ><span class="fields">vendor:</span><span class="inputs"><?php echo $vendor_address ?></span></div></td>
    <td><div ><span class="fields">Place:</span><span class="inputs"><?php echo $vendor_place ?></span></div></td>
    <td><div ><span class="fields">District:</span><span class="inputs"><?php echo $vendor_district ?></span></div></td>
  </tr>
  <tr>
      <td><div ><span class="fields">phone 1:</span><span  class="inputs"><?php echo $vendor_mobile1; ?></span></div></td>  
  
       <td><div ><span class="fields"> phone 2:</span><span class="inputs"><?php echo $vendor_mobile2; ?></span></div></td>
       <td><div ><span class="fields"> STATUS:</span><span class="inputs"><?php echo $status; ?></span></div></td>

  </tr>
  </table></div>

  <div style="height: 1vw; padding-top: 1vw;"> 
   <input type="button"class =button_css onclick="display_order_list();" value="Back"style="width: 7vw;background-color:#133d47;margin-left: 25vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;float: left;">

           <!-- <input type="button" class =button_css  onclick="edit_order('<?php //echo $order_no;?>');" value="Edit" style="width: 7vw;background-color:#133d47;margin-left: 4vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;float: left;"> -->

       <button type="button" class="button_save" style="margin-left: 12vw;" onclick="update_order1();"><b>Update</b> 
</button>

          
        </div>
  </div>
 <div class="col-lg-2 col-md-2 col-sm-2">
  <!-- ======================================= -->

<div class="container">
      <form id="table_data"  method="post" enctype="multipart">

  <ul class="ks-cboxtags">
    <li><input type="checkbox" id="advance_status" name="advance_status" value=" "<?php  if ($advance_status=='1') { echo 'checked';}?>><label for="advance_status">Advance Paid</label></li><br>
    <li><input type="checkbox" id="production_status" name="production_status" value=" "<?php  if ($production_status=='1') { echo 'checked';}?>><label for="production_status">Production Started</label></li><br>
    <li><input type="checkbox" id="fabric_status" name="fabric_status" value=" "<?php  if ($fabric_status=='1') { echo 'checked';}?>><label for="fabric_status">Fabric Selected</label></li><br>
    <li><input type="checkbox" id="stitch_status" name="stitch_status" value=" "<?php  if ($stitch_status=='1') { echo 'checked';}?>><label for="stitch_status">Stitch Done</label></li><br>
    <li><input type="checkbox" id="pack_status" name="pack_status" value=" "<?php  if ($pack_status=='1') { echo 'checked';}?>><label for="pack_status">Packed</label></li><br>
    <li><input type="checkbox" id="store_status" name="store_status" value=" "<?php  if ($store_status=='1') { echo 'checked';}?>><label for="store_status">Store Reached</label></li><br>
    <li><input type="checkbox" id="dispatch_status" name="dispatch_status" vvalue=" "<?php  if ($dispatch_status=='1') { echo 'checked';}?>><label for="dispatch_status">Dispatched</label></li><br>
    <li><input type="checkbox" id="delivery_status" name="delivery_status" value=" "<?php  if ($delivery_status=='1') { echo 'checked';}?>><label for="delivery_status">DDelivered</label></li><br>

    <li><input type="checkbox" id="payment_status" name="payment_status" value=" "<?php  if ($payment_status=='1') { echo 'checked';}?>><label for="payment_status">Full Paid</label></li>

    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
   
  </ul>

<select class="selectpicker form-control" style="width: 3vw;" name="status">

    <option value="">Select status</option>
    <option value="Advance Paid">Advance Paid</option>
    <option value="Production Started">Production Started</option>
    <option value="fabric Selected">fabric Selected</option>
    <option value="Stitch Done">Stitch Done</option>
    <option value="Packed">Packed</option>
    <option value="Store Reached">Store Reached</option>
    <option value="Dispatched">Dispatched</option>
    <option value="Delivered">Delivered</option>
    <option value="Full Paid">Full Paid</option>
  </select>
 </form></div>
</div>

  <!-- ======================================== -->

 
  



  </div>
<!--   <div class="col-lg-2"  style="height: 35.85vw;padding: 0vw;  ">
<input type="button" id="cash_button" value="cash" class="main_button1" onclick="buyer_bills('cash')">
<input type="button" id="credit_button" value="credit" class="main_button1" onclick="buyer_bills('credit')">
<input type="button" id="all_button" value="All" class="main_button1" onclick="buyer_bills('all')">
  </div> -->
  </div>

  </div>
   </div>

</body>

<script>
  function print_report()
  {
    var printContents = document.getElementById("printable").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    
  }

</script>

    

<style type="text/css">
  .main_button
{
  width:14vw;height:2.2vw; font-size:1.5vw; *margin-top: 1vw; *background-color: #f4511e; border-radius: 5px; color: #008CBA;;font-family:Courier New;background-color:white; margin-top: .05vw;font-weight: bold;
}
  .radio_button
  {
  
   width: 2vw;
   /*color: blue;*/
   background-color: green;
   /*background: blue;*/
      /*border: #7f83a2 1px solid;*/
    /*height: 2vw;*/
   
  }
</style>
<script>
function update_order1()
{
  alert("KK");

// var order_id=document.getElementById("order_id").value;
  var form = new FormData(document.getElementById('table_data'));
  
  

              // alert(order_no+order_date+order_unit+order_category+order_quantity+name1+address+place+district+state+pincode+country+mobile+mobile2+email+amount+charge1+charge2+discount+total+date2);
            
                 $.ajax({
        type: "POST",
        url: "order_update.php",
        // dataType:"json",
    
                     data: form, 
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false,

                      success: function(data)
        {
           
       alert(data);
                      // swal("success","Order Updated","success");
                      // add_bill();
// order_details(order_id);
                      // display_order_list();
                       
                      // clear_bill();

        }    
        });
             
         
}


</script> 
