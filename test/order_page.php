

<?php
include"connect.php";
session_start();
 $user_id = $_SESSION["id"];
  $user_name = $_SESSION["username"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
 
}
// include"modal_form.php"
?>

<!DOCTYPE html>
<html lang="en">
<title>VOGEL UNIFORM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" type="text/css" href="w3.css" media="screen" />
<link rel="shortcut icon" href="images/logo.jpg" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert.css"><label hidden="">invalid</label>
<script src="sweetalert.min.js"></script>




<style type="text/css">

  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
  body {font-size:16px;}
  .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
  .w3-half img:hover{opacity:1}
  body{
    /*background-image: url("images/akshbk.jpg");*/
  }
 /*.form-control{
  background:lightblue;
 }
 */
 .col-md-4{
  font-size: 14px;
}

input[type="date"]::-webkit-inner-spin-button
{
  display: none;
  -webkit-appearance: none;
}

div.field-wrapper input {
  float: right;
}
div.required-field label::after { 
  content: "*";
  color: red;
}

.btn-primary-spacing 
{
  margin-right: 5px;
  margin-bottom: 5px !important;
}


</style>

<body>
  <div class="col-md-12" id="full_div" style="padding: 0vw;">
    <div class="col-md-3">
    <nav class="w3-sidebar  w3-collapse  w3-large w3-padding" style="display: none; *z-index:3;width:295px;font-weight:bold;padding-left: 0vw; background-color:  #2196f3;color:white" id="mySidebar"><br>
     <!--  <a href="#" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a> -->
<!--      <b style="color: yellow;"> Hai <?php //echo $user_name;?></b> 
 -->      <div class="w3-container">
        <a><h3 class="w3-padding-64"><b><img src="images/vogel1.jpg" ></b></h3></a>
      </div>
      <div class="w3-bar-block">
        <a href="#" onclick="home()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
        <!--  onclick="document.getElementById('create_type').style.display='block';" -->
        <a href="#"  class="w3-bar-item w3-button w3-hover-white">Add New &nbsp;   <select id="create_type" name="usertype" style="*display: none; background-color: transparent; *color: black; border-radius: 1vw;width: 10vw;*border: none;" onchange="my_function('1',this.value);">
    <option value="0">Select Type</option>
    <option value="1">ARTICLE/ITEM</option>
    <option value="2">CUSTOMER/SHOP</option>
     
    <option value="6">ORDER</option>
    <option value="3">VENDOR/FACTORY</option>
    <option value="4">ITEM CATEGORY</option>
    <option value="5">ADD ON</option>
  </select> </a> 
        <a href="#"  class="w3-bar-item w3-button w3-hover-white">View List &nbsp;     <select id="create_type" name="usertype" style="*display: none; background-color: transparent; *color: black; border-radius: 1vw;width: 10vw;*border: none;" onchange="my_function('2',this.value);">
    <option value="0">Select Type</option>
    <option value="1">ARTICLE/ITEM</option>
    <option value="2">CUSTOMER/SHOP</option>
     <option value="3">VENDOR/FACTORY</option>
     <option value="4">ITEM CATEGORY</option>
     <option value="5">ADD ON</option>
     <option value="6">ORDER</option>
      </select></a> 


        <a href="#" onclick="my_function('1','6')" class="w3-bar-item w3-button w3-hover-white">New Order</a> 
        <a href="#" onclick="my_function('2','6')" class="w3-bar-item w3-button w3-hover-white">View Orders</a> 
        <a href="display_images.php"  class="w3-bar-item w3-button w3-hover-white">Galery</a> 
         <a href="logout.php"  class="w3-bar-item w3-button w3-hover-white">LogOut &nbsp;<b style="color: yellow;"><?php echo $user_name;?></b>  </a>    

        <!-- <a href="#" onclick="add_service();" class="w3-bar-item w3-button w3-hover-white">Add Service</a> -->
        <!-- <a href="#" onclick="w3_close();register_job();" class="w3-bar-item w3-button w3-hover-white">Job Registration</a> -->

</div> </nav>
      </div>
   


  <div class="col-md-9" id="total_div" style="*margin-left: 2vw;padding: 0vw;" >

 
</div>
    </div>
    </form>
    <script type="text/javascript">
      function create_main()
      {
      // alert("create_main");
      var date_now=Date();

      $.ajax(
      {
        type:"POST",
        url:"create_main.php",
        data:{
          date_now:date_now
          
        },
        success: function(data_output)
        {
          $("#header_div").html(data_output);
          my_function('1','2');
        }   
      });  
    }
    function view_main()
    {
      var date_now=Date();

      $.ajax(
      {
        type:"POST",
        url:"view_main.php",
        data:{
          date_now:date_now
          
        },
        success: function(data_output)
        {

          $("#header_div").html(data_output);
          my_function('2','1');





        }   
      });  
    }
  </script>
  <script type="text/javascript">
    function my_function(flow,value)
    {
    // alert( flow);
// var date_now='4';
          if (flow=='1'&& value=='1')
          {

            url="my_function/create_item.php"; 
            
          }
          if (flow=='1'&& value=='2')
          {
            url="my_function/create_customer.php"; 
            
          }
          if (flow=='1'&& value=='3')
          {
            url="my_function/create_factory.php"; 
            
          }
          if (flow=='1'&& value=='4')
          {
            url="my_function/create_item_category.php"; 
            
          }
          if (flow=='1'&& value=='5')
          {
            url="my_function/create_addon.php"; 
            
          }
          if (flow=='1'&& value=='6')
          {
            url="my_function/create_order.php";

            


            
          }
          if (flow=='2'&& value=='2')
          {
            url="view/view_customers.php"; 
            
          }
          if (flow=='2'&& value=='1')
          {
            url="view/view_items.php"; 
            
          }
          if (flow=='2'&& value=='3')
          {
            url="view/view_factories.php"; 
            
          }
          if (flow=='2'&&  value=='4')
          {
            url="view/view_categories.php"; 
            
          }
          if (flow=='2'&& value=='5')
          {
            url="view/view_addons.php"; 
            
          }
          if (flow=='2'&& value=='6')
          {
            url="view/view_orders.php";   
            
          }
          {
            var date_now=Date();

            $.ajax(
            {
              type:"POST",
              url:url,
              data:{
                date_now:date_now
                
              },
              success: function(data_output)
              {
                // $("#display_div").html(data_output);
                $("#total_div").html(data_output);


              }   
            });  
          }
  }
</script>
<script type="text/javascript">
  function home()
  {

   var date_now=Date();

   $.ajax(
   {
    type:"POST",
    url:"home.php",
    data:{
      date_now:date_now

    },
    success: function(data_output)
    {

    $("#total_div").html(data_output);
    }   
  });  
   

   

 }
</script>
<script>
  // window.onload=home();
  window.onload=my_function(2,6);


</script>

</body>
</html>
