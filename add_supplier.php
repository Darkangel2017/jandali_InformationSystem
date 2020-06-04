<?php 
include('connection.php');
$title=$_GET['title'];
$location=$_GET['location'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$balance=$_GET['balance'];
$q= "INSERT INTO supplier VALUES ( null ,'{$title}', '{$location}' , '{$phone}' , '{$email}' , '{$balance}' )";
mysqli_query($conn,$q);
$last_id = $conn->insert_id;
echo "<tr id=".$last_id.">";
echo "<td>".$title."</td>";
echo "<td>".$location."</td>";
echo "<td>".$phone."</td>";
echo "<td>".$email."</td>";
echo "<td>".$balance."</td>";
echo "<td><button class='editbutton' onclick='get_edit_row_suppliers(".$last_id.")'>Edit</button></td>";
echo "<td><button class='deletebutton' onclick='delete_suppliers(".$last_id.")'>Delete</button></td>";
echo "</tr>";


?>