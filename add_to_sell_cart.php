<?php 
include('connection.php');
session_start();
$user_id=$_SESSION['user_id'];
$item_id=$_GET['item_id'];
$quantity=$_GET['quantity'];
$q="SELECT * FROM item WHERE item_id='{$item_id}'";
$result=mysqli_fetch_assoc(mysqli_query($conn,$q));
$q="SELECT quantity as c  FROM items_in_sell_cart WHERE item_id='{$item_id}' group by item_id";
$items_in_cart=mysqli_fetch_assoc(mysqli_query($conn,$q));
if($result['stock']-$items_in_cart['c']<$quantity){
    echo 'error';
}
else{
    $q="SELECT * FROM items_in_sell_cart WHERE item_id =$item_id";
    $result=mysqli_query($conn,$q);    
    $nbrows=mysqli_num_rows($result);
    $q="SELECT * FROM sell_cart WHERE user_id='{$user_id}'";
    $result=mysqli_query($conn,$q);
    $cart_id=mysqli_fetch_assoc($result)['cart_id'];
    if($nbrows==1){
        $q="UPDATE items_in_sell_cart set quantity=quantity+'{$quantity}' WHERE item_id='{$item_id}'";
        mysqli_query($conn,$q);
    }
    else {
        $q="INSERT INTO items_in_sell_cart VALUES (null, '{$cart_id}', '{$item_id}','{$quantity}') ";
        mysqli_query($conn, $q);
        
        }
    $q="SELECT COUNT(items_in_cart_id) as c FROM items_in_sell_cart WHERE cart_id='{$cart_id}'";
    $count=mysqli_fetch_assoc(mysqli_query($conn,$q))["c"];
    echo $count;
}
?>
