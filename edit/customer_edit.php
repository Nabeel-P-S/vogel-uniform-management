<?php include "../connect.php";
$customer_id=$_POST['customer_id'];
$query_customer=mysqli_query($conn,"SELECT * from customers where customer_id='$customer_id'");
$fetch_customer=mysqli_fetch_array($query_customer);
$shop_name=$fetch_customer['shop_name'];
$customer_name=$fetch_customer['customer_name'];
$customer_address=$fetch_customer['customer_address'];
$customer_place=$fetch_customer['customer_place'];
$customer_district=$fetch_customer['customer_district'];
$customer_state=$fetch_customer['customer_state'];
$customer_pincode=$fetch_customer['customer_pincode'];
$customer_mobile1=$fetch_customer['customer_mobile1'];
$customer_mobile2=$fetch_customer['customer_mobile2'];
$customer_email=$fetch_customer['customer_email'];
$customer_adhar=$fetch_customer['customer_adhar'];
$customer_license=$fetch_customer['customer_license'];
$customer_image=$fetch_customer['customer_image'];

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
<form id="table_data" enctype="multipart/form-data">

                         <h1><b style="font-size:30px;color:#2196f3"><?php echo $shop_name;?></b></h1>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Shop Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input readonly="1" id="customer_id" name="customer_id" placeholder="Shop Number" class="form-control" required="" value="<?php echo $customer_id;?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Shop Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="shop_name" name="shop_name" placeholder="Full Name" class="form-control" required="" value="<?php echo $shop_name;?>" type="text"></div>
                            </div>
                         </div>

                            <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Full Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="customer_name" name="customer_name" placeholder="Full Name" class="form-control" required="" value="<?php echo $customer_name;?>" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="customer_address" name="customer_address" placeholder="Address" class="form-control" required="true" value="<?php echo $customer_address;?>" type="text"></div>
                            </div>
                         </div>
                         
                         <div class="form-group">
                            <label class="col-md-4 control-label">Place</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="customer_place" name="customer_place" placeholder="Muncipality/Panchayath" class="form-control" required="true" value="<?php echo $customer_place;?>" type="text"></div>
                            </div>
                         </div>
                     
                         
                         <div class="form-group">
                            <label class="col-md-4 control-label">District</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                  
                               <input id="customer_district" name="customer_district" placeholder="Muncipality/Panchayath" class="form-control" required="true" value="<?php echo $customer_district;?>" type="text">
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">State</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                  <input id="customer_state" name="customer_state" placeholder="Muncipality/Panchayath" class="form-control" required="true" value="<?php echo $customer_state;?>" type="text">
                               </div>
                            </div>
                         </div>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label">Pincode</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="customer_pincode" name="customer_pincode" placeholder="Postal Code" class="form-control" required="true" value="<?php echo $customer_pincode;?>" min="0" type="number"></div>
                            </div>
                         </div>
                         
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="customer_email"style="text-transform: lowercase;" name="customer_email" placeholder="Email" class="form-control" required="true" value="<?php echo $customer_email;?>" type="text"></div>
                            </div>
                         </div>
                       
                     
                      </fieldset>
                   </div>
                </td>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                                 <div class="form-group">
                          <table   style="background-color: white;text-align: center;margin-left: 4vw;">
                            <tr><td> <label  style="*margin-top: 2vw;">Customer Image </label></td>
      <td rowspan="2"><img src="customer_images/<?php echo $customer_image?>" id="image_preview" alt=""   width="120"> </td></tr>
      <tr><td style="background-color: #F2F2F2;"><input type="file"     id="image_id" name="image_id" style=" width: 17vw; "  onchange="view_image();"></td></tr>
                           
                          </table>
   <div class="col-md-8" >

  </div>
     <script type="text/javascript">
          function view_image()
          {
            document.getElementById("image_preview").src= URL.createObjectURL(event.target.files[0]);

          }
        </script>
</div>
                        
                          <div class="form-group">
  <label class="col-md-4 control-label" for="factory_number">Mobile 1</label>  
  <div class="col-md-8">
  <input id="customer_mobile1" name="customer_mobile1" type="text" value="<?php echo $customer_mobile1;?>" placeholder="Factory No" class="form-control input-md">
    
  </div>
