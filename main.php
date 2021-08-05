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
else if ($user_id!=1)
{
  header("location: staff.php");
}

?>
<?php

include"connect.php";

$sql1="SELECT COUNT(order_id) as orders FROM orders";
$sql2="SELECT COUNT(customer_id) as customers FROM customers";
$sql3="SELECT COUNT(item_id) as items FROM items";
$sql4="SELECT COUNT(vendor_id) as vendors FROM vendors";
$sql5="SELECT COUNT(color_id) as colors FROM colors";
$sql6="SELECT COUNT(category_id) as item_categories FROM item_categories";
$sql7="SELECT COUNT(addon_id) as addons FROM addons";
$query1=mysqli_query($conn,$sql1);
$query2=mysqli_query($conn,$sql2);
$query3=mysqli_query($conn,$sql3);
$query4=mysqli_query($conn,$sql4);
$query5=mysqli_query($conn,$sql5);
$query6=mysqli_query($conn,$sql6);
$query7=mysqli_query($conn,$sql7);
$fetch1=mysqli_fetch_array($query1);
$fetch2=mysqli_fetch_array($query2);
$fetch3=mysqli_fetch_array($query3);
$fetch4=mysqli_fetch_array($query4);
$fetch5=mysqli_fetch_array($query5);
$fetch6=mysqli_fetch_array($query6);
$fetch7=mysqli_fetch_array($query7);
$orders=$fetch1["orders"];
$customers=$fetch2["customers"];
$items=$fetch3["items"];
$vendors=$fetch4["vendors"];
$colors=$fetch5["colors"];
$categories=$fetch6["item_categories"];
$addons=$fetch7["addons"];

?>
<!DOCTYPE html>
<html lang="en">
<title>VOGEL UNIFORM</title>
<style type="text/css">
  input
  {
text-transform: uppercase;
  }
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/logo.jpg" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css"><label hidden="">invalid</label>
<script src="js/sweetalert.min.js"></script>
<script src="js/popper.min.js"></script>
<link rel="stylesheet" href="css/w3.css">  
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- importance entha -->
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">   <!-- very important bootstrap css file -->

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


    <div class="col-md-2" style="border: 1px solid;background-color:#03384a;color: white;height: 100vh;">
      <nav id="mySidebar"><br>
 

<div class="w3-bar-block">
  <!-- <label style="color: yellow;padding-left: 1vw;">WELCOME &nbsp; <?php echo $user_name; ?></label> -->
  <div> 
<!--     <img src="images/search1.png" style="text-align: left;" onclick="search_order();">
 --><i class="glyphicon glyphicon-search w3-hover-white 3-button" style="margin-left: 2vw;font-size: 1.5vw;" onclick="search_order();" ></i>
    <a style="padding-left: 3vw;" href="logout.php"  ><b style="color: yellow;"><?php echo $user_name;?></b> &nbsp;  LogOut  </a> </div>  
 <div class="w3-container" style="display: <?php if ($user_name=="user") echo "none"; else echo "block"; ?> ;">
  <a><h3 ><b><img src="images/vogel1.jpg" style="width: 143px;height: 140px;"></b></h3></a>

</div>
<div style="display: <?php if ($user_name=="user") echo "none"; else echo "block"; ?>; ">
 <a href="#" onclick="my_function('1','1')" class="w3-bar-item w3-button w3-hover-white">Create Item</a> 
 <a href="#" onclick="my_function('2','1')" class="w3-bar-item w3-button w3-hover-white">View Item</a> 
</div>
<div style="display: <?php if ($user_name=="user") echo "block"; else echo "none"; ?>; ">
   <!--  <a  onclick="search_order();"  class="w3-bar-item w3-button w3-hover-white">Search</a>  -->

<div style="*background-color: rgb(63, 14, 81,0.4);*border: 1px solid"> 
 <a href="#" onclick="my_function('1','1')" class="w3-bar-item w3-button w3-hover-yellow">Create Item</a> 
  <a href="#" onclick="my_function('1','2')" class="w3-bar-item w3-button w3-hover-pink">Create Shop</a> 
  <a href="#" onclick="my_function('1','3')" class="w3-bar-item w3-button w3-hover-light-green">Create Factory</a> 
  <a href="#" onclick="my_function('1','4')" class="w3-bar-item w3-button w3-hover-red">Create Category</a> 
  <a href="#" onclick="my_function('1','5')" class="w3-bar-item w3-button w3-hover-light-blue">Create Addon</a> 
  <a href="#" onclick="my_function('1','7')" class="w3-bar-item w3-button w3-hover-white">Create Fabric</a> 
  <a href="#" onclick="my_function('1','8')" class="w3-bar-item w3-button w3-hover-yellow">Create Color</a> 
     <a   href="#" onclick="my_function('1','6')" class="w3-bar-item w3-button w3-hover-black">Create Order</a> 

 </div>
 <!--  <select id="create_type" name="usertype" style=" color: black;margin-left: 12px;border-radius: 5px;font-weight: bold;padding-left: 1px;height: 2.5vw;"  onchange="my_function('2',this.value);">
    <option style="color: #3F0E40;" value="0"><b>VIEW</b></option>
 
    <option value="4">ITEM CATEGORY</option>
    <option value="5">ADD ON</option>
    <option value="7">FABRICS</option>
    <option value="8">COLORS</option>
  </select> -->



  <a style="border: 1px solid;margin-top: 1vw; " href="#" onclick="my_function('2','6')" class="w3-bar-item w3-button w3-hover-yellow">ORDERS :  <?php echo $orders?></a> 
   <a style="border: 1px solid green;margin-top: .3vw;" href="#" onclick="my_function('2','1')" class="w3-bar-item w3-button w3-hover-green">ITEMS : <?php echo $items;?></a> 
 <a  style="border: 1px solid yellow;margin-top: .4vw;" href="#" onclick="my_function('2','2')" class="w3-bar-item w3-button w3-hover-light-blue">SHOPS : <?php echo $customers;?></a> 
 <a style="border: 1px solid pink;margin-top: .3vw;" href="#" onclick="my_function('2','3')" class="w3-bar-item w3-button w3-hover-white">FACTORIES : <?php echo $vendors?></a> 
 <a style="border: 1px solid pink;margin-top: .3vw;" href="#" onclick="my_function('2','5')" class="w3-bar-item w3-button w3-hover-white">ADDONS : <?php echo $addons?></a> 
  <a style="border: 1px solid pink;margin-top: .3vw;" href="#" onclick="my_function('2','8')" class="w3-bar-item w3-button w3-hover-white">COLORS : <?php echo $colors?></a> 
   <a style="border: 1px solid pink;margin-top: .3vw;" href="#" onclick="my_function('2','4')" class="w3-bar-item w3-button w3-hover-white">CATEGORIES : <?php echo $categories?></a> 

<!--   <a href="display_images.php"  class="w3-bar-item w3-button w3-hover-white">View Item Images</a> 
 -->  
 <!-- <a href="display_customers.php"  class="w3-bar-item w3-button w3-hover-white">Customer Images</a>  -->


</div>
  <!-- <a href="#" onclick="print_purchase();" class="w3-bar-item w3-button w3-hover-white">Print Purchase order</a>  -->

  

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
  window.onload=<?php  if ($user_name=="user") echo "my_function('2','6')"; else echo "my_function(1,1)"; ?>;
 
</script>



</html>
