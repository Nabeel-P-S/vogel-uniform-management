<?php
include("connect.php");
?>


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css"><label hidden="">invalid</label>
  <link rel="stylesheet" type="text/css" href="css/style.css"><label hidden="">invalid</label>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert.css"><label hidden="">invalid</label>
<script src="sweetalert.min.js"></script>  <script src="js/main.js"></script>

</head>
<body >
  <div class="container-fluid" id="full_div" style="*background-color:rgba(255,255,255,.4); height: 48vw;">

   <div class="col-lg-12 col-md-12" style="*position: fixed ;*background-color: green; /*padding: 0*/; padding-top:1.2vw;" >

     <div class ="col-lg-4 col col-md-4" style="*background-color: red">
      <img src="store_images/hello.jpg" onclick="go_home()" width="100" height="95" style="cursor: pointer;">

    </div>
    <div class="col-lg-8 col-md-8"style="*background-color: yellow" >

      <div class="navbar1" >
       <div class="dropdown1">
        <button class="dropbtn1" onclick="main_page()"> NEW ORDER
        </button>
      </div> 
      
      <div class="dropdown1">
        <button class="dropbtn1" onclick="display_order_list()"> ORDERS
        </button>
      </div> 
      <div class="dropdown1">
        <!-- &nbsp&nbsp -->
        <button class="dropbtn1" onclick="items()"> my_function ITEM
        </button>
      </div>
      
    </div>

  </div>
</div>

<div  id="store_display">

</div>


<!-- <div class="col-lg-4 col-sm-4 col-md-4" style="height: 42vw; padding: .5vw; text-align: center; ">
  <div class="tabs">
    <h2>Expense</h2>
    
    245
  </div>
  <div class="tabs">
    <h2>Profit</h2>
   788
  </div>
    <div class="tabs" style="*background-color:rgb(244, 100, 4);height: 8vw;">
    <h2> Opening Stock </h2>
   
  </div>
    <div class="tabs" style="*background-color:rgb(244, 100, 4);height: 8vw;">
    <h2> Closing stock </h2>
    
  </div>
</div> -->
  <script src="js/main.js"></script>
</body>

</html>