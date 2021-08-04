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