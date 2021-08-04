<?php include "../connect.php";
$order_id=$_POST['order_id'];
include "../details/order_complete.php";
include "../details/order_images.php";
  // date_default_timezone_set('Asia/Kolkata');
// $date = date("Y-m-d H:i:s");                
?>


<!DOCTYPE html>
<html>
<head>
  <title></title> <style type="text/css">
    input{
      text-transform: uppercase;
    }
  </style>
</head>

<body>
<!--    <h1><b style="font-size:25px;color:#2196f3">Create Order</b></h1>
 -->  <form id="image_form" enctype="multipart/form-data">

    


    <table  border="0" class="table table-striped">
      <tbody>
       <tr>
        <td style="width: 20vw;padding-top: 0vw;" >


         <!-- ==================================ITEM BOX =============================================                  -->
<h3 style="margin-top: 0.5vw;"><b style=" color:#2196f3">Order No : <?php echo $order_id;?></b></h3>
<input type="hidden" id="order_id" value="<?php echo $order_id;?>">

         <div class="well form-horizontal">
          <fieldset>
      <label  class="col-md-12" for="factory_number">Select Agent</label>  
      <div class="form-group">
              <div class="col-md-12">

          <select class="selectpicker form-control" id="customer_id" onchange="*display_customer(this.value)" name="customer_id">
            <option style="color: grey" value="" >select Agent</option>
           <?php  
           $query=mysqli_query($conn,"SELECT * from customers");
           while($fetch=mysqli_fetch_array($query))
           {
            ?>
            <option <?php if($fetch ['customer_id']==$customer_id) { echo 'selected';}?> value="<?php echo $fetch ['customer_id']; ?>"><?php echo $fetch ['customer_id']." ".$fetch ['shop_name'];?> </option>
            <?php
          }
          ?> 


        </select>
      </div>

  </div>


</fieldset>
          <fieldset>


            <label class="col-md-12 " for="factory_number">Select Article No</label>  
            <div class="form-group">
              <div class="col-md-12">
                <select id="item_id"  name="item_id" onchange="display_total();display_factory_item_cost();" class="form-control">
                  <option style="color: grey" value="" >select Item</option>
                  <?php  
                  $query=mysqli_query($conn,"SELECT * from items");
                  while($fetch=mysqli_fetch_array($query))
                  {
                    ?>
                    <option <?php if($fetch ['item_id']==$item_id) { echo 'selected';}?> value="<?php echo $fetch ['item_id']; ?>"><?php echo $fetch ['item_no'];?> </option>
                    <?php
                  }
                  ?> 
                </select>      
              </div>
            </div>

</fieldset>

 <fieldset>


            <label class="col-md-12 " for="factory_number">Select Fabric</label>  
            <div class="form-group">
              <div class="col-md-12">
                <select id="fabric_id"  name="fabric_id" onchange="*display_item(this.value)" class="form-control">
                  <option style="color: grey" value="" >select Fabric</option>
                  <?php  
                  $query=mysqli_query($conn,"SELECT * from fabrics");
                  while($fetch=mysqli_fetch_array($query))
                  {
                    ?>
                    <option <?php if($fetch ['fabric_id']==$fabric_id) { echo 'selected';}?> value="<?php echo $fetch ['fabric_id']; ?>"><?php echo $fetch ['fabric']?> </option>
                    <?php
                  }
                  ?> 
                </select>      
              </div>
            </div>
             </fieldset>
            <label  class="col-md-12" for="factory_number">Select Colour</label>  
 
         <div class="input-group">

          <select class="selectpicker form-control" id="color_id"  name="color_id">
            <option style="color: grey" value="" >select Color</option>
           <?php  
           $query=mysqli_query($conn,"SELECT color_id,color from colors");
           while($fetch=mysqli_fetch_array($query))
           {
            ?>
            <option <?php if($fetch ['color_id']==$color_id) { echo 'selected';}?> value="<?php echo $fetch ['color_id']; ?>"><?php echo $fetch ['color']?> </option>
            <?php
          }
          ?> 


        </select>
      </div>

  <br>
 <div class="form-group">



    <label class="col-md-12" for="factory_number">Select Factory</label>  
            <div class="input-group">
              <div class="col-md-12">
        <select class="selectpicker form-control" id="vendor_id" onchange="display_factory_item_cost();"  name="vendor_id">
<option style="color: grey" value="" >select Factory</option>
         <?php  
         $query=mysqli_query($conn,"SELECT vendor_id,factory_name from vendors");
         while($fetch=mysqli_fetch_array($query))
         {
          ?>
          <option <?php if($fetch ['vendor_id']==$vendor_id) { echo 'selected';}?> value="<?php echo $fetch ['vendor_id']; ?>"><?php echo $fetch ['factory_name']." ".$fetch ['vendor_id'];?> </option>
          <?php
        }
        ?> 

      </select>
    </div>
  </div>


