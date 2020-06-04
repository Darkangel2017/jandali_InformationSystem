<?php
session_start();
require_once("connection.php");
$id=$_GET["id"];
$q="SELECT * FROM item WHERE item_id=".$id;
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($result);
echo "<td><input id='".$row["item_id"]."_item_code' type=text value=".$row["item_code"]."></td>";
echo "<td><input id='".$row["item_id"]."_name' type=text value=".$row["name"]."></td>";
echo "<td><input id='".$row["item_id"]."_buying_price' type=text value=".$row["buying_price"]."></td>";
echo "<td><input id='".$row["item_id"]."_selling_price' type=text value=".$row["selling_price"]."></td>";
echo "<td><input id='".$row["item_id"]."_size' type=text value=".$row["size"]."></td>";
echo "<td><input id='".$row["item_id"]."_diameter' type=text value=".$row["diameter"]."></td>";
echo "<td><input id='".$row["item_id"]."_brand' type=text value=".$row["brand"]."></td>";
echo "<td><input id='".$row["item_id"]."_material' type=text value=".$row["material"]."></td>";
echo "<td><input id='".$row["item_id"]."_description' type=text value=".$row["description"]."></td>";
echo "<td><input id='".$row["item_id"]."_country_of_origin' type=text value=".$row["country_of_origin"]."></td>";
echo "<td><input id='".$row["item_id"]."_ministry_code' type=text value=".$row["ministry_code"]."></td>";
echo "<td><button class='editbutton'  onclick='save_edit_item(".$row["item_id"].")'>Confirm</button></td>";
echo "<td><button class='deletebutton'  onclick='delete_items(".$row["item_id"].")'>Delete</button></td>";
?>