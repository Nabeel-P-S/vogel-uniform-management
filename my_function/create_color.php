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
   <h1><b style="font-size:30px;color:#2196f3">Create Colour</b></h1>
<form id="item_category" enctype="multipart/form-data">
<?php 
                        $query=mysqli_query($conn,"select color_id from colors order by color_id desc LIMIT 1
 ");
                        $fetch=mysqli_fetch_array($query);
                        $color_id=$fetch['color_id'];
                        $color_id=$color_id+'1';
                        ?>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Colour Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="fullName" name="fullName" placeholder="Color  Number" readonly="1" class="form-control" required="" value="<?php echo $color_id;?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Colour Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="color" name="color" placeholder="colour  Name" class="form-control" required="" value="" type="text"></div>
                            </div>
                         </div>

              <br>                    
                 <button type="button" style="margin-left: 13vw;" onclick="save_category()" class="btn btn-primary ">Submit colour </button>

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
         function save_category()
         {
          var color=document.getElementById('color').value;
           if(color=="")
            {       
               swal("ERROR","Enter colour Name ","error");
             }
else{
              $.ajax(
                    {
                    type:"POST",
                    url:"insert/color_insert.php",
                   data:{
                    color:color
                    
                   },

                      success: function(data)
                   
                  {
                      swal("success","  Item colour added","success");
                     my_function('1','8');
                  }    
                  });}
         }
       </script>
</body>
</html>