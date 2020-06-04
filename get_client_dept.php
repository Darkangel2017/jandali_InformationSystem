<?php 
include('connection.php');
$client_id=$_GET['id'];
$q="SELECT * FROM client WHERE client_id={$client_id}";
$result=mysqli_fetch_assoc(mysqli_query($conn,$q));
echo 'Dept : '.$result['balance_usd']." $";
?>