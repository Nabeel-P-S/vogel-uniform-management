<?php include "../connect.php";
$addon_id=$_POST['addon_id'];
   $query=mysqli_query($conn,"SELECT * from addons where addon_id='$addon_id'");
                        $fetch=mysqli_fetch_array($query);
                        $addon=$fetch['addon'];
                        $addon_price1=$fetch['addon_price1'];
                        $addon_price2=$fetch['addon_price2'];
                        $addon_price3=$fetch['addon_price3'];
?>
<!DOCTYPE html>

<html>

<head>
  <title>asd</title> <style type="text/css">
    input{
      text-transform: uppercase;
    }
  </style>
 
</head>
<body>
<!-- <form id="addon_form"  action="insert/addon_insert.php" enctype="multipart/form-data" onsubmit="alert('Thanks for Subscribing');" method="post"> -->
 <h1><b style="font-size:30px;color:#2196f3"><?php echo $addon;?></b></h1>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <div class="well form-horizontal">
                      <fieldset>
                     
                         <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Addon Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input readonly="1" id="addon_id" name="addon_id" placeholder="Addon  Number" class="form-control" required="" value="<?php echo $addon_id ?>" type="text"></div>
                            </div>
                          </div>

                               <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Addon Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="addon_name" name="addon_name" placeholder="Addon   Name" class="form-control" required="" value="<?php echo $addon ?>"type="text"></div>
                            </div>
                         </div>

                          <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label field-wrapper required-field">Addon Price</label>
                           
                            <div class="col-md-2">
  <input id="addon_price1" name="addon_price1" type="text" value="<?php echo $addon_price1 ?>" placeholder="0 to 12" class="form-control input-md">
    
  </div>
                   
                   <div class="col-md-2">
  <input id="addon_price2" name="addon_price2" type="text" value="<?php echo $addon_price2 ?>" placeholder="12 to 25" class="form-control input-md">
    
  </div>
  <div class="col-md-2">
  <input id="addon_price3" name="addon_price3" type="text" value="<?php echo $addon_price3 ?>"  placeholder="25 above" class="form-control input-md">
    
  </div>        <br><br></br>

                     <button type="button" style="margin-left: 25vw;background-color: #09D261" onclick="update_addon()" class="btn btn-primary ">Update <?php echo $addon;?></button>
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
         function update_addon()
         {
        // swal("success","Store bill inserted","success");
          var addon_id=document.getElementById("addon_id").value;
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
                    url:"update/addon_update.php",
                    // dataType:"json",
                   data:{
                    addon_id:addon_id,
                    addon_name:addon_name,
                     addon_price1:addon_price1,
                     addon_price2:addon_price2,
                     addon_price3:addon_price3
                   },

                      success: function(data)
                   
                  {
                    // alert(data);
                      swal("success"," Addon Updated","success");
                     my_function('2','5');
                  }    
                  });
}
         }
       </script>
       
</body>
</html>