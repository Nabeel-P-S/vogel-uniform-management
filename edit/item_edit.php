
<?php include "../connect.php";
$item_id=$_POST['item_id'];
$query=mysqli_query($conn,"SELECT * from items where item_id='$item_id'");
$fetch=mysqli_fetch_array($query);
$item_name=$fetch['item_name'];
$item_no=$fetch['item_no'];
$item_details=$fetch['item_details'];
$item_category_id=$fetch['item_category_id'];
$item_image=$fetch['item_image'];
$item_cost1=$fetch['item_cost1'];
$item_cost2=$fetch['item_cost2'];
$item_cost3=$fetch['item_cost3'];




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
   <h1><b style="font-size:30px;color:#2196f3"><?php echo $item_name;?></b></h1>
  <form id="table_data"  method="post" enctype="multipart">


    <table class="table table-striped">
      <tbody>
       <tr>
        <td colspan="1">
         <div class="well form-horizontal">
          <fieldset>
           <div class="form-group field-wrapper required-field">
            <label class="col-md-4 control-label field-wrapper required-field">Article   Number</label>
            <div class="col-md-8 inputGroupContainer">
             <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="item_id" name="item_id" placeholder="Shop Number" class="form-control" readonly="1" value="<?php echo $item_id;  ?>" type="text"></div>
           </div>
         </div>
    <div class="form-group field-wrapper required-field">
            <label class="col-md-4 control-label field-wrapper required-field">Article  vogel  Number</label>
            <div class="col-md-8 inputGroupContainer">
             <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input id="item_no" name="item_no" placeholder="Shop Number" class="form-control" required="" value="<?php echo $item_no;  ?>" type="text"></div>
           </div>
         </div>
         <div class="form-group field-wrapper required-field">
          <label class="col-md-4 control-label field-wrapper required-field">Article Name</label>
          <div class="col-md-8 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="item_name" name="item_name" placeholder="Full Name" class="form-control" required=""  value="<?php echo $item_name;  ?>" type="text"></div>
         </div>
       </div>

<div class="form-group field-wrapper required-field">
          <label class="col-md-4 control-label field-wrapper required-field">Article Description</label>
          <div class="col-md-8 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="item_details" name="item_details" placeholder="description" class="form-control" required="" value="<?php echo $item_details;  ?>" type="text"></div>
         </div>
       </div>

       <div class="form-group">
        <label class="col-md-4 control-label">Article Category</label>
        <div class="col-md-8 inputGroupContainer">
         <div class="input-group"><span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>

          <select class="selectpicker form-control" id="item_category" name="item_category">
            <option style="color: grey" value="" >select Category</option>
           <?php  
           $query=mysqli_query($conn,"SELECT category_id,Category from item_categories");
           while($fetch=mysqli_fetch_array($query))
           {
           
             $category_id=$fetch ['category_id']
             ?>;
            <option  value="<?php echo  $category_id  ?>" <?php if( $category_id==$item_category_id) { echo 'selected';}?> ><?php echo $fetch ['Category'] ?> </option>
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
               <input id="item_price1" style="width: 6vw;" name="item_price1" type="text" placeholder="0 to 12"  value="<?php echo $item_cost1;  ?>" class="form-control input-md">

      </td>
<td>
          <input id="item_price2" style="width: 6vw;" name="item_price2" type="text" placeholder="12 to 25"  value="<?php echo $item_cost2;  ?>" class="form-control input-md">
     
      </td>
<td>
              <input id="item_price3" style="width: 6vw;" name="item_price3" type="text" placeholder="25 above"  value="<?php echo $item_cost3;  ?>" class="form-control input-md">
 
      </td>

    </tr></table>
   
     
   </div>
 </div>

 <br>
 <!-- ============================== -->

 <!-- =============================== -->




 <div>
   <label class="col-md-4 control-label">Article Image</label>
   <div class="col-md-8">
    <!-- <input type="text" name="item_id" id="item_id" value="" style="display:none;"> -->
    <input type="file" id="image_id" name="image_id"  onchange="view_image();">
  </div>
  <!-- <input type="submit" onclick="ValidateFileUpload1()"> -->
</div>

                      
                        </fieldset>
                      </div>
                    </td>
                    <td colspan="1">
                     <div class="well form-horizontal">
                      <fieldset>

                       <img src="item_images/<?php echo $item_image?>" id="image_preview" alt=""   width="150" style="*margin-left: 2vw;margin-top: 2vw;"> 



                     </fieldset>
                   </div>
                






                </td>
              </tr>

            </tbody>

          </table>
        
                      <button type="button" style="margin-left: 23vw;background-color: #09D261" onclick="update_item()" class="btn btn-primary ">Update <?php echo $item_name;?></button>
             
        </form>


        <script type="text/javascript">
          function view_image()
          {
            document.getElementById("image_preview").src= URL.createObjectURL(event.target.files[0]);

          }
        </script>
        <script type="text/javascript">
          function update_item()
          {

            var item_no=document.getElementById("item_no").value;
            var item_id=document.getElementById("item_id").value;
            var item_name=document.getElementById("item_name").value;
            var item_details=document.getElementById("item_details").value;
            var item_category=document.getElementById("item_category").value;
            var item_price1=document.getElementById("item_price1").value;
            var item_price2=document.getElementById("item_price2").value;
            var item_price3=document.getElementById("item_price3").value;
             // alert(item_id+item_name);
            $.ajax(
            {
              type:"POST",
              url:"update/item_update.php",
              // dataType:"json",
              data:{
                item_id:item_id,
                item_no:item_no,
                item_details:item_details,
                item_name:item_name,
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
                       image_insert();

                     }    
                   });

          }
        </script>
        <script type="text/javascript">

         function image_insert()
         {
           var form = new FormData(document.getElementById('table_data'));
                      //append files
                      var file = document.getElementById('image_id').files[0];
                      if (file)
                      {   
                        form.append('image_id', file);
                      }

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
                        swal("success","Item Updated","success");

                        my_function('2','1');

                      }
                    });

                    }

                  </script>
                </body>
                </html>