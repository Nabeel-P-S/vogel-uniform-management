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
   <h1><b style="font-size:30px;color:#2196f3">Create Item Category</b></h1>
<form id="item_category" enctype="multipart/form-data">
<?php 
                        $query=mysqli_query($conn,"select category_id from item_categories order by category_id desc LIMIT 1
 ");
                        $fetch=mysqli_fetch_array($query);
                        $category_id=$fetch['category_id'];
                        $category_id=$category_id+'1';
                        ?>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Category  Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="fullName" name="fullName" placeholder="Category  Number" class="form-control" readonly="1" required="" value="<?php echo $category_id;?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Category Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="category_name" name="category_name" placeholder="Category  Name" class="form-control" required="" value="" type="text"></div>
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
                     <button type="button" style="margin-left: 13vw;" onclick="save_category()" class="btn btn-primary ">Submit Category</button>

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
         function save_category()
         {
          var category_name=document.getElementById('category_name').value;
           if(category_name=="")
            {       
               swal("ERROR","Enter Category Name ","error");
             }
else{
              $.ajax(
                    {
                    type:"POST",
                    url:"insert/category_insert.php",
                    // dataType:"json",
                   data:{
                    category_name:category_name
                    
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                      swal("success","  Item Category added","success");
                     my_function('1','4');
                  }    
                  });}
         }
       </script>
</body>
</html>