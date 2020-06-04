<?php
require_once("connection.php");
$id=$_GET["id"];
$q="DELETE FROM item WHERE item_id=".$id;
mysqli_query($conn,$q);

?>