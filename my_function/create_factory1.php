<?php include "../connect.php";?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
  .select_box
  {
    width: 10vw;
  }
  .select_box1
  {
    width: 5vw;
    font-size: 1vw;
  }
</style>
<script type="text/javascript">$(document).ready(function(){  
  $("#fabric_id").change(function() {   
    $("#fabric_id").not(this).find("option[value="+ $(this).val() + "]").attr('disabled', true);
  }); 
}); </script>
</head>
<body>
  <form id="jobreg_id" enctype="multipart/form-data">
    <?php 
    $query=mysqli_query($conn,"select vendor_id from vendors order by vendor_id desc LIMIT 1
     ");
    $fetch=mysqli_fetch_array($query);
    $vendor_id=$fetch['vendor_id'];
if ($vendor_id==null)
    {
      $vendor_id='1000';
    } 
    else
    {
      $vendor_id=$vendor_id+'1';
    }    ?>
     <h1><b style="font-size:30px;color:#2196f3">Create Factory</b></h1>
    <table class="table table-striped">
      <tbody>
       <tr>
        <td colspan="1">
         <div class="well form-horizontal">
          <fieldset>
            <div id="detail_div">
             <div class="form-group field-wrapper required-field">
              <label class="col-md-4 control-label field-wrapper required-field">Factory Number</label>
              <div class="col-md-8 inputGroupContainer">
               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="vendor_id" name="vendor_id" placeholder="Shop Number" class="form-control" required="" readonly="1" value="<?php echo $vendor_id;?>" type="text"></div>
             </div>
           </div>

           <div class="form-group field-wrapper required-field">
            <label class="col-md-4 control-label field-wrapper required-field">Factory Name</label>
            <div class="col-md-8 inputGroupContainer">
             <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="factory_name" name="factory_name" placeholder="Full Name" class="form-control" required="" value="" type="text"></div>
           </div>
         </div>

         <div class="form-group field-wrapper required-field">
          <label class="col-md-4 control-label field-wrapper required-field">Full Name</label>
          <div class="col-md-8 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="vendor_name" name="vendor_name" placeholder="Full Name" class="form-control" required="" value="" type="text"></div>
         </div>
       </div>
       <div class="form-group field-wrapper required-field">
        <label class="col-md-4 control-label">Address</label>
        <div class="col-md-8 inputGroupContainer">
         <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="vendor_address" name="vendor_address" placeholder="Address" class="form-control" required="true" value="" type="text"></div>
       </div>
     </div>
     
     <div class="form-group">
      <label class="col-md-4 control-label">Place</label>
      <div class="col-md-8 inputGroupContainer">
       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="vendor_place" name="vendor_place" placeholder="Muncipality/Panchayath" class="form-control" required="true" value="" type="text"></div>
     </div>
   </div>
 <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                        <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="vendor_district" name="vendor_district" placeholder="District" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>

<div class="form-group field-wrapper required-field">
  <label class="col-md-4 control-label">Pincode</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="vendor_pincode" name="vendor_pincode" placeholder="Postal Code" class="form-control" required="true" value="" min="0" type="number"></div>
 </div>
</div>

<div class="form-group field-wrapper required-field">
  <label class="col-md-4 control-label">Email</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="vendor_email" name="vendor_email" style="text-transform: lowercase;" placeholder="Email" class="form-control" required="true" value="" type="text"></div>
 </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="factory_number">Mobile 1</label>  
  <div class="col-md-8">
    <input id="vendor_mobile1" name="vendor_mobile1"  onkeypress="return blockSpecialChar(event)" type="text" placeholder="Mobile No 1" class="form-control input-md">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="factory_number">Mobile 2</label>  
  <div class="col-md-8">
    <input id="vendor_mobile2" name="vendor_mobile2" type="text" placeholder="Mobile No 2" class="form-control input-md">
    
  </div>
</div>

</div>

<!-- =========================================================================================== -->
<div id="item_cost_div" style="display: none;">
 <div style="overflow: auto;height: 33vw; border:1.5px solid white;border-radius: 1vw;">
   <label class="col-md-4 control-label" for="factory_number">Enter Item Cost</label>  
   
   
   <table border="0" id="item_table">
    <tr>
     <div class="form-group">
      <td>
        <select id="item_id"  name="item_id" class="form-control">
          <option style="color: grey" value="" >select Item</option>
 <?php  
          $query=mysqli_query($conn,"SELECT * from items");

          while($fetch=mysqli_fetch_array($query))
          {
   ?>
            <option value="<?php echo $fetch ['item_id']; ?>"><?php echo $fetch ['item_no']." ".$fetch ['item_name'];?> </option>
     <?php
          }
     ?> 
        </select>            


      </td>
      <td>

        <input id="item_price1" style="width: 6vw;" name="item_price1" type="text" placeholder="0 to 6" class="form-control input-md">

      </td>
      <td>

        <input id="item_price2" style="width: 6vw;" name="item_price2" type="text" placeholder="7 to 24" class="form-control input-md">

      </td><td>

        <input id="item_price3" style="width: 6vw;"  name="item_price3" type="text" placeholder="25 & above" class="form-control input-md">

      </td>
    </div>
  </tr>
  
  <input  type="hidden" value="1" id="last_id_txt" > </table></div>


  <button type="button" style="margin-left: 30vw;" id="add" name="add" class="btn btn-success" onclick="add_row(this,'item_table')">+ ADD</button></div>

  <!-- ======================================================FABRIC DIV================ BELOW====================================================== -->
 
  <div id="material_cost_div" style="display: none;">
 <div style="overflow: auto;height: 33vw; border:1.5px solid white;border-radius: 1vw;">
   <label class="col-md-4 control-label" for="factory_number">Enter Material Cost</label>  
   
   
   <table border="0" id="fabric_table">
    <tr>
     <div class="form-group">
      <td>
        <select id="fabric_id"  name="fabric_id" class="form-control">
          <option style="color: grey" value="" >select Fabric</option>
 <?php  
          $query=mysqli_query($conn,"SELECT fabric_id,fabric from fabrics");

          while($fetch=mysqli_fetch_array($query))
          {
 ?>
            <option value="<?php echo $fetch ['fabric_id']; ?>"><?php echo $fetch ['fabric'];?> </option>
    <?php
          }
 ?> 
        </select>            


      </td>
      <td>

        <input id="fabric_cost"  name="fabric_cost" type="text" placeholder="fabric price" class="form-control input-md">

      </td>
     
    </div>
  </tr>
  
  <input  type="hidden" value="1" id="last_id_txtf" > </table></div>


  <button type="button" style="margin-left: 30vw;" id="add" name="add" class="btn btn-success" onclick="add_rowf(this,'fabric_table')">+ ADD</button></div>
<!-- ================================ FABRIC DIV =====================ABOVE================================ -->

<!-- ===================================================ADDON DIV================== BELOW======================================================= -->
  <div id="addon_div" style="display: none;">
   <div style="overflow: auto;height: 33vw; border:1.5px solid white;border-radius: 1vw;">
     <label class="col-md-4 control-label" for="factory_number">Enter addon Cost</label>  
     
     
     <table border="0" id="addon_table">
      <tr>
       <div class="form-group">
        <td>
          <select id="addon_id"  name="addon_id" class="form-control">
<option style="color: grey" value="" >select addon</option>
   <?php  
            $query=mysqli_query($conn,"SELECT addon_id,addon from addons");
            while($fetch=mysqli_fetch_array($query))
            {
    ?>
              <option value="<?php echo $fetch ['addon_id']; ?>"><?php echo $fetch ['addon'];?> </option>
 <?php
            }
   ?> 
          </select>            


        </td>
        <td>

          <input id="addon_price1" style="width: 6vw;"  name="addon_price1" type="text" placeholder="0 to 6" class="form-control input-md">

        </td>
        <td>

          <input id="addon_price2" style="width: 6vw;" name="addon_price2" type="text" placeholder="7 to 24" class="form-control input-md">

        </td><td>

          <input id="addon_price3"  style="width: 6vw;" name="addon_price3" type="text" placeholder="25 & above" class="form-control input-md">

        </td>
      </div>
    </tr>
    
    <input  type="hidden" value="1" id="last_id_txt1" > </table></div>

    <button type="button" style="margin-left: 30vw;" id="add" name="add" class="btn btn-success" onclick="add_row1(this,'addon_table')">+ ADD</button></div>
        <!-- =============================================ADDON  DIV======ABOVE======================================================================== -->

  </fieldset>



</div>


</td>
<td colspan="1">

 <div class="well form-horizontal">
  <fieldset>
   <button type="button" style="margin-left: 3vw;width: 8VW;" onclick="cost_button()" class="btn btn-primary">
     Item Cost
   </button> <br> <br>  
    <button type="button" style="margin-left: 3vw;width: 8VW;" onclick="material_button()" class="btn btn-primary">
     Material Cost
   </button> <br> <br>
   <button type="button" style="margin-left: 3vw;width: 8VW;" onclick="addon_button()" class="btn btn-primary">
     Addon
   </button><br><br>
   <button type="button" style="margin-left: 3vw;width: 8VW;" onclick="details_button()" class="btn btn-primary">
     Details
   </button><br><br>
  

 </fieldset>  
</div> <button type="button" style="margin-left: 3vw;" onclick="save_factory()" class="btn btn-danger ">SUBMIT FACTORY</button>
<!-- <div class="well form-horizontal">
 <fieldset>
   

  <button type="button" style="margin-left: 3vw;" onclick="preview_form()" class="btn btn-success">
    <span class="glyphicon glyphicon-eyes" aria-hidden="true"></span> PREVIEW FORM
  </button>
</fieldset>
</div>
 -->



<!-- <div class="col-md-5"><button type="button" style="float: right;" onclick="submit_jobreg()" class="btn btn-secondary ">Print Preview</button></div> -->


</td>
</tr>

</tbody>

</table>
</form>

<script type="text/javascript">
  function add_row(x,y) {
    
    var last_id=document.getElementById("last_id_txt").value;
  // var sum=document.getElementById("total_amount").value;
  last_id=parseInt(last_id)+1;
  document.getElementById('last_id_txt').value=last_id;
  // document.getElementById('total_amount').value=sum;

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


cell1.innerHTML ='<select id="item_id" class="form-control input-md" name="item_id"> <option style="color: grey" value="" >select Item</option><?php  
            $query=mysqli_query($conn,"SELECT * from items");
            while($fetch=mysqli_fetch_array($query))
            {
              ?>
              <option value="<?php echo $fetch ['item_id']; ?>"><?php echo $fetch ['item_name']." ".$fetch ['item_no'];?> </option><?php
            }
            ?>    </select>';
cell2.innerHTML ='<input name="item_price1" style="width: 6vw;" class="form-control input-md" id="1item_price'+last_id+'" type="text" placeholder="0 to 6">';
cell3.innerHTML = '<input name="item_price2" style="width: 6vw;" class="form-control input-md" id="2item_price'+last_id+'" type="text" placeholder="7 to 24" >';
cell4.innerHTML = '<input name="item_price3" style="width: 6vw;" class="form-control input-md" id="3item_price'+last_id+'" type="text" placeholder="25 & above" >';
cell5.innerHTML = '<button id="add" name="add" class="btn btn-warning" onclick="delete_row(this)">-</button></td>';



}

</script>
<script type="text/javascript">
  function add_rowf(x,y) {
    
    var last_idf=document.getElementById("last_id_txtf").value;
  // var sum=document.getElementById("total_amount").value;
  last_idf=parseInt(last_idf)+1;
  document.getElementById('last_id_txtf').value=last_idf;
  // document.getElementById('total_amount').value=sum;

  var row_id = x.parentNode.parentNode.rowIndex;
  var x=row_id;
  var table = document.getElementById(y);
  var row = table.insertRow(x);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  

// var cell7 = row.insertCell(6);


cell1.innerHTML ='<select id="fabric_id" class="form-control input-md" name="fabric_id"> <option style="color: grey" value="" >select Fabric</option><?php  
            $query=mysqli_query($conn,"SELECT fabric_id,fabric from fabrics");
            while($fetch=mysqli_fetch_array($query))
            {
              ?>
              <option value="<?php echo $fetch ['fabric_id']; ?>"><?php echo $fetch ['fabric'];?> </option><?php
            }
            ?>    </select>';
cell2.innerHTML ='<input name="fabric_cost"  class="form-control input-md" placeholder="Fabric Price"   type="text">';

cell3.innerHTML = '<button id="add" name="add" class="btn btn-warning" onclick="delete_rowf(this)">-</button></td>';



}

</script>

<script type="text/javascript">
  function add_row1(x,y) {
    
    var last_id=document.getElementById("last_id_txt1").value;
  last_id=parseInt(last_id)+1;
  document.getElementById('last_id_txt1').value=last_id;

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



cell1.innerHTML = ' <select id="addon_id" class="form-control input-md" name="addon_id"> <option style="color: grey" value="" >select addon</option><?php  
            $query=mysqli_query($conn,"SELECT addon_id,addon from addons");
            while($fetch=mysqli_fetch_array($query))
            {
              ?>
              <option value="<?php echo $fetch ['addon_id']; ?>"><?php echo $fetch ['addon']." ".$fetch ['addon_id'];?> </option><?php
            }
            ?>    </select>';

cell2.innerHTML ='<input name="addon_price1" style="width: 6vw;" class="form-control input-md" id="1addon_price'+last_id+'" type="text" placeholder="0 to 6">';
cell3.innerHTML = '<input name="addon_price2" style="width: 6vw;" class="form-control input-md" id="2addon_price'+last_id+'" type="text" placeholder="7 to 24">';
cell4.innerHTML = '<input name="addon_price3" style="width: 6vw;" class="form-control input-md" id="3addon_price'+last_id+'" type="text" placeholder="25 & above">';
cell5.innerHTML = '<button id="add" name="add" class="btn btn-warning" onclick="delete_row1(this)">-</button></td>';



}

</script>
<script>
  function  delete_row(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("item_table").deleteRow(row_id);
    add_total();
  }
</script>
<script>
  function  delete_rowf(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("fabric_table").deleteRow(row_id);
    add_total();
  }
</script>
<script>
  function  delete_row1(element) {
    var row_id = element.parentNode.parentNode.rowIndex;
    document.getElementById("addon_table").deleteRow(row_id);
    add_total();
  }
</script>
<script type="text/javascript">
  function cost_button()
  {
    // alert("cost");
    document.getElementById("detail_div").style.display="none";
    document.getElementById("item_cost_div").style.display="block";
    document.getElementById("addon_div").style.display="none";
       document.getElementById("material_cost_div").style.display="none";
  }
</script>
<script type="text/javascript">
  function material_button()
  {
    // alert("cost");
    document.getElementById("detail_div").style.display="none";
    document.getElementById("item_cost_div").style.display="none";
    document.getElementById("material_cost_div").style.display="block";
    document.getElementById("addon_div").style.display="none";

  }
</script>
<script type="text/javascript">
  function addon_button()
  {
    // alert("cost");
    document.getElementById("detail_div").style.display="none";
    document.getElementById("item_cost_div").style.display="none";
    document.getElementById("addon_div").style.display="block";
       document.getElementById("material_cost_div").style.display="none";
  }
</script>
<script type="text/javascript">
  function details_button()
  {
    // alert("cost");
    document.getElementById("detail_div").style.display="block";
    document.getElementById("item_cost_div").style.display="none";
    document.getElementById("addon_div").style.display="none";
       document.getElementById("material_cost_div").style.display="none";
  }
</script>
  <script type="text/javascript">
    function save_factory()
    {
     
          // swal("success","Store bill inserted","success");
          var factory_name=document.getElementById("factory_name").value;
          var vendor_name=document.getElementById('vendor_name').value;
          var vendor_address=document.getElementById('vendor_address').value;
          var vendor_place=document.getElementById('vendor_place').value;
          var vendor_district=document.getElementById('vendor_district').value;
            // var vendorr_state=document.getElementById('vendorr_state').value;
            var vendor_pincode=document.getElementById('vendor_pincode').value;
            var vendor_mobile1=document.getElementById('vendor_mobile1').value;
            var vendor_mobile2=document.getElementById('vendor_mobile2').value;
            var vendor_email=document.getElementById('vendor_email').value;


    var item_element=document.getElementsByName('item_id');
    var item_price1_element=document.getElementsByName('item_price1');
    var item_price2_element=document.getElementsByName('item_price2');
    var item_price3_element=document.getElementsByName('item_price3');

    var addon_element=document.getElementsByName('addon_id');
    var addon_price1_element=document.getElementsByName('addon_price1');
    var addon_price2_element=document.getElementsByName('addon_price2');
    var addon_price3_element=document.getElementsByName('addon_price3');
    
    var fabric_element=document.getElementsByName('fabric_id');
    var fabric_price_element=document.getElementsByName('fabric_cost');
// alert(fabric_element);
    var items_array=[];
    var item_price1=[];
    var item_price2=[];
    var item_price3=[];
    
   var addon_array=[];
    var addon_price1_array=[];
    var addon_price2_array=[];
    var addon_price3_array=[];

   var fabric_array=[];
    var fabric_price_array=[];
   
    var n=0;
    var m=0;
    var f=0;

    for (var i = 0; i <item_element.length; i++) 
    {
       var item_id=item_element[i].value;
       var item_price1_id=item_price1_element[i].value;
       var item_price2_id=item_price2_element[i].value;
       var item_price3_id=item_price3_element[i].value;
       if (item_id!="")
        {
          items_array[n]=item_id;
          item_price1[n]=item_price1_id;
          item_price2[n]=item_price2_id;
          item_price3[n]=item_price3_id;
          

          n++;
        }
    }

  for (var i = 0; i <addon_element.length; i++) 
    {
       var addon_id=addon_element[i].value;
       var addon_price1=addon_price1_element[i].value;
       var addon_price2=addon_price2_element[i].value;
       var addon_price3=addon_price3_element[i].value;
       if (addon_id!="")
        {
          addon_array[m]=addon_id;
          addon_price1_array[m]=addon_price1;
          addon_price2_array[m]=addon_price2;
          addon_price3_array[m]=addon_price3;
          

          m++;
        }
    }

    for (var i = 0; i <fabric_element.length; i++) 
    {
      // alert("ajay"+fabric_price_element[i].value);
       var fabric_id=fabric_element[i].value;
       var fabric_price=fabric_price_element[i].value;
      
       if (fabric_id!="")
        {
          // alert("fabric"+fabric_id+"price"+fabric_price);
          fabric_array[f]=fabric_id;
          fabric_price_array[f]=fabric_price;
          
          

          f++;
        }
    }
    var items_array_json=JSON.stringify(items_array);
    var item_price1_json=JSON.stringify(item_price1);
    var item_price2_json=JSON.stringify(item_price2);
    var item_price3_json=JSON.stringify(item_price3);

  var addon_array_json=JSON.stringify(addon_array);
    var addon_price1_json=JSON.stringify(addon_price1_array);
    var addon_price2_json=JSON.stringify(addon_price2_array);
    var addon_price3_json=JSON.stringify(addon_price3_array);
// alert(fabric_price_array);
  var fabric_array_json=JSON.stringify(fabric_array);
    var fabric_price_json=JSON.stringify(fabric_price_array);
// alert(fabric_price_json);

      
    // alert(fabric_array_json);

            if(vendor_name=="" ||factory_name=="" )
            {       
             swal("ERROR","Enter  Name ","error");
           }
           else if(vendor_mobile1=="" )
            {swal("ERROR","Enter mobile","error");}
          else{
 
         
            $.ajax(
            {
              type:"POST",
              url:"insert/vendor_insert.php",
                      // dataType:"json",
                      data:{
                        factory_name:factory_name,
                        vendor_name:vendor_name,
                        vendor_address:vendor_address,
                        vendor_place:vendor_place,
                        vendor_district:vendor_district,
                        vendor_pincode:vendor_pincode,
                        vendor_mobile1:vendor_mobile1,
                        vendor_mobile2:vendor_mobile2,
                        vendor_email:vendor_email,

                           items_array_json:items_array_json,
                        item_price1_json:item_price1_json,
                        item_price2_json:item_price2_json,
                        item_price3_json:item_price3_json,

                        addon_array_json:addon_array_json,
                        addon_price1_json:addon_price1_json,
                        addon_price2_json:addon_price2_json,
                        addon_price3_json:addon_price3_json,
                        
                       

                        fabric_array_json:fabric_array_json,
                        fabric_price_json:fabric_price_json

                       
                      },

                      success: function(data)
                      
                      {
                        // alert(data);
                        swal("success","Factory inserted","success");
                        my_function('1','3');
                      }    
                    });
          }
        }
      </script>
   


  </body>
  </html>