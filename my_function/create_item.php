
<?php include "../connect.php";?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

  <style type="text/css">
    input{
      text-transform: uppercase;
    }
  </style>
</head>
<body>
   <h1><b style="font-size:30px;color:#2196f3">Create Item</b></h1>
  <form id="table_data"  method="post" enctype="multipart">

    <?php 
    $query=mysqli_query($conn,"select item_id from items order by item_id desc LIMIT 1
     ");
    $fetch=mysqli_fetch_array($query);
    $item_id=$fetch['item_id'];
    
    if ($item_id==null)
    {
      $item_id='1000';
    } 
    else
    {
      $item_id=$item_id+'1';
    }
    ?>
    <table class="table table-striped">
      <tbody>
       <tr>
        <td colspan="2">
         <div class="well form-horizontal">
          <fieldset>
           <div class="form-group field-wrapper required-field">
            <label class="col-md-4 control-label field-wrapper required-field">Article  Number</label>
            <div class="col-md-8 inputGroupContainer">
             <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="item_id" name="item_id" placeholder="Shop Number" class="form-control" readonly="1"  value="<?php echo $item_id;  ?>" type="text"></div>
           </div>
         </div>
<div class="form-group field-wrapper required-field">
            <label class="col-md-4 control-label field-wrapper required-field">Article  vogel No</label>
            <div class="col-md-8 inputGroupContainer">
             <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="item_no" name="item_no" placeholder="vogel number" class="form-control"   type="number"></div>
           </div>
         </div>
         <div class="form-group field-wrapper required-field">
          <label class="col-md-4 control-label field-wrapper required-field">Article Name</label>
          <div class="col-md-8 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="item_name" name="item_name" placeholder="Full Name" class="form-control"  type="text"></div>
         </div>
       </div>
<div class="form-group field-wrapper">
          <label class="col-md-4 control-label field-wrapper required-field">Article Description</label>
          <div class="col-md-8 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="item_details" name="item_details" placeholder="Description" class="form-control"  type="text"></div>
         </div>
       </div>



       <div class="form-group field-wrapper required-field">
        <label class="col-md-4 control-label">Article Category</label>
        <div class="col-md-8 inputGroupContainer">
         <div class="input-group"><span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>

          <select class="selectpicker form-control" id="item_category" name="item_category">
            <option style="color: grey" value="" >select Category</option>
           <?php  
           $query=mysqli_query($conn,"SELECT category_id,Category from item_categories");
           while($fetch=mysqli_fetch_array($query))
           {
            ?>
            <option value="<?php echo $fetch ['category_id']; ?>"><?php echo $fetch ['Category'] ?> </option>
            <?php
          }
          ?>


        </select>
      </div>
    </div>
  </div>




  <div class="form-group">
    <label class="col-md-4 control-label">Article Cost</label>
    <div class="col-md-8 inputGroupContainer">
   
      <table><tr>
        <td>
               <input id="item_price1" style="width: 6vw;" name="item_price1" type="text" placeholder="0 to 6" class="form-control input-md">

      </td>
<td>
          <input id="item_price2" style="width: 6vw;" name="item_price2" type="text" placeholder="7 to 24" class="form-control input-md">
     
      </td>
<td>
              <input id="item_price3" style="width: 6vw;" name="item_price3" type="text" placeholder="25 & above" class="form-control input-md">
 
      </td>

    </tr></table>
   
     
   </div>
 </div>
 <div class="well form-horizontal">
                     <fieldset>

  
                      <button type="button" style="margin-left: 15vw;" onclick="save_item()" class="btn btn-primary ">SAVE ITEM</button>
                    </fieldset>
                  </div>
 <br>
 <!-- ============================== -->

 <!-- =============================== -->




 

                         <!-- <div class="form-group field-wrapper required-field">
                            <label class="col-md-4 control-label">Date Of Birth</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input type="date" id="dob" name="dob" placeholder="Dob" class="form-control" required="true" value="" type="date"></div>
                            </div>
                          </div> -->
                        </fieldset>
                      </div>
                    </td>
                    <td colspan="1">
                     <div class="well form-horizontal">
                      <fieldset>

                       <img src="images/profile.png" id="image_preview" alt=""   width="150" style="margin-left: 4vw;margin-top: 2vw;"> 



                     </fieldset>
                   </div>
                  

                   <!--    <button type="button" style="margin-left: 3vw;" onclick="preview_form()" class="btn btn-success">
                        <span class="glyphicon glyphicon-eyes" aria-hidden="true"></span> PREVIEW FORM
                      </button> -->





                  <!-- <div class="col-md-5"><button type="button" style="float: right;" onclick="submit_jobreg()" class="btn btn-secondary ">Print Preview</button></div> -->

<div>
   <div >
    <!-- <input type="text" name="item_id" id="item_id" value="" style="display:none;"> -->
    <input style="margin-left: 5vw;width: 6.5VW;" type="file" id="image_id" name="image_id"  onchange="view_image();">
  </div>
  <!-- <input type="submit" onclick="ValidateFileUpload1()"> -->
</div></td></tr>
            </tbody>

          </table>
        </form>


        <script type="text/javascript">
          function view_image()
          {
            document.getElementById("image_preview").src= URL.createObjectURL(event.target.files[0]);

          }
        </script>
        <script type="text/javascript">
          function save_item()
          {
            var item_no=document.getElementById("item_no").value;
            var item_name=document.getElementById("item_name").value;
            var item_details=document.getElementById("item_details").value;
            var item_category=document.getElementById("item_category").value;
            var item_price1=document.getElementById("item_price1").value;
            var item_price2=document.getElementById("item_price2").value;
            var item_price3=document.getElementById("item_price3").value;
            
            if(item_no=="")
            {       
               swal("ERROR","Enter Vogel No ","error");
             }
             
             else if(item_name=="")
            {       
               swal("ERROR","Enter item Name ","error");
             }
             
               else if(item_category=="")
            {       
               swal("ERROR","Select Item_category ","error");
             }
else{
            $.ajax(
            {
              type:"POST",
              url:"insert/item_insert.php",
              // dataType:"json",
              data:{
                item_no:item_no,
                item_name:item_name,
                item_details:item_details,
                item_category:item_category,
                item_price1:item_price1,
                item_price2:item_price2,
                item_price3:item_price3
              },

              success: function(data)

              {
                    // alert(data);

                    // document.getElementById('item_id').value=data.item_id;
                       // alert(data.item_id);
                       item_image_insert();

                     }    
                   });



          }

          }
        </script>
       <script type="text/javascript">

         function item_image_insert()
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
// alert(file);
                      $.ajax({
                        type: "POST",
                        url: "insert/image_upload.php",
                       // dataType:"json",
                       data: form, 
                       cache: false,
                      contentType: false, //must, tell jQuery not to process the data
                      processData: false,
                      //data: $("#upload_img").serialize(),
                      success: function(data)
                      {
                      // alert(data);
                        swal("success","item inserted ","success");
                        my_function('1','1');

                      }
                    });

                    }

                  </script>
                </body>
                </html>