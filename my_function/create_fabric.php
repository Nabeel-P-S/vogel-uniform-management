<?php include "../connect.php";?>
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
   <h1><b style="font-size:30px;color:#2196f3">Create Fabric material</b></h1>
<form id="item_category" enctype="multipart/form-data">
<?php 
                        $query=mysqli_query($conn,"select fabric_id from fabrics order by fabric_id desc LIMIT 1
 ");
                        $fetch=mysqli_fetch_array($query);
                        $fabric_id=$fetch['fabric_id'];
                        $fabric_id=$fabric_id+'1';
                        ?>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Fabric Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="fabric_id" name="fabric_id" placeholder="Fabric  Number" readonly="1" class="form-control" required="" value="<?php echo $fabric_id;?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">fabric Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fabric_name" name="fabric_name" placeholder="Fabric  Name" class="form-control" required="" value="" type="text"></div>
                            </div>
                         </div>

                              <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">fabric Price</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fabric_price" name="fabric_price" placeholder="Fabric Price" class="form-control" required="" value="" type="text"></div>
                            </div>
                         </div>
                       
<br>
                       
                     <button type="button" style="margin-left: 13vw;" onclick="save_fabric()" class="btn btn-primary ">Submit fabric</button>

                      </fieldset>
                   </div>
                </td>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                                            
                                         
                      </fieldset>
                   </div>
                   
                                              
                </td>
             </tr>

          </tbody>

       </table>
       </form>
       <script type="text/javascript">
         function save_fabric()
         {
          var fabric_name=document.getElementById('fabric_name').value;
          var fabric_price=document.getElementById('fabric_price').value;
           if(fabric_name=="" || fabric_price=="")
            {       
               swal("ERROR","Enter Category Name ","error");
             }
else{
              $.ajax(
                    {
                    type:"POST",
                    url:"insert/fabric_insert.php",
                    // dataType:"json",
                   data:{
                    fabric_name:fabric_name,
                    fabric_price:fabric_price
                    
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                      swal("success","  Fabric added","success");
                     my_function('1','7');
                  }    
                  });}
         }
       </script>
</body>
</html>