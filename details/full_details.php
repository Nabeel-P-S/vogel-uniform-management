

<?php
include("../connect.php");
$order_id='9';

    $query=mysqli_query($conn,"SELECT orders.order_id, orders.order_date,orders.delivery_date, orders.order_quantity,orders.order_cost, orders.advance_status,orders.production_status,orders.fabric_status,orders.stitch_status,orders.pack_status,orders.store_status,orders.dispatch_status,orders.delivery_status,orders.payment_status, customers.customer_name, customers.customer_address, customers.customer_place, customers.customer_pincode, customers.customer_district, customers.customer_state, customers.customer_country, customers.customer_email, customers.customer_mobile1, customers.customer_mobile2,customers.shop_name,customers.customer_adhar,customers.customer_license,vendors.factory_name,vendors.vendor_name,vendors.vendor_address,vendors.vendor_place,vendors.vendor_district,vendors.vendor_pincode,vendors.vendor_email,vendors.vendor_mobile1, vendors.vendor_mobile2,items.item_name,items.item_image,item_categories.category     FROM orders
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
    $vendor_name=$fetch['vendor_name'];
    $vendor_address=$fetch['vendor_address'];
    $vendor_place=$fetch['vendor_place'];
    $vendor_district=$fetch['vendor_district'];
    $vendor_pincode=$fetch['vendor_pincode'];
    $vendor_email=$fetch['vendor_email'];
    $vendor_mobile1=$fetch['vendor_mobile1'];
    $vendor_mobile2=$fetch['vendor_mobile2'];
    $item_name=$fetch['item_name'];
    $item_image=$fetch['item_image'];
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

  ?>

<!DOCTYPE html>

<html lang="en">
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <title>store management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
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
  
  font-size: 1.4vw;
  color:white;

}
.inputs
{
 padding-left: 1vw;
  color: yellow;
  font-size: 1.4vw;}

  
</style>
  <script>
    function edit_item(item_id)
      {
       var date_now=Date();
        $.ajax(
        {
          type:"POST",
          url:"edit_item.php",
          data:'date_now='+date_now+'&item_id='+item_id,
          success: function(data_output)
            {
            $("#store_display").html(data_output);
            }  
        });  
      }
  function open_bill_list(bill_id)
      {

        if (document.getElementById("bill_td"+bill_id).style.display=="block")
          {
          document.getElementById("bill_td"+bill_id).style.display="none";
          }
        else
          {
          document.getElementById("bill_td"+bill_id).style.display="block"; 
          }
      }


 function edit_item(item_id)

    {

    // alert(admn_stud_data_id)
      var date_now=Date();

      $.ajax(
      {
        type:"POST",
        url:"edit_item.php",
        data:'date_now='+date_now+'&item_id='+item_id,
        success: function(data_output)
        {

        $("#store_display").html(data_output);
        }  
      });  
    }

 

</script>

</head>
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
<form class="navbar-form" role="search" style="display: none;">

<input class="form-control" placeholder="Search" id="myInput" type="text" style="background-color: white; color: #280314; float: right; border-radius: 50px; border-color: #280314;" >
</form>
</div>
  <h2  style="text-align: center; color: white;padding-bottom: .5vw;"><b>
 <?php echo $name1;?></b></h2>
  <div class="col-lg-12 col-md-12 col-sm-12" style="height: 35.85vw; overflow: auto;border-color: blue; ">
    
  <div id="info_div" class="col-lg-10 col-md-10 col-sm-10">
  <table id="table_preview_id" class=table_preview border="1">
  <tr style="padding-top: 1vw;">
        <td ><div ><span class="fields">Order No :</span><span class="inputs"><?php echo $order_id; ?></span></div></td>
  <td><div ><span class="fields">Date :</span><span class="inputs"><?php echo $order_date; ?></span></div></td>
  <td><div ><span class="fields">Delivery Date :</span><span class="inputs"><?php echo $delivery_date; ?></span></div></td>

    </tr>
    <tr>
        <td><div ><span class="fields">Category :</span><span class="inputs"><?php echo $category; ?></span></div></td>
  <td><div ><span class="fields">item_name :</span><span class="inputs"><?php echo $item_name; ?></span></div></td>
  <td><div ><span class="fields">Quantity :</span><span class="inputs"><?php echo $order_quantity; ?></span></div></td>

    </tr>
