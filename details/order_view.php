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


// include("../view/view_orders.php");


    

  ?>

<html>

<!-- <style type="text/css">
  @media print{@page {size: landscape}}
</style> -->
  
<script type="text/javascript">
  // function view_image()
  // {
  //   document.getElementById("image_preview").src= URL.createObjectURL(event.target.files[0]);
  // }
</script>

<style>
  .container {
    /*max-width: 640px;*/
    /*font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;*/
    /*font-size: 13px;*/
}


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
    padding: 8px 12px;
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
  
  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif} 
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}

  /*background-image: url("images/akshbk.jpg");*/
 }
 /*.form-control{
  background:lightblue;
 }
*/
.col-md-4{
  font-size: 14px;
}

input[type="date"]::-webkit-inner-spin-button
 {
    display: none;
    -webkit-appearance: none;
}

div.field-wrapper input {
    float: right;
}
div.required-field label::after { 
    content: "*";
    color: red;
}

.btn-primary-spacing 
{
margin-right: 5px;
margin-bottom: 5px !important;
}


</style>


<style>
td
{
  width: 2vw;
}
.table_preview
{
background-color:#1D4F5B;
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
  /*font-size: 4vw;*/
  color:white;
}
.inputs
{
 padding-left: 1vw;
  color: yellow;
  font-size: 1.1vw;
  /*font-size: 4vw;*/
}

  </style>  
<head>
  <!-- //////////////////// -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- ================= -->
<script src="../my_functions.js"></script>


  <title>Application Preview</title>

</head>
<body>
  <div class="row"  style="padding-top: 1vw;" >
<!-- " ".$order_id." "."-". -->
<h3  style="margin-top: 0vw;  margin-left: 15vw; color: black;"><b><?php echo "Order Details"." "."of"." ".$shop_name; ?></b>

</h3>
 
<!-- <h3  style="margin-top: 0vw; color: black;margin-left: 44vw;"><b>Status Update</b> -->
</h3>

  
        
  
    <div class="col-lg-9" id="info_div" style="padding-left: 2vw;">
        <table id="table_preview_id" class=table_preview border="1" style="*margin-left: 2vw;" >
        <tr style="padding-top: 1vw;">
        <td ><div ><span class="fields">Order No :</span><span class="inputs"><?php echo $order_id; ?></span></div></td>
        <td><div ><span class="fields">Date :</span><span class="inputs"><?php echo $order_date; ?></span></div></td>
        <td><div ><span class="fields">Delivery Date :</span><span class="inputs"><?php echo $store_delivery_date; ?></span></div></td>
        </tr>

        <tr>
        <td><div ><span class="fields">item_name :</span><span class="inputs"><?php echo $item_name; ?></span></div></td>
        <td><div ><span class="fields">Category :</span><span class="inputs"><?php echo $category; ?></span></div></td>
        <td rowspan="2"><div ><img width="100" src="../item_images/<?php echo $item_image; ?>"></div></td>
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
        <td><div ><span class="fields">Phone 1:</span><span class="inputs"><?php echo $customer_mobile1 ?></span></div></td>
      </tr>

        <tr>
        <td><div ><span class="fields">Phone 2:</span><span class="inputs"><?php echo $customer_mobile2 ?></span></div></td>
        <td><div ><span class="fields">Pincode :</span><span class="inputs"><?php echo $customer_pincode; ?></span></div></td>       
        <td><div ><span class="fields">E-Mail :</span><span class="inputs"><?php echo $customer_email; ?></span></div></td>
        </tr>

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
        <td><div ><span class="fields">phone 1:</span><span class="inputs"><?php echo $vendor_mobile1; ?></span></div></td>  

        <td><div ><span class="fields"> phone 2:</span><span class="inputs"><?php echo $vendor_mobile2; ?></span></div></td>
        <td><div ><span class="fields"> Status:</span><span class="inputs"><?php echo $status; ?></span></div></td>

        </tr>
        </table>

    </div>
      

<!-- ==================================================11111 -->
<!-- =======================================================================status div==================================== -->
    <div class="col-lg-3" id="status_div">

  <!-- ======================================= -->

