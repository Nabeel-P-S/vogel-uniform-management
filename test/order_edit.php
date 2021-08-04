<?php
include("connect.php");
$order_id=$_POST['order_id'];

    $query=mysqli_query($conn,"SELECT orders.order_id, orders.order_date, orders.order_quantity, orders.order_customer_id, orders.odrer_confirm_date, orders.order_send_date,orders.order_unit_id,orders.order_category_id, orders.order_set_date,orders.amount,orders.charge1,orders.charge2,orders.discount,orders.total, orders.order_recieve_date, orders.order_dispatch_date, customers.customer_name, customers.customer_address, customers.customer_place, customers.customer_post, customers.customer_district, customers.customer_state, customers.customer_country, customers.customer_email, customers.customer_mobile, customers.customer_phone,units.unit,category.category,orders.advance_status, orders.production_status, orders.fabric_status, orders.stitch_status, orders.pack_status, orders.resend_status, orders.dispatch_status, orders.delivery_status, orders.payment_status FROM orders
INNER JOIN customers on customers.id=orders.order_customer_id
LEFT JOIN units on units.id=orders.order_unit_id
LEFT JOIN category on category.id=orders.order_category_id where orders.id='$order_id'");
    $fetch=mysqli_fetch_array($query);
    $order_id=$fetch['id'];
    $order_date=$fetch['order_date'];
    $order_unit_id=$fetch['order_unit_id'];
    $order_category_id=$fetch['order_category_id'];

    $order_unit=$fetch['unit'];
    $order_category=$fetch['category'];
    $order_quantity=$fetch['order_quantity'];
    $name1=$fetch['customer_name'];
    $address=$fetch['customer_address'];
    $place=$fetch['customer_place'];
    $district=$fetch['customer_district'];
    $state=$fetch['customer_state'];
    $pincode=$fetch['customer_post'];
    $country=$fetch['customer_country'];
    $mobile=$fetch['customer_mobile'];
    $mobile2=$fetch['customer_phone'];
    $email=$fetch['customer_email'];
    $amount=$fetch['amount'];
    $charge1=$fetch['charge1'];
    $charge2=$fetch['charge2'];
    $discount=$fetch['discount'];
    $total=$fetch['total'];
    $date2=$fetch['order_send_date'];
    $advance_status=$fetch['advance_status'];
    $send_status=$fetch['production_status'];
    $fabric_status=$fetch['fabric_status'];
    $stitch_status=$fetch['stitch_status'];
    $pack_status=$fetch['pack_status'];
    $resend_status=$fetch['resend_status'];
    $dispatch_status=$fetch['dispatch_status'];
    $delivery_status=$fetch['delivery_status'];
    $payment_status=$fetch['payment_status'];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <title>Vogel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script >
  function cash_paid()
  {
    // alert("cash");
if (document.getElementById("cash_status").value=='0')
{

  document.getElementById("cash").style.backgroundColor="rgb(36, 196, 7,.8)";

document.getElementById("cash_status").value='1';
}
else
{
  document.getElementById("cash_status").value='0'
  document.getElementById("cash").style.backgroundColor="#008CBA";
  }
}
</script>
   <script>
    function check_bill_no()
   {
   var date_now=Date();
       var bill_no=document.getElementById("bill_no").value;  
          $.ajax(
          {
          type:"POST",
          dataType:"json",
          url:"check_in_bill_no.php",
          data:'date_now='+date_now+"&bill_no="+bill_no,
          success: function(data)
          {
// alert(data);

          var a= data.check_value;
          // alert(a);
          if (a==1) 
          {
            swal("already present","change item code","error");
            document.getElementById("bill_no").value="";
          }

          }   
        });
        }
    function check_item_code()
   {
    // alert("haai");
   var date_now=Date();
       var item_code=document.getElementById("item_code").value;  
          $.ajax(
          {
          type:"POST",
          dataType:"json",
          url:"check_item_code.php",
          data:'date_now='+date_now+"&item_code="+item_code,
          success: function(data)
          {
// alert(data);

          var a= data.check_value;
          // alert(a);
          if (a==1) 
          {
            swal("already present","change item code","error");
            document.getElementById("item_code").value="";
          }

          }   
        });
        }
</script>

<!-- 33333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333 -->
<script>
function update_order() 
{
// alert("updating");
var order_no=document.getElementById("order_no").value;
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
        //data: $("#upload_img").serialize(),
        success: function(data)
        {
           
       // alert(data);
                      swal("success","Order Updated","success");
                      // add_bill();
order_details(order_no);
                      // display_order_list();
                       
                      // clear_bill();

        }    
        });
             
         
}


