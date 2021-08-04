<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
date_default_timezone_set('asia/kolkata');
$date=date('Y-m-d');
include ("connect.php");
$user_id = $_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>report</title>
  <script src="sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="sweetalert.css"><label hidden="">invalid</label>
<link rel="stylesheet" type="text/css" href="w3.css" media="screen" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <style type="text/css">
    body{ font: 14px sans-serif; text-align: center; }
  </style>
  <style>
.vertical-menu {
  width: 200px;
}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>

<body>
  <!-- <div class="page-header">
    <h1>Hi, <b><?php //echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to ERP.</h1><p>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
      <a href="logout.php" class="btn btn-danger" style="float: right;">LOG OUT</a>

  </p>
  </div> -->
  <div class="col-md-12" id="full_div">
  <nav class="w3-sidebar  w3-collapse  w3-large w3-padding" style="width:300px;font-weight:bold;background-color:  #2196f3;color:white" id="mySidebar"><br>
  <a href="#" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <a><h3 class="w3-padding-64"><b><img src="logo.png" ></b></h3></a>
  </div>
  <div class="w3-bar-block">
    <a href="home.php"  class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="Welcome.php"  class="w3-bar-item w3-button w3-hover-white">Add </a> 
    <a href="report.php" class="w3-bar-item w3-button w3-hover-white">View List</a> 
   
<a href="logout.php" class="w3-bar-item w3-button w3-hover-white" >Log out</a>  
</div>
</nav>

<!-- <div id="test"></div> -->
  <br>
<div style="display: inline;float: right;">
        <?php
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
// $date = date('y-m-d g:i');
// $d2 = date('c', strtotime('-30 days'));
// $d2 = date('y-m-d g:i', strtotime('-30 days'));
$d2 = date('Y-m-d',(strtotime ( '-30 day' , strtotime ( $date) ) ));

?>
      <input type="date" id="from_date"  value="<?php echo $d2; ?>" style="height: 2vw;border-radius: .5vw;font-weight: bold;"> - 
      <input type="date" id="to_date" value="<?php echo $date; ?>"  style="height: 2vw;border-radius: .5vw;font-weight: bold;" >
      <input type="button"  onclick="filter_date()" value="OK" style="margin-top: .5vw; width:3vw;height:2vw; font-size:1vw; ;border: none; background-color:#faee02; border-radius: 5px; font-weight: bold; color:black;">
    </div>
  <div class="col-md-9" style="height: 95%; float: right;*border: 1px solid blue; margin-right: 2vw; margin-top: .6vw;width: 75%; *background-image: url('images/vogel.jpg');" id="display_div">
<table style="margin-left: 5vw;font-size: 1.5vw;  *border: 1px solid black;" border="0" >
	<tr> <td colspan="3">
		<h1>Profit loss report</h1>
	</td>
</tr>
	<tr style="border-top: 2px solid black;border-bottom: 2px solid black;">
		<td style="width: 30vw;">For Period</td>
		<td style="width: 15vw;"> </td>
		<td style="width: 15vw;"> </td>
	</tr>
	<tr>
		<td style="padding-bottom: 2vw;padding-top: 1vw;float: left;" ><b>Total Expenses</b></td>
	</tr>
<tr><TD>  </TD></tr>

<tr> <td colspan="3"> </td></tr>
	<tr style="*border-bottom: 1px solid black;">
		<td><b>Expense</b></td>
		<td><b>Amount</b></td>
		<td></td>
	</tr>

	<?php 
        $query1=mysqli_query($conn,"SELECT expense_name,expense FROM `expenses` WHERE user_id='$user_id'");
        while ($fetch1=mysqli_fetch_array($query1)) 
        {


         $expense_name=$fetch1['expense_name'];
         $expense=$fetch1['expense'];

?>
 <tr>
		<td> <?php echo $expense_name;?> </td>
		<td> <?php echo $expense; ?></td>
		<td> </td>
	</tr>
<?php

        }
       
      
        ?>
	



	

<tr>
	<?php 
        $query1=mysqli_query($conn,"	SELECT SUM(expense) as total from expenses where user_id='$user_id'");
        $fetch1=mysqli_fetch_array($query1);
                 $total1=$fetch1['total'];
                 ?>

	<td></td>
	<td>Total :</td>
	<td style=" font-weight: bold ;padding-top: 1vw;"> <?php echo $total1;?></td>
</tr>
<tr >
		<td style="padding-bottom: 2vw;padding-top: 1vw;float: left;"><b>Total Sales</b></td>
	</tr>
<tr><TD>  </TD></tr>

<tr> <td colspan="3"> </td></tr>
	<tr style="*border-bottom: 1px solid black;">
		<td><b>SALES </b></td>
		<td><b>Amount</b></td>
		<td></td>
	</tr>

	<?php 
        $query2=mysqli_query($conn,"SELECT sales_name,sale FROM `sales` WHERE user_id='$user_id'");
        while ($fetch2=mysqli_fetch_array($query2)) 
        {


         $sales_name=$fetch2['sales_name'];
         $sale=$fetch2['sale'];

?>
 <tr>
		<td> <?php echo $sales_name;?> </td>
		<td> <?php echo $sale; ?></td>
		<td> </td>
	</tr>
<?php

        }
       
      
        ?>
	



	

<tr>
	<?php 
        $query3=mysqli_query($conn,"	SELECT SUM(sale) as total from `sales` where user_id='$user_id'");
        $fetch3=mysqli_fetch_array($query3);
                 $total2=$fetch3['total'];
                 // $profit=$total1+$total2;
                 ?>

	<td></td>
	<td>Total</td>
	<td style=" font-weight: bold; padding-top: 1vw;"> <?php echo $total2;?></td>
	
</tr>
<tr>
	<td></td>
	<td style="padding-top: 2vw;"><b>Gross Profit</b></td>
	<td style="padding-top: 2vw;"><?php echo $total2-$total1 ;?> </td>
</tr>
</table> </div>
<button  class="btn btn-warning" onclick="print_report()"> PRINT</button>

   

</body>
<script>
  function print_report()
  {
    var printContents = document.getElementById("display_div").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    
  }

</script>

<script>
    function filter_date()
    {
    alert("aaa");
      var date1=(document.getElementById("from_date").value);
      var date2=(document.getElementById("to_date").value);
     var diff =  Math.floor(( Date.parse(date2) - Date.parse(date1) ) / 86400000);
     
     
      
      $.ajax(

          {
            type:"POST",

          url:"report1.php",

          data:{
            date1:date1,
             date2:date2
              },
              success: function(data_output)
              
          {
            // alert(data_output);
            $("#display_div").html(data_output);
          }, 
          });  
    }
  </script>
</html>