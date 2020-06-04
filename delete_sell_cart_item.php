<?php
require_once("connection.php");
$id=$_GET["id"];
$q="DELETE FROM items_in_sell_cart WHERE item_id=".$id;
mysqli_query($conn,$q);

?>