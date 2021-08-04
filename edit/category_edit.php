<?php include "../connect.php";
$category_id=$_POST['category_id'];
$query=mysqli_query($conn,"SELECT * from item_categories where category_id='$category_id'");
$fetch=mysqli_fetch_array($query);
$category=$fetch['category'];
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
   <h1><b style="font-size:30px;color:#2196f3"><?php echo $category;?></b></h1>
<form id="item_category" enctype="multipart/form-data">

       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Category  Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="category_id" name="category_id" placeholder="Category  Number" class="form-control" readonly="1" required="" value="<?php echo $category_id;?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Category Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="category_name" name="category_name" placeholder="Category  Name" class="form-control" required="" value="<?php echo $category;?>" type="text"></div>
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
                     <button type="button" style="margin-left: 13vw;" onclick="update_category()" class="btn btn-primary ">Update  <?php echo  $category;?></button>

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
         function update_category()
         {
          var category_name=document.getElementById('category_name').value;
          var category_id=document.getElementById('category_id').value;
           if(category_name=="")
            {       
               swal("ERROR","Enter Category Name ","error");
             }
else{
              $.ajax(
                    {
                    type:"POST",
                    url:"update/category_update.php",
                    // dataType:"json",
                   data:{
                    category_id:category_id,
                    category_name:category_name
                    
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                      swal("success","Category Updated","success");
                     my_function('2','4');
                  }    
                  });}
         }
       </script>
</body>
</html>