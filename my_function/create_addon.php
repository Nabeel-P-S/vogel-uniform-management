<?php include "../connect.php";?>
<!DOCTYPE html>

<html>

<head>
  <title>asd</title>
 
</head>
<body> <style type="text/css">
    input{
      text-transform: uppercase;
    }
  </style>
<!-- <form id="addon_form"  action="insert/addon_insert.php" enctype="multipart/form-data" onsubmit="alert('Thanks for Subscribing');" method="post"> -->
 <h1><b style="font-size:30px;color:#2196f3">Create Addon</b></h1>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                        <?php 
                        $query=mysqli_query($conn,"select addon_id from addons order by addon_id desc LIMIT 1
 ");
                        $fetch=mysqli_fetch_array($query);
                        $addon_id=$fetch['addon_id'];
                        $addon_id=$addon_id+'1';
                        ?>
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Addon Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input readonly="1" id="addon_number" name="addon_number" placeholder="Addon  Number" class="form-control" required="" value="<?php echo $addon_id ?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Addon Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="addon_name" name="addon_name" placeholder="Addon   Name" class="form-control" required="" value="" type="text"></div>
                            </div>
                         </div>

                          <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Addon Price</label>
                           
                            <div class="col-md-2">
  <input id="addon_price1" name="addon_price1" type="text" placeholder="0 to 6" class="form-control input-md">
    
  </div>
                   
                   <div class="col-md-2">
  <input id="addon_price2" name="addon_price2" type="text" placeholder="7 to 24" class="form-control input-md">
    
  </div>
  <div class="col-md-2">
  <input id="addon_price3" name="addon_price3" type="text" placeholder="25 & above" class="form-control input-md">
    
  </div>        <br><br></br>

                     <button type="button" style="margin-left: 25vw;" onclick="save_addon()" class="btn btn-primary ">Submit Addon</button>
                     <br>
                     <br> <br>
<!-- <input type="submit" style="margin-right: 20vw;width: 15vw;" class="btn btn-primary" > -->
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
       <!-- </form> -->
       <script type="text/javascript">
         function save_addon()
         {
        // swal("success","Store bill inserted","success");
          var addon_name=document.getElementById("addon_name").value;
          var addon_price1=document.getElementById('addon_price1').value;
          var addon_price2=document.getElementById('addon_price2').value;
          var addon_price3=document.getElementById('addon_price3').value;
          if(addon_name=="")
            {       
               swal("ERROR","Enter Addon Name ","error");
}
else if(addon_price1=="" ||addon_price2=="" ||addon_price3=="" )
{
  swal("ERROR","Enter Addon Price ","error");}
else{
          // alert(addon_name+addon_price1+addon_price2+addon_price3);
          $.ajax(
                    {
                    type:"POST",
                    url:"insert/addon_insert.php",
                    // dataType:"json",
                   data:{
                    addon_name:addon_name,
                     addon_price1:addon_price1,
                     addon_price2:addon_price2,
                     addon_price3:addon_price3
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                      swal("success"," Addon inserted","success");
                     my_function('1','5');
                  }    
                  });
}
         }
       </script>
       
</body>
</html>