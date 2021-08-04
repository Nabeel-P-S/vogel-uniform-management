<?php ob_start();
session_start();
 $user_id = $_SESSION["id"];
  $user_name = $_SESSION["username"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit; 
}?>

<?php
$vendor_id=$_GET['vendor_id'];
 // $vendor_id='3';
include("../connect.php");




$queryf=mysqli_query($conn,"SELECT * from vendors where vendor_id='$vendor_id'");
$fetchf=mysqli_fetch_array($queryf);
$factory_name=$fetchf['factory_name'];
$vendor_id=$fetchf['vendor_id'];
$vendor_name=$fetchf['vendor_name'];
$vendor_address=$fetchf['vendor_address'];
$vendor_place=$fetchf['vendor_place'];
$vendor_district=$fetchf['vendor_district'];
$vendor_state=$fetchf['vendor_state'];
$vendor_pincode=$fetchf['vendor_pincode'];
$vendor_mobile1=$fetchf['vendor_mobile1'];
$vendor_mobile2=$fetchf['vendor_mobile2'];
$vendor_email=$fetchf['vendor_email'];
?>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"> 
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
        body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif !important;} 
        table
        {
            border: 1.5px solid black;
        }
        th
        {
            padding: .5vw !important;
            font-size: 2vw !important;
            font-weight: bold;
            text-align: center;
        }
        td
        {
            padding-top: .5vw !important;
            padding-left: 1vw !important;
            padding-right: 4vw !important;
        }
    </style>
    <style type="text/css">

    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="non-printable">


     <!-- <p>Click the button to print the Order.</p> -->
     <!-- <button class="btn btn-info" >BACK</button> -->
     <a href="order_view.php?order_id="></a>
     <button class="btn btn-primary" onclick="window.print();">Print this page</button>
     <!-- <button onclick="window.print();">Print this page</button> -->

 </div>

 <div class="container" id="printable" style="*border: 1px solid black;">


    <div class="row" style="display: none;">
        <div style="width: 65%;float: right;padding-top: 5vw;padding-right: 5vw;"><h2 style=";font-weight: bold;"><?php echo $factory_name;?></h2></div>
        <div style="width: 35%;float: left;"><img  style="margin-left:4vw;" src="../images/logo.jpg" width="150px"></div>
    </div>


    <div style="margin-top: 1vw;" class="row">
        <div style="width: 50%;float: left;">
            <h3 style="margin-left: 4vw;"><b>Name : <?php echo $factory_name;?></b></h3>


            <table border="1" style="margin-left: 4vw; ">
               <!--  <tr><td >No</td><td><b><?php echo $vendor_id;?></b> </td></tr>
                <tr><td >Factory Name</td><td><?php echo $factory_name;?> </td></tr> -->
                <tr><td >Owner Name</td><td><?php echo $vendor_name;?> </td></tr>
                <tr><td >Address</td><td><?php echo $vendor_address;?> </td></tr>
                <tr><td >Place</td><td><?php echo $factory_name;?> </td></tr>
               <tr><td >Pincode</td><td><?php echo $vendor_pincode;?> </td></tr> 
                
            </table>
        </div> 
   <div style="width: 50%;float: right;">
            <h3 style="margin-left: 4vw;"><b>NO :  <?php echo $vendor_id;?></b></h3>


            <table border="1" style="margin-left: 4vw; ">
               
               
                 <tr><td >District</td><td><?php echo $vendor_district;?> </td></tr>
                <tr><td >State</td><td><?php echo $vendor_state;?> </td></tr>
                <tr><td >Mobile</td><td><?php echo $vendor_mobile1;?> </td></tr>
                <tr><td >Phone</td><td><?php echo $vendor_mobile2;?> </td></tr>
                <tr><td >Email</td><td><?php echo $vendor_email;?> </td></tr>
                
                
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div style="width: 60%;float: left;">
            <table style="margin-left: 4vw;" border="1">

                <tr>
                    <th>Item Name</th>
                    <th style="width: 10vw;" >Price 1</th>
                    <th style="width: 10vw;">Price 2</th>
                    <th style="width: 10vw;">Price 3</th>
                </tr>
                <?php 
                $sql="SELECT vendors.vendor_name,items.item_name,factory_cost.factory_item_cost1,factory_cost.factory_item_cost2,factory_cost.factory_item_cost3 FROM `factory_cost` INNER JOIN items on items.item_id=factory_cost.item_id INNER JOIN vendors ON vendors.vendor_id=factory_cost.vendor_id where factory_cost.vendor_id='$vendor_id'";
                $query=mysqli_query($conn,$sql);
                while($fetch=mysqli_fetch_array($query))
                    {$vendor_name=$fetch['vendor_name'];
                $item_name=$fetch['item_name'];
                $factory_item_cost1=$fetch['factory_item_cost1'];
                $factory_item_cost2=$fetch['factory_item_cost2'];
                $factory_item_cost3=$fetch['factory_item_cost3'];

                ?>
                <tr>
                    <td><?php echo $item_name;?></td>
                    <td ><?php echo $factory_item_cost1;?></td>
                    <td ><?php echo $factory_item_cost2;?></td>
                    <td ><?php echo $factory_item_cost3;?></td>
                </tr>

                <?php
            }
            ?>
        </table></div>





        




        <div style="width: 40%;float: right;">
            <table style="margin-left: 4vw;" border="1">

                <tr>
                    <th>Fabric  Name</th>
                    <th >Price </th>

                </tr>
                <?php
                $sql3="SELECT fabrics.fabric,factory_fabric_price.factory_fabric_price FROM `factory_fabric_price` INNER JOIN fabrics on fabrics.fabric_id=factory_fabric_price.fabric_id where factory_fabric_price.vendor_id='$vendor_id'";

                $query=mysqli_query($conn,$sql3);
                while($fetch=mysqli_fetch_array($query))
                {

                    $fabric=$fetch['fabric'];
                    $factory_fabric_price=$fetch['factory_fabric_price'];


                    ?>
                    <tr>
                        <td><?php echo $fabric;?></td>
                        <td ><?php echo $factory_fabric_price;?></td>

                    </tr>

                    <?php
                }
                ?>

            </table></div>

        </div>
        <br>
        <div>
            <table style="margin-left: 4vw;" border="1">

                <tr>
                    <th>Addon  Name</th>
                    <th style="width: 10vw">Price 1</th>
                    <th >Price 2</th>
                    <th >Price 3</th>
                </tr>
                <?php 
                $sql="SELECT addons.addon,factory_addon_price.factory_addon_price1,factory_addon_price.factory_addon_price2,factory_addon_price.factory_addon_price3 FROM `factory_addon_price` INNER JOIN addons on addons.addon_id=factory_addon_price.addon_id where factory_addon_price.vendor_id='$vendor_id'";
                $query=mysqli_query($conn,$sql);
                while($fetch=mysqli_fetch_array($query))
                {

                    $addon=$fetch['addon'];
                    $factory_addon_price1=$fetch['factory_addon_price1'];
                    $factory_addon_price2=$fetch['factory_addon_price2'];
                    $factory_addon_price3=$fetch['factory_addon_price3'];

                    ?>
                    <tr>
                        <td><?php echo $addon;?></td>
                        <td ><?php echo $factory_addon_price1;?></td>
                        <td ><?php echo $factory_addon_price2;?></td>
                        <td ><?php echo $factory_addon_price3;?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>

        </div>


        <script>
            function print_new() {
              window.print();
          }
      </script>

  </body>



