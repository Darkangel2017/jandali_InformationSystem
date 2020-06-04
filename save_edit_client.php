<?php 
require_once("connection.php");
$id = $_GET['id']; 
$name = $_GET['name']; 
$phone_number = $_GET['phone_number']; 
$address = $_GET['address']; 
$mof = $_GET['mof']; 
$discount = $_GET['discount']; 
$balance_usd = $_GET['balance_usd']; 
$q="UPDATE client set `name`='{$name}', phone_number='{$phone_number}', address='{$address}', MOF='{$mof}', discount=$discount, balance_usd=$balance_usd WHERE client_id={$id}";
mysqli_query($conn,$q);
echo "<td>".$name."</td>";
echo "<td>".$phone_number."</td>";
echo "<td>".$address."</td>";
echo "<td>".$mof."</td>";
echo "<td>".$balance_usd."</td>";
echo "<td>".$discount."</td>";
echo "<td><button class='editbutton' onclick='get_edit_row_clients(".$id.")'>Edit</button></td>";
echo "<td><button class='deletebutton' onclick='delete_clients(".$id.")'>Delete</button></td>";
?>

