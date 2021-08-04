<?php
 $order_id=$_GET['order_id'];
 // $order_id="35";
include("../connect.php");
include("order_complete.php");
ob_start();
session_start();
 $user_id = $_SESSION["id"];
  $user_name = $_SESSION["username"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit; 
}
?>
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

        table
        {
            border: 1.5px solid black;
        }
        td
        {
            padding-top: .5vw !important;
            padding-left: .5vw !important;
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

    <div class="row">
        <div style="width: 65%;float: right;padding-top: 5vw;padding-right: 5vw;"><h2 style=";font-weight: bold;">Recieved Voucher</h2></div>
        <div style="width: 35%;float: left;"><img  style="margin-left:4vw;" src="../images/logo.jpg" width="150px"></div>
    </div>
    <div class="row">
       
        <div style="margin-top: 1vw;">
            <table style="margin-left: 4vw;" border="1"><tr><td style="width: 12vw;">ORDER  NO</td><td style="width: 45vw;"><?php echo $order_id;?></td><td style="width: 15vw;"> DELIVERY DATE</td></tr>
                <tr><td>ORDER DATE</td><td > <?php echo $order_date;?></td><td rowspan="2" style="text-align: center;margin-bottom: 2vw;"><h2><?php echo $store_delivery_date=date("d-m-Y", strtotime($store_delivery_date));;?></h2> </td></tr>
                <tr><td>REF NO</td><td><?php echo $reference_no;?></td></tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div style="margin-top: 1vw;">
            <h4 style="margin-left: 4vw;"><b>PRODUCT DETAILS</b></h4>
            <table border="1" style="margin-left: 4vw;">
                <tr><td style="width: 12vw;">ART NO</td><td style="width: 45vw;"><?php echo $item_no;?></td><td style="text-align: center;"><b>ITEM IMAGE</b></td></tr>
                <tr><td>ITEM </td><td><?php echo $item_name?></td><td rowspan="4"><img width="60"  src="../item_images/<?php echo $item_image;?>"></td></tr>
                <tr><td>DESCRIPTION </td><td><?php echo $item_details?></td></tr>
                <tr><td>FABRIC </td><td><?php echo $fabric;?></td></tr>
                <tr><td>COLOUR </td><td><?php echo $color;?></td></tr>
            </table>
        </div> 

    </div>



     <div style="margin-top: 1vw;" class="row">
        <div>
            <h4 style="margin-left: 4vw;"><b>ADD ON</b></h4>
            <table border="1" style="margin-left: 4vw;">
 <?php
     $query1=mysqli_query($conn,"SELECT order_addons.id, order_addons.order_id, order_addons.addon_id,addons.addon FROM `order_addons`
      left join `addons` on addons.addon_id=order_addons.addon_id  WHERE order_id='$order_id'");
     $sleno=1;
     while ($fetch1=mysqli_fetch_array($query1))
     {

      $id=$fetch1['id'];
$slno='1';

      $addon=$fetch1['addon'];

      
?>
            
                <tr><td style="width: 10vw;"><?php echo $slno;?></td><td style="width: 45vw;"><?php echo $addon." "."(".$id.")";?></td></tr>
                <?php
            }
            ?>
            </table>
        </div> 

    </div>
    <div style="margin-top: 1vw;" class="row">
        <div style="width: 40%;float: right;">
            <h4 style="margin-left: 4vw;"><b>SIZES</b></h4>
            <table border="1" style="margin-left: 4vw;text-align: center;">
                <tr  ><td style="width: 15vw;height: 3vw;"><b>SIZE</b></td><td style="width: 10vw;"><b>QTY</b></td></tr>
                  <?php
   $query2=mysqli_query($conn,"SELECT order_quantity.id, order_quantity.order_id,order_quantity.order_quantity, order_quantity.size_id,sizes.size FROM `order_quantity`
    left join `sizes` on sizes.size_id=order_quantity.size_id  WHERE order_id='$order_id'");
   $sleno=1;
   while ($fetch2=mysqli_fetch_array($query2))
   {
    $id=$fetch2['id'];


    $size=$fetch2['size'];
    $size_qty=$fetch2['order_quantity'];


    ?>
                <!-- <tr><td>other</td><td>XS</td><td>S</td><td>M</td><td>L</td><td>XL</td><td>XXL</td><td>XXXL</td><td>TOTAL</td></tr>
                <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>120</td></tr></table>

 -->

 <tr ><td><?php echo $size;?></td><td><?php echo $size_qty;?></td></tr>
 <?php
}
?>
 <tr><td style="height: 2vw;"><b>TOTAL</b></td><td><b><?php echo $order_quantity?></b></td></tr>
</table>
            </div> 

        
          <div style="width: 60%;float: left;">
                <h4 style="margin-left: 4vw;"><b>PHOTOS</b></h4>
                <table border="1"  style="margin-left: 4vw;">

                              <?php
   $image1=mysqli_query($conn,"SELECT *  from order_images WHERE order_id='$order_id' AND position='1'");
    $fetch_image1=mysqli_fetch_array($image1);
    $image_1=$fetch_image1['order_image'];
    $data1=$fetch_image1['image_data'];   
    $image2=mysqli_query($conn,"SELECT *  from order_images WHERE order_id='$order_id' AND position='2'");
    $fetch_image2=mysqli_fetch_array($image2);
    $image_2=$fetch_image2['order_image'];
    $data2=$fetch_image2['image_data'];  
     $image3=mysqli_query($conn,"SELECT *  from order_images WHERE order_id='$order_id' AND position='3'");
    $fetch_image3=mysqli_fetch_array($image3);
    $image_3=$fetch_image3['order_image'];
    $data3=$fetch_image3['image_data'];  
     $image4=mysqli_query($conn,"SELECT *  from order_images WHERE order_id='$order_id' AND position='4'");
    $fetch_image4=mysqli_fetch_array($image4);
    $image_4=$fetch_image4['order_image'];
    $data4=$fetch_image4['image_data'];
  $image5=mysqli_query($conn,"SELECT *  from order_images WHERE order_id='$order_id' AND position='5'");
    $fetch_image5=mysqli_fetch_array($image5);
    $image_5=$fetch_image5['order_image'];
    $data5=$fetch_image5['image_data'];
      $image6=mysqli_query($conn,"SELECT *  from order_images WHERE order_id='$order_id' AND position='6'");
    $fetch_image6=mysqli_fetch_array($image6);
    $image_6=$fetch_image6['order_image'];
    $data6=$fetch_image6['image_data'];
?>           
                    <tr><td style="width: 15vw;"> <label><?php echo $data1 ?></label> </td><td style="width: 15vw;"> <label><?php echo $data2 ?></label> </td><td style="width: 15vw;"> <label><?php echo $data5 ?></label> </td></tr>
                     <tr style="height: 13vw;"><td>
                      <?php if ($image_1==""){ echo "ADDON IMAGE"; }else{ echo "<img  style='margin-left:1vw;width:100%;height:100%;' src='../order_images/".$image_1."'>";} ?>
                </td><td>
                      <?php if ($image_2==""){ echo "ADDON IMAGE"; }else{ echo "<img width='60' style='margin-left:1vw;' src='../order_images/".$image_2."'>";} ?>
               </td><td> 
                      <?php if ($image_5==""){ echo "ADDON IMAGE"; }else{ echo "<img width='60' style='margin-left:1vw;' src='../order_images/".$image_5."'>";} ?>
              </td></tr>
                                    <tr> <td> <label><?php echo $data3 ?></label> </td><td> <label><?php echo $data4 ?></label> </td><td> <label><?php echo $data6 ?></label> </td> </tr>

    <tr style="height: 13vw;"><td>                      <?php if ($image_3==""){ echo "ADDON IMAGE"; }else{ echo "<img width='60' style='margin-left:1vw;' src='../order_images/".$image_3."'>";} ?>
</td><td>                       <?php if ($image_4==""){ echo "ADDON IMAGE"; }else{ echo "<img width='60' style='margin-left:1vw;' src='../order_images/".$image_4."'>";} ?>
</td><td>                      <?php if ($image_6==""){ echo "ADDON IMAGE"; }else{ echo "<img width='60' style='margin-left:1vw;' src='../order_images/".$image_6."'>";} ?>
</td></tr>
   
</table>
</div> 
</div>
 <h4 style="margin-left: 4vw;margin-top: 1vw;"><b>DELIVERY</b></h4>
<table border="1" style="margin-left: 2vw;"><tr><td>DELIVERED DATE</td><td>DELIVERED TIME</td><td>DELIVERED STAFF</td><td>STAFF SIGNATURE</td></tr>
<tr style="height: 4vw;"><td></td><td></td><td></td><td></td></tr>
</table>

</div>


<script>
    function print_new() {
      window.print();
  }
</script>

</body>


