<?php
session_start();
require_once("connection.php");
$id=$_GET["id"];
$q="SELECT * FROM supplier WHERE supplier_id=".$id;
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($result);
echo "<td><input id='".$row["supplier_id"]."_title' type=text value=".$row["title"]."></td>";
echo "<td><input id='".$row["supplier_id"]."_location' type=text value=".$row["location"]."></td>";
echo "<td><input id='".$row["supplier_id"]."_phone' type=text value=".$row["phone_number"]."></td>";
echo "<td><input id='".$row["supplier_id"]."_email' type=text value=".$row["email"]."></td>";
echo "<td><input id='".$row["supplier_id"]."_balance_usd' type=text value=".$row["balance_usd"]."></td>";
echo "<td><button class='editbutton'  onclick='save_edit_supplier(".$row["supplier_id"].")'>Confirm</button></td>";
echo "<td><button class='deletebutton'  onclick='delete_suppliers(".$row["supplier_id"].")'>Delete</button></td>";
?>