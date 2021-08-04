<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
date_default_timezone_set('asia/kolkata');
$date=date('Y-m-d');
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
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
 
  <div class="col-md-12" id="full_div">
    <nav class="w3-sidebar  w3-collapse  w3-large w3-padding" style="width:300px;font-weight:bold;background-color:  #2196f3;color:white" id="mySidebar"><br>
      <a href="#" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
      <div class="w3-container">
        <a><h3 class="w3-padding-64"><b><img src="logo.png" ></b></h3></a>
      </div>
      <div class="w3-bar-block">
        <a href="#" onclick="home()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
        <a href="Welcome
        .php"  class="w3-bar-item w3-button w3-hover-white">Add Expense </a> 
        <a href="report.php" class="w3-bar-item w3-button w3-hover-white">View List</a> 
        <a href="logout.php" class="w3-bar-item w3-button w3-hover-white" >Log out</a>  
    </nav>

    <br>

    <div class="col-md-9" style="height: 95%; float: right; margin-right: 2vw; margin-top: .6vw;width: 75%; *background-image: url('images/vogel.jpg');" id="display_div">
      <div> <h1>Dashboard</h1> </div>
      <table class="table table-striped">
        <tbody>
         <tr>
          <td colspan="1">
           <div class="well form-horizontal">
            <legend>Add Expense</legend>
            <fieldset>
              <?php 
              $query1=mysqli_query($conn,"select expense_id from expenses order by expense_id desc LIMIT 1
                ");
              $fetch1=mysqli_fetch_array($query1);
              $expense_id=$fetch1['expense_id'];
              $expense_id=$expense_id+'1';
              ?>
              <div class="form-group field-wrapper required-field">
                <label class="col-md-4 control-label">No</label>
                <div class="col-md-8 inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></span><input type="text" id="expense_id" name="expense_id" placeholder="Dob" class="form-control" readonly="1" value="<?php echo $expense_id;?>" type="expense_id"></div>
                </div>
              </div>

              

              <div class="form-group field-wrapper required-field">
                <label class="col-md-4 control-label">Date</label>
                <div class="col-md-8 inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input type="text" id="expense_date" name="expense_date" placeholder="Date" value="<?php echo $date;?>" class="form-control" ></div>
                </div>
              </div> <div class="form-group field-wrapper required-field">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-8 inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input type="text" id="expense_name" name="expense_name" placeholder="Name" class="form-control"></div>
                </div>
              </div> <div class="form-group field-wrapper required-field">
                <label class="col-md-4 control-label">Expense</label>
                <div class="col-md-8 inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input type="text" id="expense" name="expense" placeholder="Expense" class="form-control" ></div>
                </div>
              </div>


              

              <div class="form-group">
                <label class="col-md-4 control-label" for="sales_submit"></label>
                <div class="col-md-4">
                  <button id="expense_submit" type="button" onclick="save_expense()" name="expense_submit"  class="btn btn-primary">save</button>
                </div>
              </div>
              <br>
              <br> <br>
            </fieldset>

          </div>
        </td> <td colspan="1">


          <div class="well form-horizontal">
            <legend>Add Sales</legend>
            <fieldset>
             <?php 
             $query=mysqli_query($conn,"select sales_id from sales order by sales_id desc LIMIT 1
              ");
             $fetch=mysqli_fetch_array($query);
             $sales_id=$fetch['sales_id'];
             $sales_id=$sales_id+'1';
             ?>
             <div class="form-group field-wrapper required-field">
              <label class="col-md-4 control-label">No</label>
              <div class="col-md-8 inputGroupContainer">
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></span><input type="text" id="sales_id" name="sales_id" placeholder="Dob" class="form-control" readonly="1" value="<?php echo $sales_id;?>"></div>
              </div>
            </div>

            

            <div class="form-group field-wrapper required-field">
              <label class="col-md-4 control-label">Date</label>
              <div class="col-md-8 inputGroupContainer">
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input type="text" id="sales_date" name="sales_date" placeholder="date" value="<?php echo $date;?>" class="form-control" ></div>
              </div>
            </div> <div class="form-group field-wrapper required-field">
              <label class="col-md-4 control-label">Name</label>
              <div class="col-md-8 inputGroupContainer">
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input type="text" id="sales_name" name="sales_name" placeholder="Name" class="form-control"></div>
              </div>
            </div> <div class="form-group field-wrapper required-field">
              <label class="col-md-4 control-label">Sales</label>
              <div class="col-md-8 inputGroupContainer">
                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span><input type="text" id="sales" name="sales" placeholder="Sales" class="form-control" ></div>
              </div>
            </div>


            

            <div class="form-group">
              <label class="col-md-4 control-label" for="sales_submit"></label>
              <div class="col-md-4">
                <button id="sales_submit" type="button" onclick="save_sales()" name="sales_submit"  class="btn btn-primary">save</button>
              </div>
            </div>
            <br>
            <br> <br>
          </fieldset>

        </div>
        
      </td>

    </tr></tbody></table>

  </div>


</body>
<script type="text/javascript">
  function save_sales ()
  {
    var sales_date=document.getElementById('sales_date').value;
    var sales_name=document.getElementById('sales_name').value;
    var sales=document.getElementById('sales').value;
    alert(sales_date+sales_name+sales);
    $.ajax(
    {
      type:"POST",
      url:"sales_insert.php",
      data:{
        sales_date:sales_date,
        sales_name:sales_name,
        sales:sales
      },
      success: function(data)
      {
        


        swal("success","sales inserted","success");

      }    
    });
  }
</script>
<script type="text/javascript">
  function save_expense()
  {
    alert("kjjwn");
    var expense_date=document.getElementById('expense_date').value;
    var expense_name=document.getElementById('expense_name').value;
    var expense=document.getElementById('expense').value;
    // alert(date+expense_name+expense);
    $.ajax(
    {
      type:"POST",
      url:"expense_insert.php",
      data:{
        expense_date:expense_date,
        expense_name:expense_name,
        expense:expense
      },
      success: function(data)
      {
        


        swal("success","expense inserted","success");
      }    
    });
  }
</script>
</html>