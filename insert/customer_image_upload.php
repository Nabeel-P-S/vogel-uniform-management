<?php
include "../connect.php";
	$customer_id=$_POST['customer_id'];
 // echo "$customer_id";
	$image=$_FILES["image_id"]["name"];
	  // echo $image;
	
$filetmp=$_FILES["image_id"]["tmp_name"];
$extension=pathinfo($image,PATHINFO_EXTENSION);
$image_nw=str_replace(".".$extension,"", $image);
	date_default_timezone_set('Asia/Calcutta');
	if ($image_nw!="")
	 {
		
	
	$newfilename=$image_nw .'_'.date('Y-m-d h-i-s').".".$extension;
 $newfilename;

 $filepath = "../customer_images/".$newfilename;

move_uploaded_file($filetmp,$filepath);

$sql="UPDATE `customers` SET `customer_image`='$newfilename' WHERE `customer_id`='$customer_id'";
echo $sql;
 $query=mysqli_query($conn,$sql);
 // echo $filepath;
 }
// $personal_info= $conn->insert_id;
// echo json_encode(array("personal_info"=>$personal_info));
 // echo "photo updated";
?>