</div>
                         <div class="form-group">
  <label class="col-md-4 control-label" for="factory_number">Mobile 2</label>  
  <div class="col-md-8">
  <input id="customer_mobile2" name="customer_mobile2" type="text" value="<?php echo $customer_mobile2;?>" placeholder="Factory No" class="form-control input-md">
    
  </div>
</div>
                        <div class="form-group">
  <label class="col-md-4 control-label" for="factory_number">Adhar Number</label>  
  <div class="col-md-8">
  <input id="customer_adhar" name="customer_adhar" type="text" placeholder="Factory No" value="<?php echo $customer_adhar;?>" class="form-control input-md">
    
  </div>
</div>
                         <div class="form-group">
  <label class="col-md-4 control-label" for="factory_number">Trade License Number</label>  
  <div class="col-md-8">
  <input id="customer_license" name="customer_license" type="text" placeholder="Factory No" value="<?php echo $customer_license;?>" class="form-control input-md">
    
  </div>
</div>
                     
                         
                      </fieldset>
                   </div>
                   <div class="well form-horizontal">
                     <fieldset>
                                         

                     <!--  <button type="button" style="margin-left: 3vw;" onclick="preview_form()" class="btn btn-success">
                    <span class="glyphicon glyphicon-eyes" aria-hidden="true"></span> PREVIEW FORM
                    </button> -->
                     <button type="button" style="margin-left: 3vw;*background-color: #09D261" onclick="update_customer()" class="btn btn-danger ">Update <?php echo $shop_name;?></button>
                     </fieldset>
                   </div>

                    


                   <!-- <div class="col-md-5"><button type="button" style="float: right;" onclick="submit_jobreg()" class="btn btn-secondary ">Print Preview</button></div> -->

                   
                </td>
             </tr>

          </tbody>

       </table>
       </form>
        <script type="text/javascript">
         function update_customer()
         {
          // alert("cus");
        // swal("success","Store bill inserted","success");
          var customer_id=document.getElementById("customer_id").value;
          var shop_name=document.getElementById("shop_name").value;
          var customer_name=document.getElementById('customer_name').value;
          var customer_address=document.getElementById('customer_address').value;
          var customer_place=document.getElementById('customer_place').value;
          var customer_district=document.getElementById('customer_district').value;
          var customer_state=document.getElementById('customer_state').value;
          var customer_pincode=document.getElementById('customer_pincode').value;
          var customer_mobile1=document.getElementById('customer_mobile1').value;
          var customer_mobile2=document.getElementById('customer_mobile2').value;
          var customer_email=document.getElementById('customer_email').value;
          var customer_adhar=document.getElementById('customer_adhar').value;
          var customer_license=document.getElementById('customer_license').value;
          if(customer_name=="" ||shop_name=="" )
            {       
               swal("ERROR","Enter  Name ","error");
}
else if(customer_mobile1=="" ||customer_adhar=="" ||customer_license=="" )
{swal("ERROR","Enter mobile adhar license ","error");}
else{
          // alert(customer_mobile1+customer_adhar+customer_license+customer_name);
          $.ajax(
                    {
                    type:"POST",
                    url:"update/customer_update.php",
                    // dataType:"json",
                   data:{
                    customer_id:customer_id,
                    shop_name:shop_name,
                     customer_name:customer_name,
                     customer_address:customer_address,
                     customer_place:customer_place,
                     customer_district:customer_district,
                     customer_state:customer_state,
                     customer_pincode:customer_pincode,
                     customer_mobile1:customer_mobile1,
                     customer_mobile2:customer_mobile2,
                     customer_email:customer_email,
                     customer_adhar:customer_adhar,
                     customer_license:customer_license
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                    Ccustomer_image_update();
                      
                  }    
                  });
}
         }
       </script>
         <script type="text/javascript">

         function Ccustomer_image_update()
         {
          // alert("inserting");
           var form = new FormData(document.getElementById('table_data'));
// alert(form);
                      //append files
                      var file = document.getElementById('image_id').files[0];
                      if (file)
                      {   
                        form.append('image_id', file);
                      }

                      $.ajax({
                        type: "POST",
                        url: "insert/customer_image_upload.php",
                       // dataType:"json",
                       data: form, 
                       cache: false,
                      contentType: false, //must, tell jQuery not to process the data
                      processData: false,
                      //data: $("#upload_img").serialize(),
                      success: function(data)
                      {
                       swal("success","Customer updated","success");
                     my_function('2','2');
                       
                      }
                    });

                    }

                  </script>
</body>
</html>