</script> 
<script type="text/javascript">
  function order_details(order_no)
  {
    var date_now=Date();

          $.ajax(

          {

          type:"POST",

          url:"order_details.php",

 data:{
                  order_no:order_no
              
                    },
          success: function(data_output)

          {

            $("#store_display").html(data_output);

          }  

        });  
  }
</script>
<script>
    function display_box(vendor_id)
    {
// alert(vendor_id);
if (vendor_id=="0")
{
      document.getElementById("supplier").style.display="none";
      document.getElementById("supplier1").style.display="block";


}

    }
    function search(unit)
    {
var unit=document.getElementById("unit1").value;
 var date_now=Date();
          $.ajax(
          {
          type:"POST",
          dataType:"json",
          url:"search.php",
          data:'date_now='+date_now+"&unit="+unit,
          success: function(data)
          {
            // alert('default_selling_price'+last_id);
      document.getElementById('unit').value=data.unitz;     
        }    
        }); 

    }
  </script>
  <script>
     function display_unit_box(unit_value)
    
    {
// alert(vendor_id);
if (unit_value=="0")
{
      document.getElementById("order_unit").style.display="none";
      document.getElementById("order_unit1").style.display="block";


}

    }
       function display_category_box(category_value)
    {
// alert(vendor_id);
if (category_value=="0")
{
      document.getElementById("order_category").style.display="none";
      document.getElementById("order_category1").style.display="block";


}

    }
  </script>
  <script>
function add_row(x,y) {
  
	var last_id=document.getElementById("last_id_txt").value;
	var sum=document.getElementById("total_amount").value;
	last_id=parseInt(last_id)+1;
	document.getElementById('last_id_txt').value=last_id;
	document.getElementById('total_amount').value=sum;

var row_id = x.parentNode.parentNode.rowIndex;
var x=row_id;
var table = document.getElementById(y);
var row = table.insertRow(x);
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
var cell4 = row.insertCell(3);
var cell5 = row.insertCell(4);
var cell6 = row.insertCell(5);
// var cell7 = row.insertCell(6);


  cell1.innerHTML = '<select  name="bill_items" onchange="display_selling_price(this.value,'+last_id+')" class =select_box_css><option style="color: grey" value="" >select item</option><?php  
 $query=mysqli_query($conn,"SELECT id,item_name from store_items");

while($fetch=mysqli_fetch_array($query))
{
  ?>
  <option value="<?php echo $fetch ['id']; ?>"><?php echo $fetch ['item_name'] ?> </option>  <?php
}
?>
  </select>';
//   cell2.innerHTML = '<select  class="select_box_css"" id="unit" name="unit" ><option  value="" >select unit</option><?php  
// $query=mysqli_query($conn,"SELECT id,units from store_units");
// while($fetch=mysqli_fetch_array($query))
// {
// ?>
// <option value="<?php //echo $fetch ['id']; ?>"><?php //echo $fetch ['units'] ?> </option><?php
// }
// ?>
// </select>'; 
 cell3.innerHTML = '<input class="select_box_css" type="text" name="quantity"   onkeypress="return blockSpecialChar(event)">';
cell4.innerHTML = '<input class="select_box_css" type="text" name="cost" onblur="add_total()" onkeypress="return blockSpecialChar(event)">';
  cell2.innerHTML ='<input class="select_box_css" type="text" name="selling_price" id="default_selling_price'+last_id+'" onkeypress="return blockSpecialChar(event)">';
   cell5.innerHTML ='<input type="image" src="store_images/negative.png" style="width: 20px;height: 20px;" onclick="delete_row(this)">'
   
}
</script>

