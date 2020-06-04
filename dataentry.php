<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 
include('connection.php');
$item_code="";
$name="LOCK. DISTAL LATERAL TIBIAL PLATE"; 
$size="";
$diameter="0";
$brand="Zimed";
$material="Titamium";
$country_of_origin="Turkey";
$description="With 5.0-4.5 mm Screw";
$ministry_code="MSORTH9-136";
$counter=8;
for ($i=0; $i <4 ; $i++) { 
	$item_code="1982-000".$counter;
	$size=$counter;
	$counter++;
$sql="INSERT INTO `item` VALUES ('{$item_code}','{$name}',0,0,0,'{$size}','{$diameter}','{$brand}','{$material}','{$description}','{$country_of_origin}',0,'{$ministry_code}')";
echo "item_code= " .$item_code. "  size=".$size. "<br>";

// echo $sql."<br>";
// mysqli_query($conn,$sql);
}



?>