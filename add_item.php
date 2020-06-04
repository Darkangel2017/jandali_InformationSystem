<?php 
include('connection.php');
$itemcode=$_GET['itemcode'];
$name=$_GET['name'];
$buying_price=$_GET['buying_price'];
$selling_price=$_GET['selling_price'];
$size=$_GET['size'];
$diameter=$_GET['diameter'];
$brand=$_GET['brand'];
$material=$_GET['material'];
$description=$_GET['description'];
$country_of_origin=$_GET['country_of_origin'];
$stock=$_GET['stock'];
$ministry_code=$_GET['ministry_code'];
$q="INSERT INTO item VALUES (null,'{$itemcode}','{$name}','{$buying_price}','{$selling_price}','{$size}','{$diameter}','{$brand}','{$material}','{$description}',
'{$country_of_origin}','{$stock}' ,'{$ministry_code}')";
mysqli_query($conn,$q);
$last_id = $conn->insert_id;
echo "<tr id=".$last_id.">";
echo "<td>".$itemcode."</td>";
echo "<td>". $name."</td>";
echo "<td>". $buying_price."</td>";
echo "<td>". $selling_price."</td>";
echo "<td>".$size ."</td>";
echo "<td>".$diameter ."</td>";
echo "<td>".$brand ."</td>";
echo "<td>". $material."</td>";
echo "<td>". $description."</td>";
echo "<td>". $country_of_origin."</td>";
echo "<td>". $ministry_code."</td>";
echo "<td><button onclick='get_edit_row_items(".$last_id.")'  class='editbutton'>Edit</button></td>";
echo "<td><button onclick='delete_items(".$last_id.")' class='deletebutton'>Delete</button></td>";
echo "</tr>";
?>