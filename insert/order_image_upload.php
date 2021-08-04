<?php
include "../connect.php";
	$order_id=$_POST['order_id'];
for($i=1;$i<7;$i++)
{
	
	$image=$_FILES["image_id".$i]["name"];	
	$data=$_POST["image_data".$i];	

	$filetmp=$_FILES["image_id".$i]["tmp_name"];
	$extension=pathinfo($image,PATHINFO_EXTENSION);
	$image_nw=str_replace(".".$extension,"", $image);
	date_default_timezone_set('Asia/Calcutta');
	if ($image_nw!="")
	 {
	$newfilename=$image_nw .'_'.date('Y-m-d h-i-s').".".$extension;
    $filepath = "../order_images/".$newfilename;

       move_uploaded_file($filetmp,$filepath);
	$sql="INSERT INTO `order_images`(`id`, `order_id`, `order_image`, `image_data`, `position`) VALUES (NULL,$order_id,'".$newfilename."','".$data."',$i)";


if($query=mysqli_query($conn,$sql)) 
{
	echo "success";
}
else
{
	echo mysqli_error($conn);
}
 }}

?>

