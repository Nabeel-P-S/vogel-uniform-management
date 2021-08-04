<!-- <head>
    <style type="text/css">

    #printable { display: none; }

    @media print
    {
        #non-printable { display: none; }
        #printable { 
            display: block; 
            font-size: 4vw;
            background-color: pink;
        }
    }
    </style>
</head>
<body>
    <div id="non-printable">

        Your normal page contents  
         <p>Click the button to print the current page.</p>

<button onclick="print_new()">Print this page</button>
   </div>

    <div id="printable">
        <b style="font-size: 8vw;">Vogel software</b>
        <br>
        adam Bazar Thrissur
        6898798564
        Order Print
        Printer version
        
    </div>


<script>
function print_new() {
  window.print();
}
</script>

</body> -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h3><b style="font-size:30px;color:#2196f3;margin-left: 25vw;">Vogel Products</b>
 <!-- <button style="margin-left: 4vw;" class="btn btn-danger" onclick="order_list();">close</button> -->
         <a style="margin-left: 38vw;font-size: 1.5vw;" href="main.php"  class="w3-bar-item w3-button w3-hover-white">Back</a> </h3>

</body>
</html>


<?php

$files = glob("item_images/*.*");
for ($i = 0; $i < count($files); $i++) {
    $image = $files[$i];
    // echo basename($image) ; // show only image name if you want to show full path then use this code // echo $image."<br />";
    // echo '<img src="' . $image . '" alt="Random image" width="200" height="200" />' . "<br /><br />";
    echo '<img width="100" src="' . $image . '" alt="Random image"  />';
    // echo "&nbsp"; 

}
?>