<!-- <div class="container"  style="background-color: pink;width: 5vw;"> -->
      <form id="table_data"  method="post" enctype="multipart">

  <ul class="ks-cboxtags">
    <li><input type="checkbox" id="advance_status" name="advance_status" value=" "<?php  echo 'checked';?>><label for="advance_status">Advance Paid</label></li><br>
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

<select class="selectpicker form-control" style="width: 10vw;color: black;
" name="status">

    <option value="">Select status</option>
    <option value="Advance Paid" <?php if($status=='Advance Paid') { echo 'selected';}?>>Advance Paid</option>
    <option value="Production Started"<?php if($status=='Production Started') { echo 'selected';}?> >Production Started</option>
    <option value="fabric Selected"<?php if($status=='fabric Selected') { echo 'selected';}?> >fabric Selected</option>
    <option value="Stitch Done" <?php if($status=='Stitch Done') { echo 'selected';}?>> Stitch Done</option>
    <option value="Packed" <?php if($status=='Packed') { echo 'selected';}?>>Packed</option>
    <option value="Store Reached"<?php if($status=='Store Reached') { echo 'selected';}?>> Store Reached</option>
    <option value="Dispatched" <?php if($status=='Dispatched') { echo 'selected';}?>>Dispatched</option>
    <option value="Delivered" <?php if($status=='Delivered') { echo 'selected';}?>> Delivered</option>
    <option value="Full Paid" <?php if($status=='Full Paid') { echo 'selected';}?>> Full Paid</option>
  </select>
 </form>
<!-- </div> -->
    </div> 


<!-- =======================================================================status div=========================== -->






     </div>


</div>
<a href="order_print.php?order_id=<?php echo $order_id;?>">order print</a>

   <input type="button" onclick="order_print();" href value="Print" style="width: 7vw;background-color:#133d47;margin-left: 30vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;">
   <input type="button" onclick="update_order('<?php echo $order_id;?>')"; value="Update" style="width: 7vw;background-color:#133d47;margin-left: 4vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;">
  <!-- <button style="margin-left: 4vw;" class="btn btn-danger" onclick="order_list();">close</button> -->


   <!-- <input type="button" onclick="my_function('2','6')" value="Back" style="width: 7vw;background-color:#133d47; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;"> -->
  
          <!-- <button type="button" class="btn btn-default" style="width: 7vw;background-color:#133d47;margin-left: 3vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;display: inline;" data-dismiss="modal">Edit</button>
        </div> --> 



<!-- ======================================================ORDER PRINT=========================================================================  -->
<!-- 
 -->
<!-- ======================================================ORDER PRINT=========================================================================  -->


<!-- =====================================================MODAL============================================================================ -->



<!-- ======================================================MODAAL================================================================================ -->
</body>

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
<script type="text/javascript">
  function edit_order(order_id)
  {
    // alert(order_id);
       $.ajax(
                    {
                    type:"POST",
                    url:"order_details.php",
                    // dataType:"json",
                   data:{
                    order_id:order_id
                   },

                      success: function(data)
                   
                  {
                    $("#full_div").html(data);                     
                    
                  }    
                  });
  }
</script>

<script>
function update_order(order_id)
{
  // alert("KK");


  var form = new FormData(document.getElementById('table_data'));
  
  // alert(order_id);

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
           
       // alert(data);
                      swal("success","Order Updated","success");
                      // add_bill();
       open_order(order_id);

                      // display_order_list();
                       
                      // clear_bill();

        }    
        });
             
         
}


</script> 


  <script type="text/javascript">
                    function open_order(order_id)
                    {
                      // alert(order_id);
     // document.getElementById('buyer_modal').style.display = "block";
// alert("opening order");
           
            
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
                  $("#total_div").html(data);
                  // $("#display_div").html(data);

                }
              })
                      

                    }

                  </script>




                  <script type="text/javascript">
  function order_list()
  {

   window.location="order_page.php"; 
    
    }
  
</script>

</html>