</div>
<!-- div---below-------------------------------------------------------------------------- --> 
<label class="col-md-12 " for="factory_number">Select Addons</label>  
<table id="addon_table1">
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
    <td>
        <select id="addon_id" class="form-control input-md" name="addon_id" >
          <option style="color: grey" value="" >select addon
          </option>
          <?php  
            $query=mysqli_query($conn,"SELECT * from addons");
            while($fetch=mysqli_fetch_array($query))
            {
              ?>
              <option  <?php if($fetch ['addon_id']==$fetch1['addon_id']) { echo 'selected';}?> value="<?php echo $fetch ['addon_id']; ?>"><?php echo  $fetch ['addon']?> </option><?php
            }
            ?>    </select>          


      </td>
 <td> <button id="add" name="add" class="btn btn-warning" onclick="delete_addon(this)">-</button></td>
  </tr>
  <?php
  }
?>  
</table>    <button type="button" style="float: right; height: 1.6VW;font-size: 1VW;padding-top: 0vw;"  id="add" name="add" class="btn btn-success" onclick="add_addon(this,'addon_table1')">+ ADD</button></div>


                          <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id; ?>">
                        </form>

    <input type="hidden" id="addon_row_count" value="1">
    <input  type="hidden" id="addon_cost_sum" value="0">
    <input  type="hidden"  id="factory_addon_cost_sum" value="0">




</div>

</td>
<td colspan="3" style="padding-top: 0vw;">


 
 <div class="well form-horizontal" style="padding-top: 0.3vw;">

<div class="form-group field-wrapper ">

            <div class="col-md-3" >   <label class="col-md-12 " for="factory_number">Ref.No</label>  
            <div class="form-group">
              <div class="col-md-12">
 <input id="reference_no" value="<?php echo $reference_no;?>"  name="reference_no" type="text" placeholder="Reference No" class="form-control input-md">              </div>
            </div></div>

 <div class="col-md-3"> 
 <label class="col-md-12 ">Order Date</label>
                        <div class="col-md-12">
     <input type="datetime" id="order_date" name="order_date"  placeholder="Dob" class="form-control" readonly="1" value="<?php echo $order_date;?>" >
              </div>
           </div>
  
  <div class="col-md-3"> 
 <label class="col-md-12" >Store Delivery</label>
                        <div class="col-md-12">
    <input type="date" id="store_delivery_date" name="store_delivery_date" placeholder="Dob" class="form-control" required="true" value="<?php echo $store_delivery_date;?>" >
              </div>
           </div>

          <div class="col-md-3"> 
 <label class="col-md-12">Agent Delivery</label>
                        <div class="col-md-12">
    <input type="date" id="main_delivery_date" name="main_delivery_date" placeholder="Dob" class="form-control" required="true" value="<?php echo $main_delivery_date;?>" >
              </div>
           </div>
 
</div>

