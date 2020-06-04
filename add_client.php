<?php 
include('connection.php');
$name=$_GET['name'];
$phonenumber=$_GET['phonenumber'];
$address=$_GET['address'];
$mof=$_GET['mof'];
$balance=$_GET['balance'];
$discount=$_GET['discount'];
$q= "INSERT INTO client VALUES ( null ,'{$balance}', '{$name}' , '{$mof}' , '{$address}' , '{$phonenumber}','{$discount}' )";
mysqli_query($conn,$q);
$last_id = $conn->insert_id;		
echo "<tr id=". $last_id." >";
echo "<td>".$name."</td>";
echo "<td>".$phonenumber."</td>";
echo "<td>".$address."</td>";
echo "<td>".$mof."</td>";
echo "<td>".$balance."</td>";
echo "<td>".$discount."</td>";
echo "<td><button onclick='get_edit_row_clients(". $last_id.")' class='editbutton'>Edit</button></td>";
echo "<td><button  onclick='delete_clients(". $last_id.")' class='deletebutton'>Delete</button></td>";
echo "</tr>";


?>