<?php include "../connect.php";
$fabric_id=$_POST['fabric_id'];
$query=mysqli_query($conn,"SELECT * from fabrics where fabric_id='$fabric_id'");
$fetch=mysqli_fetch_array($query);
$fabric=$fetch['fabric'];
$fabric_price=$fetch['fabric_price'];
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
   <h1><b style="font-size:30px;color:#2196f3"><?php echo $fabric;?></b></h1>
<form id="item_category" enctype="multipart/form-data">

       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Fabric  Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="fabric_id" name="fabric_id" placeholder="Category  Number" readonly="1" class="form-control" required="" value="<?php echo $fabric_id;?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Fabric Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fabric_name" name="fabric_name" placeholder="Category  Name" class="form-control" required="" value="<?php echo $fabric;?>" type="text"></div>
                            </div>
                         </div>

                                 <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Fabric Price</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fabric_price" name="fabric_price" placeholder="Category  Name" class="form-control" required="" value="<?php echo $fabric_price;?>" type="text"></div>
                            </div>
                         </div>
                        <!--  <div class="form-group">
                            <label class="col-md-4 control-label">City</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="city" name="city" placeholder="City" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div> -->
                         
                       
                         <!-- <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label">Date Of Birth</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input type="date" id="dob" name="dob" placeholder="Dob" class="form-control" required="true" value="" type="date"></div>
                            </div>
                         </div> -->
<br>
                          <!-- <button type="button" style="margin-left: 10vw;" onclick="preview_form()" class="btn btn-success">
                    <span class="glyphicon glyphicon-eyes" aria-hidden="true"></span> PREVIEW FORM
                    </button> -->
                     <button type="button" style="margin-left: 13vw;" onclick="update_fabric()" class="btn btn-primary ">Update  <?php echo  $fabric;?></button>

                      </fieldset>
                   </div>
                </td>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                        
                          
   
                     
                         
                      </fieldset>
                   </div>
                   

                    


                   <!-- <div class="col-md-5"><button type="button" style="float: right;" onclick="submit_jobreg()" class="btn btn-secondary ">Print Preview</button></div> -->

                   
                </td>
             </tr>

          </tbody>

       </table>
       </form>
       <script type="text/javascript">
         function update_fabric()
         {
          var fabric=document.getElementById('fabric_name').value;
          var fabric_id=document.getElementById('fabric_id').value;
          var fabric_price=document.getElementById('fabric_price').value;
           if(fabric=="")
            {       
               swal("ERROR","Enter fabric Name ","error");
             }
else{
              $.ajax(
                    {
                    type:"POST",
                    url:"update/fabric_update.php",
                    // dataType:"json",
                   data:{
                    fabric_id:fabric_id,
                    fabric_price:fabric_price,
                    fabric:fabric
                    
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                      swal("success","  fabric Updated","success");
                     my_function('2','7');
                  }    
                  });}
         }
       </script>
</body>
</html>