<?php
session_start();
require_once("connection.php");
$id=$_GET["id"];
$q="SELECT * FROM client WHERE client_id=".$id;
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($result);
echo "<td><input id='".$row["client_id"]."_name' type=text value=".$row["name"]."></td>";
echo "<td><input id='".$row["client_id"]."_phone_number' type=text value=".$row["phone_number"]."></td>";
echo "<td><input id='".$row["client_id"]."_address' type=text value=".$row["address"]."></td>";
echo "<td><input id='".$row["client_id"]."_mof' type=text value=".$row["MOF"]."></td>";
echo "<td><input id='".$row["client_id"]."_balance_usd' type=text value=".$row["balance_usd"]."></td>";
echo "<td><input id='".$row["client_id"]."_discount' type=text value=".$row["discount"]."></td>";
echo "<td><button class='editbutton'  onclick='save_edit_client(".$row["client_id"].")'>Confirm</button></td>";
echo "<td><button class='deletebutton'  onclick='delete_clients(".$row["client_id"].")'>Delete</button></td>";
?>

			