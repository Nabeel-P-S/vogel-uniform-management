<?php ob_start();
session_start();
 $user_id = $_SESSION["id"];
  $user_name = $_SESSION["username"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit; 
}?>
<head>
    <script type="text/javascript">
        window.onload=window.print();
    </script>
    <style type="text/css">

    #printable { display: block; }

    @media print
    {
        #non-printable { display: none; }
        #printable { 
            display: block; 
            font-size: 4vw;
            /*background-color: pink;*/
        }
    }
    </style>
</head>
<body>
    <div id="non-printable">

        
         <p>Click the button to print the Order.</p>

<button onclick="window.print();">Print this page</button>
<button onclick="window.print();">Print this page</button>

   </div>

    <div id="printable" style="border: 1px solid black;">
        <table><tr><td>        <img src="../images/logo.jpg" width="100vw;" height="100vw;">
</td><td>        <h3  style="*font-size: 4vw;text-align: center; display: inline;">Purchase order</h3>
</td></tr></table>
        <br>
        <table border="1">
            <tr><td>Customer Details</td>

<td colspan="3"><b style="font-size: 4vw;">NAME</b><BR>ADDRESS,PLACE<br>pincode <br>phone number<br><td></tr>
    <tr><td colspan="4">Order Details</td></tr>
    <tr><td>Item Deatails </td><td>Quantity</td><td>Unit Cost</td><td>Total Cost</td></tr>
    <tr><td>MUnd  </td><td>25 pieces</td><td>35</td><td>875</td></tr>
        </table>
        
    </div>


<script>
function print_new() {
  window.print();
}
</script>

</body>


