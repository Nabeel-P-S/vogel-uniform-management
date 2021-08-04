<?php
include("connect.php");
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}


  $date1=$_POST["date1"];
$date2=$_POST["date2"];
$user_id = $_SESSION["id"];
           $query_expense=mysqli_query($conn,"SELECT expense_name,expense FROM `expenses` WHERE (date BETWEEN '$date1' AND '$date2') AND user_id='$user_id' ");
// 
           $query_sale=mysqli_query($conn,"SELECT sales_name,sale FROM `sales` WHERE (sales_date BETWEEN '$date1' AND '$date2') AND user_id='$user_id' ");

//            $query = "SELECT sales_name,sale FROM `sales` WHERE (sales_date BETWEEN 'date1' AND 'date2') AND user_id='$user_id' ";

// echo $query;
//  $query_sale = mysqli_query($conn, $query);
        // $query2=mysqli_query($conn,"SELECT sales_name,sale FROM `sales` WHERE user_id='$user_id'");



date_default_timezone_set('asia/kolkata');
$date=date('Y-m-d');
include ("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
<table style="margin-left: 5vw;font-size: 1.5vw;*background-color: pink;" border="0" >
	<tr> <td colspan="3">
		<h1>Profit loss report</h1>
	</td>
</tr>
	<tr style="border-top: 2px solid black;border-bottom: 2px solid black;">
		<td style="width: 30vw;">For Period</td>
		<td style="width: 10vw;"><?php echo $date1; ?></td>
		<td style="width: 10vw;"><?php echo $date2; ?></td>
	</tr>
	<tr>
		<td style="padding-bottom: 2vw;padding-top: 1vw;float: left;" ><b>Total Expenses</b></td>
	</tr>
<tr><TD>  </TD></tr>

<tr> <td colspan="3"> </td></tr>
	<tr style="*border-bottom: 1px solid black;">
		<td><u>Expense</u></td>
		<td><u>Amount</u></td>
		<td></td>
	</tr>

	<?php 
        $sum1=0;
        $sum2=0;
        while ($fetch_expense=mysqli_fetch_array($query_expense)) 
        {


         $expense_name=$fetch_expense['expense_name'];
         $expense=$fetch_expense['expense'];
         $sum1=$sum1+$expense;

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
	

	<td></td>
	<td>Total :</td>
	<td style=" border-bottom:  double ;padding-top: 1vw;"> <?php echo $sum1;?></td>
</tr>
<tr >
		<td style="padding-bottom: 2vw;padding-top: 1vw;float: left;"><b>Total Sales</b></td>
	</tr>
<tr><TD>  </TD></tr>

<tr> <td colspan="3"> </td></tr>
	<tr style="*border-bottom: 1px solid black;">
		<td><u>SALES </u></td>
		<td><u>Amount</u></td>
		<td></td>
	</tr>

	<?php 
	
        while ($fetch_sale=mysqli_fetch_array($query_sale)) 
        {


       $sales_name=$fetch_sale['sales_name'];
       $sale=$fetch_sale['sale'];
         $sum2=$sum2+$sale;

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
	

	<td></td>
	<td>Total</td>
	<td style=" border-bottom:  double ;padding-top: 1vw;"> <?php echo $sum2;?></td>
	
</tr>
<tr>
	<td></td>
	<td style="padding-top: 2vw;"><b>Gross Profit</b></td>
	<td style="padding-top: 2vw;"><?php echo $sum2-$sum1 ;?> </td>
</tr>
</table>
</div>
</body>
</html>




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
</html>