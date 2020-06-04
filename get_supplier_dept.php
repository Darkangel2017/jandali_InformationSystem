<?php 
include('connection.php');
$supplier_id=$_GET['id'];
$q="SELECT * FROM supplier WHERE supplier_id={$supplier_id}";
$result=mysqli_fetch_assoc(mysqli_query($conn,$q));
echo 'Dept : '.$result['balance_usd'].' $';
?>