<?php
   $query2=mysqli_query($conn,"SELECT order_quantity.id, order_quantity.order_id,order_quantity.order_quantity, order_quantity.size_id,sizes.size FROM `order_quantity`
    left join `sizes` on sizes.size_id=order_quantity.size_id  WHERE order_id='$order_id'");
   $sleno=1;
   while ($fetch2=mysqli_fetch_array($query2))
   {
    $id=$fetch2['id'];


    $size=$fetch2['size'];
    $size_quantity=$fetch2['order_quantity'];
   if($size=="XS"){$quantity1=$size_quantity; }           
   if($size=="S"){$quantity2=$size_quantity; }           
   if($size=="M"){$quantity3=$size_quantity; }           
   if($size=="L"){$quantity4=$size_quantity; }           
   if($size=="XL"){$quantity5=$size_quantity; }           
   if($size=="XXL"){$quantity6=$size_quantity; }           
   if($size=="XXXL"){$quantity7=$size_quantity; }           
   if($size=="OTHER"){$quantity8=$size_quantity; }           

    $sleno++;
  }
  ?>
<div class="form-group field-wrapper ">
  <div class="col-md-10"> <div class="form-group">
    <label class="col-md-12 ">Quantity</label>
    <div class="col-md-12 inputGroupContainer">
     <div class="input-group">
      <input id="quantity1" style="width: 5vw;" name="quantity1" type="text" value="<?php echo $quantity1;?>" placeholder="XS" onchange="display_total();display_factory_item_cost();"  class="form-control input-md">
      <input id="quantity2" style="width: 5vw;" name="quantity2" type="text" placeholder="S" value="<?php echo $quantity2;?>" onchange="display_total();display_factory_item_cost();" class="form-control input-md">
      <input id="quantity3" style="width: 5vw;" name="quantity3" type="text" placeholder="M" value="<?php echo $quantity3;?>" onchange="display_total();display_factory_item_cost();" class="form-control input-md">
      <input id="quantity4" style="width: 5vw;" name="quantity4" type="text" placeholder="l" value="<?php echo $quantity4;?>" onchange="display_total();display_factory_item_cost();" class="form-control input-md">
     <input id="quantity5" style="width: 5vw;" name="quantity5" type="text" placeholder="XL" value="<?php echo $quantity5;?>" onchange="display_total();display_factory_item_cost();" class="form-control input-md">
      <input id="quantity6" style="width: 5vw;" name="quantity6" type="text" placeholder="XXL" value="<?php echo $quantity6;?>" onchange="display_total();display_factory_item_cost();" class="form-control input-md">
      <input id="quantity7" style="width: 5vw;" name="quantity7" type="text" placeholder="XXXL" value="<?php echo $quantity7;?>" onchange="display_total();display_factory_item_cost();" class="form-control input-md">
      <input id="quantity8" style="width: 5vw;" name="quantity8" type="text" placeholder="OTHER" value="<?php echo $quantity8;?>" onchange="display_total();display_factory_item_cost();"  class="form-control input-md">
    </div>
  </div>
</div></div>
  <div class="col-md-2"><div class="form-group field-wrapper">
  <label class="col-md-12">Total </label>
  <div class="col-md-12 ">
   <input type="text" id="total_qty" name="total" value="<?php echo $order_quantity;?>"  class="form-control"  type="txt"></div>
   <input type="hidden" id="quantity_id" ></div>


</div></div>




<div class="form-group field-wrapper ">
  <div class="col-md-3">   <label class="col-md-12 " >Item Cost</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="item_cost" readonly="1" name="item_cost" value="<?php echo $order_item_cost;?>"  class="form-control"  >
              </div>
            </div></div>
  <div class="col-md-3"> 
    <label class="col-md-12 " >Addon Cost</label>  

                        <div class="col-md-12">
               <input type="text" id="addon_cost" readonly="1"  name="addon_cost" value="<?php echo $order_fabric_cost;?>" class="form-control" >
              </div>
           </div>

  <div class="col-md-3"> 
    <label class="col-md-12 " >fabric Cost</label>  

                        <div class="col-md-12">
               <input type="text" id="fabric_price" readonly="1" name="fabric_price" value="<?php echo $order_addon_cost;?>"  class="form-control" >
              </div>
           </div>
  <div class="col-md-3">   <label class="col-md-12 " for="factory_number">Total Cost</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="total_cost" readonly="1" name="total_cost"  value="<?php echo $order_total_cost;?>" class="form-control"  >
              </div>
            </div></div>
</div>





<div class="form-group field-wrapper ">
  <div class="col-md-3">   <label class="col-md-12 " >Ftry Item Cost</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="factory_item_cost"  name="factory_item_cost" value="<?php echo $order_factory_item_cost;?>"  class="form-control">
              </div>
            </div></div>
  <div class="col-md-3"> 
    <label class="col-md-12 " >Ftry Addon Cost</label>  
                        <div class="col-md-12">
               <input type="text" id="factory_addon_cost"  name="factory_addon_cost" value="<?php echo $order_factory_addon_cost;?>"  class="form-control">
              </div>
           </div>
  <div class="col-md-3"> 
    <label class="col-md-12 " >Ftry Fabric Cost</label>  
                        <div class="col-md-12">
               <input type="text" id="factory_fabric_cost"  name="factory_fabric_cost" value="<?php echo $order_factory_fabric_cost;?>"  class="form-control" >
              </div>
           </div>

  <div class="col-md-3">   <label class="col-md-12 " for="factory_number">Ftry Total Cost</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="factory_total_cost" readonly="1" value="<?php echo $order_factory_total_cost;?>" name="factory_total_cost"  class="form-control"  >
              </div>
            </div></div>
</div>

<!-- ---------------------------------------PAYMENT PAYMENT------------ BELOW--------------------------------------- -->
<div class="form-group field-wrapper ">
    <div class="col-md-4">   <label class="col-md-12 " >Agent  amount</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="order_total_cost" name="order_total_cost"  value="<?php echo $order_total_cost;?>"  class="form-control">
              </div>
            </div></div>
    <div class="col-md-4">   <label class="col-md-12 " >Agent Advance</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="advance_amount" name="advance_amount" value="<?php echo $agent_advance;?>" onkeyup="display_balance();"  class="form-control">
              </div>
            </div></div>
               <div class="col-md-4">   <label class="col-md-12 " >Agent Balance</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="balance_amount" name="balance_amount" readonly="1" value="<?php echo $agent_balance;?>" class="form-control" >
              </div>
            </div></div>
       
</div>

<div class="form-group field-wrapper ">
    <div class="col-md-4">   <label class="col-md-12 " >Factory  Cost</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="factory_order_total_cost" name="factory_order_total_cost" value="<?php echo $order_factory_total_cost;?>"  class="form-control" >
              </div>
            </div></div>
    <div class="col-md-4">   <label class="col-md-12 " >Factory Advance</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="factory_advance_amount" name="factory_advance_amount" value="<?php echo $factory_advance;?>" onkeyup="display_factory_balance();"  class="form-control" >
              </div>
            </div></div>
               <div class="col-md-4">   <label class="col-md-12 " >Factory Balance</label>  
            <div class="form-group">
              <div class="col-md-12">
               <input type="text" id="factory_balance_amount" name="factory_balance_amount"  value="<?php echo $factory_balance;?>" class="form-control">
              </div>
            </div></div>

            <!-- =============================================== ORDER IMAGES -->

                       
                         
                          
      

</div>
    <!--  <button type="button" style="margin-left: 3vw;margin-top: 0vw;margin-bottom: 0vw;" onclick="save_order()" class="btn btn-danger ">Submit Order</button> -->
           <button type="button" style="margin-left: 13vw;" onclick="update_order()" class="btn btn-primary ">Update Order </button>

</div>

</td>
<tr>  

</tbody>

</table>
<div class="form-group" >                <!-- ================== ORDER IMAGES ------------------------------------- -->
   <div class="col-md-2" >
                          <table    style="background-color: white;">
                            <tr><td> <label >Image 1 </label></td>
                              <td rowspan="2"><img src="order_images/<?php echo $image_1;?>" id="image1" alt=""   width="100"> </td></tr>
                              <tr><td style="background-color: #F2F2F2;"><input type="file"     id="image_id1" name="order_images" style=" font-size: .8vw; width: 5.5vw;"  onchange="view_image('image1');"></td></tr>
                                                            <tr><td colspan="2"><textarea id="image_data1"  class="form-control" placeholder="Image 1 Details"> <?php echo $data1;?></textarea></td></tr>

                            </table>
  </div>
   <div class="col-md-2" style="*border: 1px solid;margin-bottom: 0vw;">
                          <table    style="background-color: white;">
                            <tr><td> <label >Image 2 </label></td>
                              <td rowspan="2"><img src="order_images/<?php echo $image_2;?>" id="image2" alt=""   width="100"> </td></tr>
                              <tr><td style="background-color: #F2F2F2;"><input type="file"     id="image_id2" name="order_images" style=" font-size: .8vw; width: 5.5vw;"  onchange="view_image('image2');"></td></tr>
                              <tr><td colspan="2"><textarea id="image_data2"  class="form-control" placeholder="Image 2 Details"> <?php echo $data2;?></textarea></td></tr>
                            </table>
                            
                          
                          </div>
   <div class="col-md-2" style="*border: 1px solid;margin-bottom: 0vw;">
                         <table    style="background-color: white;">
                            <tr><td> <label >Image 3 </label></td>
                              <td rowspan="2"><img src="order_images/<?php echo $image_3;?>" id="image3" alt=""   width="100"> </td></tr>
                              <tr><td style="background-color: #F2F2F2;"><input type="file"     id="image_id3" name="order_images" style=" font-size: .8vw; width: 5.5vw;"  onchange="view_image('image3');"></td></tr>
                                                            <tr><td colspan="2"><textarea id="image_data3"  class="form-control" placeholder="Image 3 Details"> <?php echo $data3;?></textarea></td></tr>

                            </table>
                          
                          </div>
   <div class="col-md-2" style="*border: 1px solid;margin-bottom: 0vw;">
                          <table    style="background-color: white;">
                            <tr><td> <label >Image 4 </label></td>
                              <td rowspan="2"><img src="order_images/<?php echo $image_4;?>" id="image4" alt=""   width="100"> </td></tr>
                              <tr><td style="background-color: #F2F2F2;"><input type="file"     id="image_id4" name="order_images" style=" font-size: .8vw; width: 5.5vw;"  onchange="view_image('image4');"></td></tr>
                                                            <tr><td colspan="2"><textarea id="image_data4" value="" class="form-control" placeholder="Image 4 Details"><?php echo $data4;?></textarea></td></tr>

                            </table>
                          
                          
                          </div> 

  <div class="col-md-2" style="*border: 1px solid;margin-bottom: 0vw;">
                          <table    style="background-color: white;">
                            <tr><td> <label >Image 5 </label></td>
                              <td rowspan="2"><img src="order_images/<?php echo $image_5;?>" id="image5" alt=""   width="100">  </td></tr>
                              <tr><td style="background-color: #F2F2F2;"><input type="file"     id="image_id5" name="order_images" style="font-size: .8vw; width: 5.5vw;"  onchange="view_image('image5');"></td></tr>
                                                            <tr><td colspan="2"><textarea id="image_data5"  class="form-control" placeholder="Image 5 Details"> <?php echo $data5;?></textarea> </td></tr>

                            </table>
                          
                          
                          </div> 
                            <div class="col-md-2" style="*border: 1px solid;margin-bottom: 0vw;">
                          <table    style="background-color: white;">
                            <tr><td> <label >Image 6 </label></td>
                              <td rowspan="2"><img src="order_images/<?php echo $image_6;?>" id="image6" alt=""   width="100"> </td></tr>
                              <tr><td style="background-color: #F2F2F2;"><input type="file"     id="image_id6" name="order_images" style=" font-size: .8vw; width: 5.5vw;"  onchange="view_image('image6');"></td></tr>
                                                            <tr><td colspan="2"><textarea id="image_data6"  class="form-control" placeholder="Image 6 Details"><?php echo $data6;?></textarea></td></tr>

                            </table>
                          
                          
                          </div> 

</div>




</form>
<script type="text/javascript">
 function display_customer(customer_id)
 {
          // alert(customer_id);
          $.ajax(
          {
            type:"POST",
            url:"details/customer_details.php",
                    // dataType:"json",
                    data:{
                      customer_id:customer_id
                    },

                    success: function(data)

                    {
                      // // alert(data);
                    // document.getElementById('customer_details').value=data;
                    $("#customer_div").html(data);

                    //   swal("success","Order inserted","success");
                    //  my_function('1','5');
                  }    
                });
        }
      </script>
      <script type="text/javascript">
       function display_vendor(vendor_id)
       {

          var item_id=document.getElementById('item_id').value;
          var fabric_id=document.getElementById('fabric_id').value;

              // alert(vendor_id+" deef"+item_id);
          $.ajax(
          {
            type:"POST",
            url:"details/vendor_details.php",
                    // dataType:"json",
                    data:{
                      vendor_id:vendor_id,
                  
                      item_id:item_id,
                      fabric_id:fabric_id
                    },

                    success: function(data)

                    {
                      // alert(data);
                    // document.getElementById('customer_details').value=data;
                    $("#item_div1").html(data);
                    check_addon(vendor_id); 

                    //   swal("success","Order inserted","success");
                    //  my_function('1','5');
                  }    
                });
        }
      </script>

<script type="text/javascript">
       function check_addon(vendor_id)
       {
// alert("adoncheck");
    var addon_array=[];

    var m=0;
    var addon_element=document.getElementsByName('addon_id');
    for (var i = 0; i <addon_element.length; i++) 
    {
    var addon_id=addon_element[i].value;
    if (addon_id!="")
    {
    addon_array[m]=addon_id;
    m++;
    }
    }
    var addon_array_json=JSON.stringify(addon_array);
    // alert(addon_array_json);
    // alert(vendor_id);

          $.ajax(
          {
            type:"POST",
            url:"details/check_addon.php",
                    // dataType:"json",
                    data:{

                      vendor_id:vendor_id,
                      addon_array_json:addon_array_json


                    },

                    success: function(data)

                    {
                      // alert(data);
                    // document.getElementById('customer_details').value=data;
                    $("#addon_div").html(data);
                     

                    //   swal("success","Order inserted","success");
                    //  my_function('1','5');
                  }    
                });
        }
      </script>



      <script type="text/javascript">
       function display_item(item_id)
       {
          // alert(item_id);
          $.ajax(
          {
            type:"POST",
            url:"details/item_details.php",
                    // dataType:"json",
                    data:{
                      item_id:item_id
                    },

                    success: function(data)

                    {
                      // alert(data);
                    // document.getElementById('customer_details').value=data;
                    $("#item_div").html(data);

                    //   swal("success","Order inserted","success");
                    //  my_function('1','5');
                  }    
                });
        }
      </script>

      <script type="text/javascript">
        function update_order()
        {


   
          // alert("saving");

          var addon_array=[];
          var m=0;
          var addon_element=document.getElementsByName('addon_id');
          for (var i = 0; i <addon_element.length; i++) 
          {
            var addon_id=addon_element[i].value;
            if (addon_id!="")
            {
              addon_array[m]=addon_id;
              m++;
            }
          }
          var addon_array_json=JSON.stringify(addon_array);



          var item_id=document.getElementById("item_id").value;
          var order_id=document.getElementById("order_id").value;


          var quantity1=document.getElementById("quantity1").value;
          if (quantity1=="")
            quantity1=0;
          var quantity2=document.getElementById("quantity2").value;
          if (quantity2=="")
            quantity2=0;
          var quantity3=document.getElementById("quantity3").value;
          if (quantity3=="")
            quantity3=0;
          var quantity4=document.getElementById("quantity4").value;
          if (quantity4=="")
            quantity4=0;
          var quantity5=document.getElementById("quantity5").value;
          if (quantity5=="")
            quantity5=0;
          var quantity6=document.getElementById("quantity6").value;
          if (quantity6=="")
            quantity6=0;
          var quantity7=document.getElementById("quantity7").value;
          if (quantity7=="")
            quantity7=0;
          var quantity8=document.getElementById("quantity8").value;
          if (quantity8=="")
            quantity8=0;
            // alert(quantity1+quantity2+quantity3+quantity4+quantity5+quantity6+quantity7+quantity8);

            var total=document.getElementById("total_qty").value;
            var order_date=document.getElementById("order_date").value;
            var store_delivery_date=document.getElementById("store_delivery_date").value;
            var main_delivery_date=document.getElementById("main_delivery_date").value;
            var customer_id=document.getElementById("customer_id").value;
            var vendor_id=document.getElementById("vendor_id").value;
            var fabric_id=document.getElementById("fabric_id").value;
            var color_id=document.getElementById("color_id").value;
            var order_item_cost=document.getElementById("item_cost").value;
            var order_addon_cost=document.getElementById("addon_cost").value;
            var order_fabric_price=document.getElementById("fabric_price").value;
            var order_total_cost=document.getElementById("total_cost").value;
            var order_factory_item_cost=document.getElementById("factory_item_cost").value;
            var order_factory_addon_cost=document.getElementById("factory_addon_cost").value;
            var order_factory_fabric_cost=document.getElementById("factory_fabric_cost").value;
            var order_factory_total_cost=document.getElementById("factory_total_cost").value;
            var advance_amount=document.getElementById("advance_amount").value;
   
            var factory_advance_amount=document.getElementById("factory_advance_amount").value;
            var balance_amount=document.getElementById("balance_amount").value;
            var factory_balance_amount=document.getElementById("factory_balance_amount").value;
            var reference_no=document.getElementById("reference_no").value;
        
            if(item_id=="" ||vendor_id==""||customer_id==""||fabric_id=="" )
            {       
             swal("ERROR","select item, customer, factory,fabric ","error");
            }
            else

                  { 
                    $.ajax(
                    {
                      type:"POST",
                      url:"update/order_update.php",
                                  // dataType:"json",
                                  data:{  

                                    customer_id:customer_id,
                                    item_id:item_id,
                                    fabric_id:fabric_id,
                                    addon_array_json:addon_array_json,

                                    reference_no:reference_no,
                                    order_date:order_date,
                                    store_delivery_date:store_delivery_date,
                                    main_delivery_date:main_delivery_date,

                                    quantity1:quantity1,
                                    quantity2:quantity2,
                                    quantity3:quantity3,
                                    quantity4:quantity4,
                                    quantity5:quantity5,
                                    quantity6:quantity6,
                                    quantity7:quantity7,
                                    quantity8:quantity8,
                                    total:total,

                                    order_item_cost:order_item_cost,
                                    order_addon_cost:order_addon_cost, 
                                    order_fabric_price:order_fabric_price,
                                    order_total_cost:order_total_cost,

                                    vendor_id:vendor_id,
                                    color_id:color_id,
                                    order_id:order_id,

                                    order_factory_item_cost:order_factory_item_cost,
                                    order_factory_addon_cost:order_factory_addon_cost,
                                    order_factory_fabric_cost:order_factory_fabric_cost,
                                    order_factory_total_cost:order_factory_total_cost,

                                    advance_amount:advance_amount, 
                                    balance_amount:balance_amount,
                                    factory_advance_amount:factory_advance_amount,
                                    factory_balance_amount:factory_balance_amount


                                  },

                                  success: function(data)

                                  {
                                    // alert(data);

                                    // swal("success","Order updated","success");
                                    
                                    
                                  }    
                                });
                  }

              order_image_update();
 
        }


</script>
 <script type="text/javascript">

         function order_image_update()
         {
           var form = new FormData(document.getElementById('image_form'));

                      //append files
                      for(i=1;i<7;i++)
                      {                     
                      var file = document.getElementById("image_id"+i).files[0];
                      var value=document.getElementById("image_data"+i).value;
                      
                      if (file)
                      {   
                        form.append("image_id"+i, file);
                        form.append("image_data"+i, value);
                      }
                       $.ajax({
                        type: "POST",
                        url: "update/order_image_update.php",
                       // dataType:"json",
                       data: form, 
                       cache: false,
                      contentType: false, //must, tell jQuery not to process the data
                      processData: false,
                      //data: $("#upload_img").serialize(),
                      success: function(data)
                      {
                        // alert(data);
                   swal("success","image inserted ","success");
                     my_function('2','6');

                      }
                    });
                      }
                     

                    }

                  </script>
<script>
 function display_total()
          {
          // alert("total");

          var quantity1=document.getElementById("quantity1").value;
          if (quantity1=="")
            quantity1=0;
          var quantity2=document.getElementById("quantity2").value;
          if (quantity2=="")
            quantity2=0;
          var quantity3=document.getElementById("quantity3").value;
          if (quantity3=="")
            quantity3=0;
          var quantity4=document.getElementById("quantity4").value;
          if (quantity4=="")
            quantity4=0;
          var quantity5=document.getElementById("quantity5").value;
          if (quantity5=="")
            quantity5=0;
          var quantity6=document.getElementById("quantity6").value;
          if (quantity6=="")
            quantity6=0;
          var quantity7=document.getElementById("quantity7").value;
          if (quantity7=="")
            quantity7=0;
          var quantity8=document.getElementById("quantity8").value;
          if (quantity8=="")
            quantity8=0;
          var total=parseFloat(quantity1)+parseFloat(quantity2)+parseFloat(quantity3)+parseFloat(quantity4)+parseFloat(quantity5)+parseFloat(quantity6)+parseFloat(quantity7)+parseFloat(quantity8);
          // alert(total);
          document.getElementById("total_qty").value=total;

          
          if (total > 0 && total <= 6)
          {
            var quantity_id='1';

            
          }
          if (total > 6 && total <25)
          {
            var quantity_id='2';
            
          }
          if (total >= 25)
          {
            var quantity_id='3';
            


          } document.getElementById("quantity_id").value=quantity_id;
          var item_id=document.getElementById("item_id").value;
          var fabric_id=document.getElementById("fabric_id").value;
          // var vendor_id=document.getElementById("vendor_id").value;
          // alert(item_id+vendor_id)

          $.ajax(
          {
            type:"POST",
            url:"details/item_cost.php",
            dataType:"json",
            data:{
              quantity_id:quantity_id,
              
              item_id:item_id,
              fabric_id:fabric_id
            },

            success: function(data)

            {
            // alert(data);
            var cost=data.item_cost;
            var fabric_price=data.fabric_price;
            if (cost==null)
              cost=0;
            // alert(fabric_price);
            cost= parseFloat(total)*parseFloat(cost)   ;
            fabric_price= parseFloat(total)*parseFloat(fabric_price)   ;
            // alert(fabric_price);
            document.getElementById("item_cost").value=cost; 
            document.getElementById("fabric_price").value=fabric_price;
            cost=cost+fabric_price; 
            document.getElementById("total_cost").value=cost; 
            document.getElementById("order_total_cost").value=cost; 

            display_addon_cost(quantity_id);

                
            }    
            });

        }
</script>

       <script type="text/javascript">
  function display_addon_cost(quantity_id)
      {
      var total= document.getElementById("total_qty").value
      // alert("display_addon_cost");
      var addon_array=[];

      var m=0;

      var addon_element=document.getElementsByName('addon_id');

      //     if (addon_element.length==0){
      //       var item_cost=document.getElementById("item_cost").value;
      // document.getElementById("total_cost").value=item_cost; 


      //     }
      for (var i = 0; i <addon_element.length; i++) 
      {
      var addon_id=addon_element[i].value;
      if (addon_id!="")
      {
      addon_array[m]=addon_id;
      m++;
      }
      }
      var addon_array_json=JSON.stringify(addon_array);
      // alert(addon_array_json);
      $.ajax({
      type:"POST",
      url:"details/display_addon_cost.php",
      dataType:"json",
      data:{
      addon_array_json:addon_array_json,
      quantity_id:quantity_id

      },
      success:function(data)
      {
      // alert(data);
      var sum4=data.sum4;
      // alert("sum");
      // alert(sum);
      var addon_cost=total*sum4
      document.getElementById("addon_cost").value=addon_cost; 

      var item_cost=document.getElementById("total_cost").value;
      var total_cost=parseFloat(item_cost)+parseFloat(addon_cost);
      document.getElementById("total_cost").value=total_cost; 
      document.getElementById("order_total_cost").value=total_cost; 

      }
      });
  }
  </script>

      <script type="text/javascript">
function display_factory_item_cost()
        {
          // alert("display_factory_item_cost");

          var item_id=document.getElementById("item_id").value;
          var vendor_id=document.getElementById("vendor_id").value;
          var fabric_id=document.getElementById("fabric_id").value;
          var quantity_id=document.getElementById("quantity_id").value;
          var total=document.getElementById("total_qty").value;
          // alert(item_id+"v"+vendor_id+" q"+quantity_id+"f"+fabric_id)

          $.ajax(
          {
            type:"POST",
            url:"details/display_factory_item_cost.php",
            dataType:"json",
            data:{
              quantity_id:quantity_id,
              vendor_id:vendor_id,
              fabric_id:fabric_id,
                    item_id:item_id
            },

            success: function(data)

            {
                     // alert(data);

              var factory_item_cost=data.factory_item_cost;

              var factory_fabric_price=data.factory_fabric_price;
           
              var factory_item_cost_sum=total*factory_item_cost;
          
              var factory_fabric_price_sum=total*factory_fabric_price;
              
              document.getElementById("factory_item_cost").value=factory_item_cost_sum; 
              document.getElementById("factory_fabric_cost").value=factory_fabric_price_sum; 
              
              document.getElementById("factory_total_cost").value=factory_item_cost_sum+factory_fabric_price_sum; 
              document.getElementById("factory_order_total_cost").value=factory_total_cost; 
             
              // display_fabric_cost(vendor_id);

     display_factory_addon_cost(vendor_id);
            }    
            });

          // var tax=(parseFloat(sum)*parseFloat(selling_price))/100;
          
// display_balance();
// display_factory_balance();
document.getElementById("advance_amount").value=""; 
document.getElementById("balance_amount").value=""; 
document.getElementById("factory_advance_amount").value=""; 
document.getElementById("factory_balance_amount").value=""; 
        }

  </script>

 


    <script type="text/javascript">
  function display_factory_addon_cost(vendor_id)
  {
    var total= document.getElementById("total_qty").value
    var quantity_id= document.getElementById("quantity_id").value
    // alert("display_factory_addon_cost");
    var addon_array=[];

    var m=0;
    var addon_element=document.getElementsByName('addon_id');
    for (var i = 0; i <addon_element.length; i++) 
      {
        var addon_id=addon_element[i].value;
        if (addon_id!="")
        {
        addon_array[m]=addon_id;
        m++;
        }
      }
    var addon_array_json=JSON.stringify(addon_array);
    // alert(addon_array_json);
        $.ajax({
          type:"POST",
          url:"details/display_factory_addon_cost.php",
          dataType:"json",
          data:{
            addon_array_json:addon_array_json,
            quantity_id:quantity_id,
            vendor_id:vendor_id

                },
          success:function(data)
          {
              var sum4=data.sum4;
           
              var factory_addon_cost=total*sum4
              document.getElementById("factory_addon_cost").value=factory_addon_cost; 
              var factory_item_cost=document.getElementById("factory_item_cost").value;
              var factory_total_cost=parseFloat(factory_item_cost)+parseFloat(factory_addon_cost);
              document.getElementById("factory_total_cost").value=factory_total_cost; 
              document.getElementById("factory_order_total_cost").value=factory_total_cost; 

          }
        });
  }
  </script>
     <script type="text/javascript">
  function add_addon(x,y) {
    
    var addon_row_count=document.getElementById("addon_row_count").value;
  // var sum=document.getElementById("total_amount").value;
  addon_row_count=parseInt(addon_row_count)+1;
  document.getElementById('addon_row_count').value=addon_row_count;
  // document.getElementById('total_amount').value=sum;

  var row_id = x.parentNode.parentNode.rowIndex;
  var x=row_id;
  var table = document.getElementById(y);
  var row = table.insertRow(x);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  

// var cell7 = row.insertCell(6);


cell1.innerHTML ='  <select id="addon_id" class="form-control input-md" name="addon_id" >          <option style="color: grey" value="" >select addon          </option>          <?php  
            $query=mysqli_query($conn,"SELECT * from addons");
            while($fetch=mysqli_fetch_array($query))
            {
              ?>
              <option value="<?php echo $fetch ['addon_id']; ?>"><?php echo  $fetch ['addon_id'].".".$fetch ['addon']."-".$fetch ['addon_price1'].",".$fetch ['addon_price2'].",".$fetch ['addon_price3'];?> </option><?php
            }
            ?>    </select>   ';

cell2.innerHTML = '<button id="add" name="add" class="btn btn-warning" onclick="delete_addon(this)">-</button></td>';



}

</script>
<script>
  function  delete_addon(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("addon_table1").deleteRow(row_id);
    add_total();
  }
</script>
<script type="text/javascript">
  function display_balance()
  {
    var order_total_cost=document.getElementById("order_total_cost").value;
    var advance_amount=document.getElementById("advance_amount").value;
    var balance_amount=parseFloat(order_total_cost)-parseFloat(advance_amount);
    document.getElementById("balance_amount").value=balance_amount;
  }
</script>
<script type="text/javascript">
  function display_factory_balance()
  {
    var order_total_cost1=document.getElementById("factory_order_total_cost").value;
    var advance_amount=document.getElementById("factory_advance_amount").value;   

    var balance_amount=parseFloat(order_total_cost1)-parseFloat(advance_amount);
    document.getElementById("factory_balance_amount").value=balance_amount;
  }
</script>

                    <script type="text/javascript">
                              function view_image(id)
                              {
                                // alert(id)
                                document.getElementById(id).src= URL.createObjectURL(event.target.files[0]);

                              }
                            </script>
    </body>
    </html>