<?php 
require_once("connection.php");
$id = $_GET['id']; 
$title = $_GET['title']; 
$location = $_GET['location']; 
$phone = $_GET['phone']; 
$email = $_GET['email']; 
$balance_usd = $_GET['balance_usd']; 

$q="UPDATE supplier set title='{$title}', location='{$location}', phone_number='{$phone}', email='{$email}',  balance_usd='{$balance_usd}' WHERE supplier_id={$id}";
mysqli_query($conn,$q);

echo "<td>".$title."</td>";
echo "<td>".$location."</td>";
echo "<td>".$phone."</td>";
echo "<td>".$email."</td>";
echo "<td>".$balance_usd."</td>";
echo "<td><button class='editbutton' onclick='get_edit_row_suppliers(".$id.")'>Edit</button></td>";
echo "<td><button class='deletebutton' onclick='delete_suppliers(".$id.")'>Delete</button></td>";
?>

