<?php
session_start();
require_once("connection.php");
$id=$_GET["id"];
$type_of_cart=$_GET['type_of_cart'];
$q="SELECT * FROM item WHERE item_id='{$id}'";
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($result);
$q="SELECT * FROM ".$type_of_cart." WHERE user_id='{$_SESSION['user_id']}'";
$cart_id=mysqli_fetch_assoc(mysqli_query($conn,$q))["cart_id"];
$q="SELECT COUNT(item_id) as c,item_id,cart_id,items_in_cart_id FROM `items_in_sell_cart` WHERE cart_id='{$cart_id}' group by item_id";
$row1=mysqli_fetch_assoc(mysqli_query($conn,$q));
$total_price=$row1['c']*$row['selling_price'];
echo "<td>".$row["item_code"]."</td>";
echo "<td>".$row["name"]."</td>";
echo "<td>".$row["buying_price"]."</td>";
echo "<td>".$row["selling_price"]."</td>";
echo "<td>".$row["size"]."</td>";
echo "<td>".$row["diameter"]."</td>";
echo "<td>".$row["brand"]."</td>";
echo "<td>".$row["material"]."</td>";
echo "<td>".$row["description"]."</td>";
echo "<td>".$row["country_of_origin"]."</td>";
echo "<td>".$row["stock"]."</td>";
echo "<td>".$row["ministry_code"]."</td>";
echo "<td><input id='".$row["item_id"]."_quantity' type=number value=".$row1["c"]."></td>";
echo "<td>".$total_price."</td>";
echo "<td><button class='editbutton'  onclick='save_edit_row_from_cart_".$type_of_cart."(".$row["item_id"].")'>Confirm</button></td>";
echo "<td><button class='deletebutton'  onclick='delete_items_from_cart".$type_of_cart."(".$row["item_id"].")'>Delete</button></td>";

?>

			