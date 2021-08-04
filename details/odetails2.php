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
<script type="text/javascript">
  // function view_image()
  // {
  //   document.getElementById("image_preview").src= URL.createObjectURL(event.target.files[0]);
  // }
</script>
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
	color:white;
}
.inputs
{
 padding-left: 1vw;
	color: yellow;
	font-size: 1.1vw;}

	</style>	
<head>

	<title>Application Preview</title>

</head>
<body>
	
  <div class="row" id="info_div" >

<h3  style="text-align: center;color: black;"><b><?php echo $order_id." "."-"." ".$shop_name; ?></b></h3>
    
<table id="table_preview_id" class=table_preview border="1">
  <tr style="padding-top: 1vw;">
        <td ><div ><span class="fields">Order No :</span><span class="inputs"><?php echo $order_id; ?></span></div></td>
          <td><div ><span class="fields">item_name :</span><span class="inputs"><?php echo $item_name; ?></span></div></td>


  <td><div ><span class="fields">Date :</span><span class="inputs"><?php echo $order_date; ?></span></div></td>
  <td><div ><span class="fields">Delivery Date :</span><span class="inputs"><?php echo $delivery_date; ?></span></div></td>

   </tr>
   <tr>

        <td><div ><span class="fields">Category :</span><span class="inputs"><?php echo $category; ?></span></div></td>
  <td><div ><span class="fields">Quantity :</span><span class="inputs"><?php echo $order_quantity; ?></span></div></td>
  <td><div ><span class="fields">order_cost :</span><span class="inputs"><?php echo $order_cost; ?></span></div></td>
  <td rowspan="2"><div ><img width="100" src="item_images/<?php echo $item_image; ?>"></div></td>

    </tr>
<tr>
  <td><div ><span class="fields">Customer :</span><span class="inputs"><?php echo $customer_name; ?></span></div></td>
  <td><div ><span class="fields">Shop :</span><span class="inputs"><?php echo $shop_name; ?></span></div></td>
  <td><div ><span class="fields">Phone 1:</span><span class="inputs"><?php echo $customer_mobile1 ?></span></div></td></tr>
<tr>

  <td colspan="2" ><div ><span class="fields">Customer Address :</span><span class="inputs"><?php echo $customer_address." ".$customer_place." ".$customer_district ?></span></div></td>
    <td><div ><span class="fields">Adhar :</span><span class="inputs"><?php echo $customer_adhar; ?></span></div></td>
  <td><div ><span class="fields">customer_license :</span><span class="inputs"><?php echo $customer_license; ?></span></div></td>

</tr>
    <tr>
    	
<td><div ><span class="fields">Phone 1:</span><span class="inputs"><?php echo $customer_mobile1 ?></span></div></td>

  	<td><div ><span class="fields">Phone 2:</span><span class="inputs"><?php echo $customer_mobile2 ?></span></div></td>
      <td><div ><span class="fields">Pincode :</span><span class="inputs"><?php echo $customer_pincode; ?></span></div></td>

      

  	
  <td><div ><span class="fields">E-Mail :</span><span class="inputs"><?php echo $customer_email; ?></span></div></td>
  
  </tr>

  <tr>
    	
<td><div ><span class="fields">Factory:</span><span class="inputs"><?php echo $factory_name ?></span></div></td>
  	<td><div ><span class="fields">vendor:</span><span class="inputs"><?php echo $vendor_name ?></span></div></td>
      <td><div ><span class="fields">phone 1:</span><span class="inputs"><?php echo $vendor_mobile1; ?></span></div></td>     	
  <td><div ><span class="fields"> phone 2:</span><span class="inputs"><?php echo $vendor_mobile2; ?></span></div></td>
  
  </tr>
  </table>


</div>

   <input type="button" onclick="print_report();" value="Print" style="width: 7vw;background-color:#133d47;*margin-left: 4vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;float: left;">
 	
          <!-- <button type="button" class="btn btn-default" style="width: 7vw;background-color:#133d47;margin-left: 3vw; color:white  ;font-weight: bold; padding: .3vw;font-size: 1.2vw;border-color: white;display: inline;" data-dismiss="modal">Edit</button>
        </div> --> 

</body>


</html>

