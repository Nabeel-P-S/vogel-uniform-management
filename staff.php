<?php
ob_start();
include"connect.php";
session_start();
 $user_id = $_SESSION["id"];
  $user_name = $_SESSION["username"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
 
}


?>

<!DOCTYPE html>
<html lang="en">
<title>VOGEL UNIFORM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">




<!-- 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

<link rel="stylesheet" type="text/css" href="w3.css" media="screen" /> -->
<link rel="shortcut icon" href="images/logo.jpg" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css"><label hidden="">invalid</label>
<script src="js/sweetalert.min.js"></script>




<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="css/w3.css">  

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"> <!-- Google font loading -->
<!-- <link rel="stylesheet" type="text/css" href="w3.css" media="screen" /> -->
<!-- <link rel="shortcut icon" href="images/logo.jpg" /> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- importance entha -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->  <!-- yyy -->

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="js/bootstrap.min.js"></script> -->
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">   <!-- very important bootstrap css file -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>




<style type="text/css">

  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif !important;} 
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
  <div class="row" id="full_div" style="padding: 0vw;">


    <div class="col-md-2" style="border: 1px solid;background-color: <?php if ($user_name=="admin") echo "#3F0E40"; else echo "#03384a"; ?> ;color: white;height: 100vh;">
      <nav id="mySidebar"><br>
 

<div class="w3-bar-block">
 <label style="color: yellow;padding-left: 1vw;">WELCOME &nbsp; <?php echo $user_name; ?></label>
 <div class="w3-container" style="display: <?php if ($user_name=="admin") echo "none"; else echo "block"; ?> ;">
  <a><h3 ><b><img src="images/vogel1.jpg" style="width: 143px;height: 140px;"></b></h3></a>

</div>
<div style="display: <?php if ($user_name=="admin") echo "none"; else echo "block"; ?>; ">
 <a href="#" onclick="my_function('1','1')" class="w3-bar-item w3-button w3-hover-white">Create Item</a> 
 <a href="#" onclick="my_function('2','1')" class="w3-bar-item w3-button w3-hover-white">View Item</a> 
</div>


  <!-- <a href="#" onclick="print_purchase();" class="w3-bar-item w3-button w3-hover-white">Print Purchase order</a>  -->

  <a href="logout.php"  class="w3-bar-item w3-button w3-hover-white">LogOut &nbsp;<b style="color: yellow;"><?php echo $user_name;?></b>  </a>    

</div> </nav>
</div>



                                    <div class="col-md-10" id="total_div" style="padding-left: 1vw;padding-right: 1vw;">
                                  <!-- //MAIN DIV // -->
 
                                    </div>
    </div>
    
    </body>
    <script type="text/javascript">
      function create_main()
      {
    
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
            url="my_function/create_factory1.php"; 
            
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
            if (flow=='1'&& value=='7')
          {
            url="my_function/create_fabric.php";
          }
            if (flow=='1'&& value=='8')
          {
            url="my_function/create_color.php";
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
            if (flow=='2'&& value=='7')
          {
            url="view/view_fabric.php";   
            
          }
            if (flow=='2'&& value=='8')
          {
            url="view/view_colors.php";   
            
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
  function search_order()
   {
            var date_now=Date();

            $.ajax(
            {
              type:"POST",
              url:"search_order.php",
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
<script type="text/javascript">
  function indexpage()
  {

   var date_now=Date();

   $.ajax(
   {
    type:"POST",
    url:"indexpage.php",
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
  window.onload=<?php  if ($user_name=="admin") echo "my_function('2','6')"; else echo "my_function(1,1)"; ?>;
 
</script>


</html>
