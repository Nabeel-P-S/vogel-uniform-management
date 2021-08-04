

<?php
include"connect.php";
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
    background-image: url("images/akshbk.jpg");
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
  <div class="col-md-12" id="full_div">
    <div class="col-md-3">
    <nav class="w3-sidebar  w3-collapse  w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;background-color:  #2196f3;color:white" id="mySidebar"><br>
      <a href="#" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
      <div class="w3-container">
        <a><h3 class="w3-padding-64"><b><img src="images/vogel1.jpg" ></b></h3></a>
      </div>
      <div class="w3-bar-block">
        <a href="#" onclick="home()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
        <a href="#" onclick="create_main()" class="w3-bar-item w3-button w3-hover-white">Add New</a> 
        <a href="#" onclick="view_main()"class="w3-bar-item w3-button w3-hover-white">View List</a> 


        <a href="#" onclick="my_function('1','6')" class="w3-bar-item w3-button w3-hover-white">New Order</a> 
        <a href="#" onclick="my_function('2','6')" class="w3-bar-item w3-button w3-hover-white">View Orders</a> 
        <!-- <a href="#" onclick="add_service();" class="w3-bar-item w3-button w3-hover-white">Add Service</a> -->
        <!-- <a href="#" onclick="w3_close();register_job();" class="w3-bar-item w3-button w3-hover-white">Job Registration</a> -->

</div> </nav>
      </div>
   

    <!-- <div id="test"></div> -->
    
<div class="col-md-9" id="total_div" style="background-color: yellow;">
    <div id="header_div" class="col-md-3" style="margin-top: .6vw; float: right;">
    </div>
    <!-- <div class="container" style="float: right; height: 90%;"> -->
 
      <div class="col-md-9"  style="height: 95%; float: right; margin-right: 2vw; margin-top: .6vw;width: 75%;background-color: red; " id="display_div">

      </div>
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

          if (flow=='1'&& value=='1')
          {

            url="my_function/create_item.php"; div="#display_div";
            
          }
          if (flow=='1'&& value=='2')
          {
            url="my_function/create_customer.php"; div="#display_div";
            
          }
          if (flow=='1'&& value=='3')
          {
            url="my_function/create_factory.php"; div="#display_div";
            
          }
          if (flow=='1'&& value=='4')
          {
            url="my_function/create_item_category.php"; div="#display_div";
            
          }
          if (flow=='1'&& value=='5')
          {
            url="my_function/create_addon.php"; div="#display_div";
            
          }
          if (flow=='1'&& value=='6')
          {
            url="my_function/create_order.php";

             div="#total_div";


            
          }
          if (flow=='2'&& value=='2')
          {
            url="view/view_customers.php"; div="#display_div";
            
          }
          if (flow=='2'&& value=='1')
          {
            url="view/view_items.php"; div="#display_div";
            
          }
          if (flow=='2'&& value=='3')
          {
            url="view/view_factories.php"; div="#display_div";
            
          }
          if (flow=='2'&&  value=='4')
          {
            url="view/view_categories.php"; div="#display_div";
            
          }
          if (flow=='2'&& value=='5')
          {
            url="view/view_addons.php"; div="#display_div";
            
          }
          if (flow=='2'&& value=='6')
          {
            url="view/view_orders.php";   div="#total_div";
            
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
                $(div).html(data_output);


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

      $("#header_div").html(" ");
      $("#display_div").html(data_output);

    }   
  });  
   

   

 }
</script>
<script>
  window.onload=home();
</script>

</body>
</html>