<script>
function  delete_row(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("table_bill").deleteRow(row_id);
    add_total();
}
</script>



<script >
	function display_selling_price(item_id,last_id)
	{

      var date_now=Date();
          $.ajax(
          {
          type:"POST",
          dataType:"json",
          url:"selling_price.php",
          data:'date_now='+date_now+"&item_id="+item_id,
          success: function(data)
          {
          	// alert('default_selling_price'+last_id);
      document.getElementById('default_selling_price'+last_id).value=data.default_selling_price;     
        }    
        }); 

	}
</script>

<script>
	function add_total()
	{
		sum=0;
      // var cost_array=[];
      // var cost_array=[];
      var cost_element=document.getElementsByName('cost');
      var quantity_element=document.getElementsByName('quantity');

for (var i = 0; i <cost_element.length; i++) 
  {
    if (cost_element[i].value=="") 
    {
      var cost=0;
    }
    else if (quantity_element[i].value=="")
     {
      var quantity=0;
    }
    else
    {
      var cost=cost_element[i].value;
      var quantity=quantity_element[i].value;
var total=parseInt(cost)*parseInt(quantity);
// alert(total);
    
var sum=sum+parseInt(total);
}
// cost_array[n]=cost;
	}
  // alert(sum);
  document.getElementById('total_amount').value=sum;
  document.getElementById('last_price').value=sum;

}
</script>
<script>
function  delete_kit(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("table_kit").deleteRow(row_id);
}
</script>
  <script>

