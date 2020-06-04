<?php 
require_once("connection.php");
$id = $_GET['id']; 
$itemcode=$_GET['item_code'];
$name=$_GET['name'];
$buying_price=$_GET['buying_price'];
$selling_price=$_GET['selling_price'];
$size=$_GET['size'];
$diameter=$_GET['diameter'];
$brand=$_GET['brand'];
$material=$_GET['material'];
$description=$_GET['description'];
$country_of_origin=$_GET['country_of_origin'];
$ministry_code=$_GET['ministry_code'];
$q="UPDATE item set item_code ='{$itemcode}',name ='{$name}',buying_price ='{$buying_price}',selling_price ='{$selling_price}',size ='{$size}',diameter ='{$diameter}',brand ='{$brand}',material ='{$material}',description ='{$description}',country_of_origin ='{$country_of_origin}',ministry_code ='{$ministry_code}' WHERE item_id={$id}";
mysqli_query($conn,$q);
echo "<td>".$itemcode."</td>";
echo "<td>".$name."</td>";
echo "<td>".$buying_price."</td>";
echo "<td>".$selling_price."</td>";
echo "<td>".$size."</td>";
echo "<td>".$diameter."</td>";
echo "<td>".$brand."</td>";
echo "<td>".$material."</td>";
echo "<td>".$description."</td>";
echo "<td>".$country_of_origin."</td>";
echo "<td>".$ministry_code."</td>";
echo "<td><button class='editbutton' onclick='get_edit_row_items(".$id.")'>Edit</button></td>";
echo "<td><button class='deletebutton' onclick='delete_items(".$id.")'>Delete</button></td>";
?>