<tr>
  <td><div ><span class="fields">Name :</span><span class="inputs"><?php echo $customer_name; ?></span></div></td>

  <td ><div ><span class="fields">Address :</span><span class="inputs"><?php echo $customer_address." ".$customer_place." ".$customer_district ?></span></div></td>
    <td><div ><span class="fields">State :</span><span class="inputs"><?php echo $customer_state; ?></span></div></td>


  </tr>
  <tr>
      <td><div ><span class="fields">Pincode :</span><span class="inputs"><?php echo $customer_pincode; ?></span></div></td>

      <td><div ><span class="fields">Phone :</span><span class="inputs"><?php echo $customer_mobile1." ".",".$customer_mobile2; ?></span></div></td>
  <td><div ><span class="fields">E-Mail :</span><span class="inputs"><?php echo $customer_email; ?></span></div></td>

  </tr>
  <tr>
  
  </table>
  <div style="height: 1vw; padding-top: 1vw;"> 
   <input type="button"class =button_css onclick="display_order_list();" value="Back"style="width: 7vw;background-color:#133d47;margin-left: 25vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;float: left;">

           <input type="button" class =button_css  onclick="edit_order('<?php echo $order_id;?>');" value="Edit" style="width: 7vw;background-color:#133d47;margin-left: 4vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;float: left;">

       <input type="button"class =button_css  onclick="print_report();" value="Print" style="width: 7vw;background-color:#133d47;margin-left: 4vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;float: left;">


          
        </div>
  </div>
  <div id="status_div" class="col-lg-2 col-md-2 col-sm-2">
   

    <input type="button" style="<?php if($advance_status==1){echo "background-color:#008CBA;color: white;";}?>" value="Advance Paid" class="main_button"><br><br> 
    <input type="button" style="<?php if($production_status==1){echo "background-color:#008CBA;color: white;";}?>" value="Factory send" class="main_button"><br><br>
    <input type="button" style="<?php if($fabric_status==1){echo "background-color:#008CBA;color: white;";}?>" value="Fabric made"  class="main_button"><br><br> 
    <input type="button" style="<?php if($stitch_status==1){echo "background-color:#008CBA;color: white;";}?>"  value="Stitched" class="main_button"><br><br> 
    <input type="button" style="<?php if($pack_status==1){echo "background-color:#008CBA;color: white;";}?>"  value="Packed" class="main_button"><br><br> 
    <input type="button" style="<?php if($resend_status==1){echo "background-color:#008CBA;color: white;";}?>"  value="Manufactured" class="main_button"><br><br> 
   <input type="button" style="<?php if($dispatch_status==1){echo "background-color:#008CBA;color: white;";}?>"  value="Disptached" class="main_button"><br><br>
   <input type="button"  style="<?php if($delivery_status==1){echo "background-color:#008CBA;color: white;";}?>"  value="Delivered" class="main_button"><br><br>
   <input type="button" style="<?php if($payment_status==1){echo "background-color:#008CBA;color: white;";}?>"  value="cash Paid" class="main_button"><br><br>
  </div>



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
<script type="text/javascript">
  function edit_order(order_no)
  {
    
          $.ajax(
          {

          type:"POST",
          url:"edit_order.php",
          data:'order_no='+order_no,
          success: function(data_output)
          {
            $("#store_display").html(data_output);
          }   
        });  
  }
</script>
<script>
  function print_report()
  {
    var printContents = document.getElementById("info_div").innerHTML;
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
</style>