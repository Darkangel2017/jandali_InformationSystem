<?php
session_start();
require_once("connection.php");
$id=$_GET["id"];
$q="DELETE FROM supplier WHERE supplier_id=".$id;
if ($result=mysqli_query($conn,$q)){
	echo "success";
}
?>