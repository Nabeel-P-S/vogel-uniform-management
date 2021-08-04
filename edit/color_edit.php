<?php include "../connect.php";
$color_id=$_POST['color_id'];
$query=mysqli_query($conn,"SELECT * from colors where color_id='$color_id'");
$fetch=mysqli_fetch_array($query);
$color=$fetch['color'];
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
   <h1><b style="font-size:30px;color:#2196f3"><?php echo $color;?></b></h1>
<form id="item_category" enctype="multipart/form-data">

       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">color  Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="color_id" name="color_id" placeholder="Category  Number" class="form-control" required="" value="<?php echo $color_id;?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">color Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="color" name="color" placeholder="Category  Name" class="form-control" required="" value="<?php echo $color;?>" type="text"></div>
                            </div>
                         </div>

                  
<br>
           
                     <button type="button" style="margin-left: 13vw;" onclick="update_category()" class="btn btn-primary ">Update  <?php echo  $color;?></button>

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
          var color=document.getElementById('color').value;
          var color_id=document.getElementById('color_id').value;
           if(color=="")
            {       
               swal("ERROR","Enter color Name ","error");
             }
else{
              $.ajax(
                    {
                    type:"POST",
                    url:"update/color_update.php",
                    // dataType:"json",
                   data:{
                    color_id:color_id,
                    color:color
                    
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                      swal("success","  color Updated","success");
                     my_function('2','8');
                  }    
                  });}
         }
       </script>
</body>
</html>