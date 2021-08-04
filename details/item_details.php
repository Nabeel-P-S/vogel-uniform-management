<?php
include ("../connect.php");
// $addon_number=$_POST["addon_number"];
$item_id=$_POST["item_id"];
$query=mysqli_query($conn,"SELECT items.item_id, items.item_no, items.item_name,items.item_image, items.item_cost1, items.item_cost2, items.item_cost3,item_categories.category FROM `items` left join item_categories on item_categories.category_id=items.item_category_id WHERE items.item_id='$item_id'");
$fetch=mysqli_fetch_array($query);

$item_name=$fetch['item_name'];
$item_image=$fetch['item_image'];
$category=$fetch['category'];
$item_cost1=$fetch['item_cost1'];
$item_cost2=$fetch['item_cost2'];
$item_cost3=$fetch['item_cost3'];
	


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php


 echo $item_name;echo "<br>";
echo $category; echo "<br>";
echo "costs"; echo "-";

	echo $item_cost1." ".$item_cost2." ".$item_cost3;
	echo " "." ";

// echo $item_image; echo "<br>";
?>

<!-- <img src="../item_images/<?php //echo $item_image;?>">
 -->
</body>
</html>