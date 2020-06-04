<?php
include('connection.php');
$q="SELECT COUNT(item_id) as c FROM items_in_sell_cart WHERE 1";
$result=mysqli_fetch_assoc(mysqli_query($conn,$q));
echo $result['c'];
?>