$(document).ready(function(){
$("#myInput").on("keyup", function()
{
var value = $(this).val().toLowerCase();
$("#myTable tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});

function save_bill() 
{

   var bill_no=(document.getElementById("bill_no").value); 
   var supplier_value=(document.getElementById("supplier").value);
   var bill_date=(document.getElementById("bill_date").value);
if (supplier_value==0) 
{
  var supplier=(document.getElementById("supplier1").value);
  // alert(supplier);
}

   var total_amount=(document.getElementById("total_amount").value); 
  
   var last_price=(document.getElementById("last_price").value);
   // alert(last_price);
   // if (last_price=="")
   // {
   //  document.getElementById("last_price").value=total_amount;
   //  last_price=total_amount;
   // } 
  var bill_items_array=[];
  var quantity_array=[];
  var cost_array=[];
  var selling_price_array=[];
  var n=0;
  var bill_item_element=document.getElementsByName('bill_items');
  var quantity_element=document.getElementsByName('quantity');
  var cost_element=document.getElementsByName('cost');
  var selling_price_element=document.getElementsByName('selling_price');
  
  for (var i = 0; i <bill_item_element.length; i++) 
  {
  	 var item_id=bill_item_element[i].value;
  	 var quantity=quantity_element[i].value;
  	 var cost=cost_element[i].value;
  	 var selling_price=selling_price_element[i].value;
  	 if (item_id!="")
  	  {
  	  	bill_items_array[n]=item_id;
  	  	quantity_array[n]=quantity;
  	  	cost_array[n]=cost;
  	  	selling_price_array[n]=selling_price;

  	  	n++;
  	  }
  }

  var bill_items_json=JSON.stringify(bill_items_array);
  // var bill_units=JSON.stringify(units_array);
  var bill_quantity_json=JSON.stringify(quantity_array);
  var bill_cost_json=JSON.stringify(cost_array);
  var bill_selling_price_json=JSON.stringify(selling_price_array);
  // alert (bill_items_json);
  // alert(bill_quantity_json);
  // alert(bill_cost_json);
  // alert(bill_selling_price_json);

if( supplier=="")
    {
     swal("ERROR","Enter supplier  name","error");
    }
    
    else{
    var date_now=Date();
          $.ajax(
          {
          type:"POST",
          url:"bill_insert.php",
          data:'date_now='+date_now+"&bill_no="+bill_no+"&bill_date="+bill_date+ "&supplier_value="+supplier_value+ "&supplier="+supplier+  "&bill_items_json="+bill_items_json+  "&bill_quantity_json="+bill_quantity_json+ "&bill_cost_json="+bill_cost_json+ "&bill_selling_price_json="+bill_selling_price_json+ "&total_amount="+total_amount+ "&last_price="+last_price,
          success: function(data_output)
          {
          	
          
            swal("success","Store bill inserted","success");
            add_bill();

        }    
        }); 
    }

}

 

</script>
<script type="text/javascript">
        function blockSpecialChar(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));
        }
    </script>


</head>

 <style>

 .button_save
 {
  background-image: linear-gradient(70deg, #016060, rgb(57, 243, 249));
 	  /*background-image: radial-gradient(circle, red, yellow, green);*/
  /*background-image: linear-gradient(180deg, #015860, #002437);*/
/**/
  margin-top: 1vw;
color: white;
/*background-color:#002737;*/
width:10vw;
font-size:1.3vw;
border-radius: 10px;
text-align: center;
border-color: white;

 }
 /*.input_box
{
 width: 12vw;
color:black;
font-weight: bold;
  height: 1.8vw;
font-size: 1.2vw;
}*/
option
{
  color: black;
}
.select_box_css
{
  padding-left: 2vw;
  /*width:12vw;*/
  color:black;
  height: 2vw;
 font-style: italic;
  /*border-radius: 10px;*/
  font-size: 1vw;
}
.small
{
  background-color: blue;
  width: 8vw;
  height: 4vw;
  color: yellow;
  border: solid;
}

 input
 {
  color: black;
  height: 2vw;
  
 }
 td
 {
  /*text-align: center;*/
  color: white;
  font-weight: bold;
  padding-bottom: 5px;
  /*width: 2vw;*/
  /*background-color: blue;*/
 }
 
       .table tr:hover
        {
        background-color: grey;
        color: white;
        }

        .kit_input
 {

margin-top: .3vw;
  height:2vw;
  width:13vw;
 color: black;
 }
  

 </style>

<STYLE>
.status_buttons
{
  border: none;
  width: 12vw;margin-left: 2vw;font-family: serif;font-size: 1.5vw;
  /*margin-top: 2vw; */
  color: white;
  border-radius: .5vw;
  height: 2vw;
  background-color:#008CBA;
}
.item_td
{
  
 /*margin-bottom: 1vw;*/
  width: 10vw;
  padding: 0.8vw;
/*  color: white;*/
  font-size: 1.2vw;
  
}
.enquiry_td
{
width: 10vw;
  padding: 0.8vw;
/*  color: white;*/
  font-size: 1.2vw;

}
.input_box
{
 width: 10vw;
color:black;
font-weight: bold;
  height: 1.8vw;
font-size: 1vw;
}
.input_bill_options
{
  width: 10vw;
}
</STYLE>
 
<body>
<div class="col-lg-12 col-sm-12 col-md-12" style="padding: 0;background-color: rgb(1, 96, 96,.7);height: 40vw;">
   <form id="table_data"  method="post" enctype="multipart">
  <div id="insert_id_div" class="col-lg-10 col-sm-10 col-md-10" style="*border-right: 3px solid #11303F; overflow: auto; margin-top:  0;">
      
    <div style="background-color: rgb(1, 15, 38,.7);height: 3vw;">
        <h3 style='color:white; text-align: center;padding-top: 5px;'><b>Update Order</b> </h3>
   
    </div>
    <div style="margin-top: 1.5vw;">
        <table border="0" >
      <tr>
      <td class="item_td"  style="margin-top: 2vw;">Order No <br>
   
      <input class ="kit_input" type="text" name="order_no" id="order_no" value="<?php echo $order_no;?>"  onkeypress="return blockSpecialChar(event)"></td>

      <td class="item_td">Order Date
       
      <input class ="kit_input" type="date" name="order_date" value="<?php echo $order_date; ?>"  id="order_date" onkeypress="return blockSpecialChar(event)"></td>

      <td class="item_td">Order Unit 

      
      <select class ="kit_input" id="order_unit"  name="order_unit" >
      <option selected="<?php echo $order_unit;?>" value="" >select unit</option>
      <?php  
      $query=mysqli_query($conn,"SELECT id,unit from units");
      while($fetch=mysqli_fetch_array($query))
      {
       $unit_id= $fetch ['id'];
      ?>
      <option value="<?php echo $unit_id ?>" 
        <?php
         if($unit_id==$order_unit_id)
         {
          echo "selected";
         }
          ?> ><?php echo $fetch ['unit'] ?> </option>
      <?php
      }
      ?>
      
      </select></td>
      <td class="item_td">Order Category
      
      <select class ="kit_input" id="order_category" name="order_category"  >
      <option  value="" >select order_category</option>
      <?php  
      $query=mysqli_query($conn,"SELECT id,category from category");
      while($fetch=mysqli_fetch_array($query))
      {
      ?>
      <option value="<?php echo $fetch ['id']; ?>" 
        <?php 
        if($fetch ['id']==$order_category_id)
        {
          echo "selected";
        }
        ?>
        ><?php echo $fetch ['category'] ?> </option>
      <?php
      }
      ?>
      </select></td>
      <td class="item_td">Order Quantity
      <input class ="kit_input" type="text" name="order_quantity" value="<?php echo $order_quantity;?>" id="order_quantity" onkeypress="return blockSpecialChar(event)"></td>
      </tr>
      <tr>


      <td class="item_td"> Name
      <input class ="kit_input"  type="text" name="name1" value="<?php echo $name1;?>" id="name1" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Address
      <input class ="kit_input"  type="text" name="address"  value="<?php echo $address;?>" id="address" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Place
      <input class ="kit_input"  type="text" name="place" id="place"  value="<?php echo $place;?>" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> District
      <input class ="kit_input"  type="text" name="district" id="district"  value="<?php echo $district;?>" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> State
      <input class ="kit_input"  type="text" name="state"  value="<?php echo $state;?>" id="state" onkeypress="return blockSpecialChar(event)">
      </td>
      </tr>
      <tr>
      <td class="item_td"> Pincode
      <input class ="kit_input"  type="text" name="pincode"  value="<?php echo $pincode;?>" id="pincode" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Country
      <input class ="kit_input"  type="text" name="country"  value="<?php echo $country;?>" id="country" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Mobile
      <input class ="kit_input"  type="text" name="mobile" id="mobile"  value="<?php echo $mobile;?>" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Mobile 2
      <input class ="kit_input"  type="text" name="mobile2"  value="<?php echo $mobile2;?>" id="mobile2" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> E-mail
      <input class ="kit_input"  type="text" name="email" id="email"  value="<?php echo $email;?>" onkeypress="return blockSpecialChar(event)">
      </td>
      </tr>
      <tr>
      <td class="item_td"> Amount
      <input class ="kit_input"  type="text" name="amount"  value="<?php echo $amount;?>" id="amount" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Packing Charge
      <input class ="kit_input"  type="text" name="charge1"  value="<?php echo $charge1;?>" id="charge1" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> delivery Charge
      <input class ="kit_input"  type="text" name="charge2"  value="<?php echo $charge2;?>" id="charge2" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Discount
      <input class ="kit_input"  type="text" name="discount"  value="<?php echo $discount;?>" id="discount" onkeypress="return blockSpecialChar(event)">
      </td>
      <td class="item_td"> Total
      <input class ="kit_input"  type="text" name="total"  value="<?php echo $total;?>" id="total" onkeypress="return blockSpecialChar(event)">
      </td>
      </tr>
<tr>
  <td class="item_td"> To Date
      <input class ="kit_input"  type="date" name="date2"  value="<?php echo $date2;?>" id="date2" onkeypress="return blockSpecialChar(event)">
      </td>
</tr>
    <!-- <td> <input type="button"  onclick="send();" class="status_buttons"  >SEND </td>
      <td><button onclick="graph1();" class="status_buttons"  >RECIEVED</button></td>
      <td><button onclick="graph1();" class="status_buttons"  >DISPATCHED</button></td> -->

    </table>
<!--     <input type="button" id="cash" onclick="cash_paid();" style="margin-left: 55vw;" class="status_buttons" value="PAID"  ><input type="hidden" id="cash_status" value="0">
 -->    <button type="button" class="button_save" style="margin-left: 12vw;" onclick='update_order();'><b>Update</b> 
</button>
    </div>
</div>
<div class="col-lg-2 col-md-2 col-sm-2">
  <br>
  <br>
  <br>
  <span >Advance Paid</span><input type="checkbox" class="radio_button" id="advance_status" name="advance_status" value=" "<?php  if ($advance_status=='1') { echo 'checked';}?> ><br>
  <span >Factory send</span><input type="checkbox" class="radio_button" id="send_status" name="send_status" value=" "<?php  if ($send_status=='1') { echo 'checked';}?> ><br>
  <span >Fabric made </span><input type="checkbox" class="radio_button" id="fabric_status" name="fabric_status" value=" "<?php  if ($fabric_status=='1') { echo 'checked';}?> ><br>
  <span >Stitched </span><input type="checkbox" class="radio_button" id="stitch_status" name="stitch_status" value="0"<?php  if ($stitch_status=='1') { echo 'checked';}?> ><br>
  <span >Packed   </span><input type="checkbox" class="radio_button" id="pack_status" name="pack_status" value="0"<?php  if ($pack_status=='1') { echo 'checked';}?> ><br>
  <span >Manufactured</span><input type="checkbox" class="radio_button" id="resend_status" name="resend_status" value="0"<?php  if ($resend_status=='1') { echo 'checked';}?> ><br>
  <span >Disptached</span><input type="checkbox" class="radio_button" id="dispatch_status" name="dispatch_status" value="0"<?php  if ($dispatch_status=='1') { echo 'checked';}?> ><br>
  <span >Delivered</span><input type="checkbox" class="radio_button" id="delivery_status" name="delivery_status" value="0"<?php  if ($delivery_status=='1') { echo 'checked';}?> ><br>
  <span >Cash Paid</span><input type="checkbox" class="radio_button" id="payment_status" name="payment_status" value="0"<?php  if ($payment_status=='1') { echo 'checked';}?> ><br>
  
</div>
</form>
</div>



<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<style type="text/css">
  .radio_button
  {
  
   width: 2vw;
   /*color: blue;*/
   background-color: green;
   /*background: blue;*/
      /*border: #7f83a2 1px solid;*/
    /*height: 2vw;*/
   
  }
  .main_button1
  {
    font-size: 1.2vw;
    /*font-weight: bold;*/
    width: 10vw;
    height: 2.5vw;
    background-color: white;
    /*color: orange;*/
    /*color: #123141;*/
    color: #123141;
    /*background-color: rgb(255, 149, 0,.8);*/
    /*background-color: rgb(1, 130, 27,.8);*/
    /*background-color: #32a852;*/
   
    /*border: groove;*/
    border-color: #50D039;
    border-radius: 1vw;
  }
  .button_div
  {
   width: 15vw;
    height: 2.5vw; 
    border-color: #50D039;
    border-radius: .5vw;
    /*color: white; */
   background-color: transparent;
   /*padding-top: .5vw;*/
   /*border: solid;*/
   margin-left: -1vw;
  }
  .unit_button
  {
    font-size: 1.2vw;
   color: white; 
   background-color: #123141;
   /*border: none;*/
   border-color: white;
    border-radius: .2vw;
    height: 2vw;
  }
</style>

<script type="text/javascript">
  function update(value)
  {
    alert(value);
  }
</script>

<style type="text/css">
  span
  {
    width: 14vw;
    font-size: 1.5vw;
    color: white;
  }
  .radio
  {
    height: 5vw;
  }
</style>


  





</body> 
