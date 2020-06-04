<?php 
require_once('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<h2>Add supplier</h2>
<form action="demo.php" method="post">
	<input type="text" name="title" placeholder="title">
	<input type="text" name="location" placeholder="location">
	<input type="number" name="phone_number" placeholder="phone_number">
	<input type="email" name="email" placeholder="email">
	<input type="number" name="balance" placeholder="balance">
	<input type="submit" name="add_supplier" value="add_supplier">
</form>
<br>
<br>
	<h2>Add Item</h2>

<form action="demo.php" method="post">
	<input placeholder="item_code" type="text" name="item_code">
	<input placeholder="name" type="text" name="name">
	<input placeholder="buying_price" type="number" name="buying_price">
	<input placeholder="selling_price" type="number" name="selling_price">
	<input placeholder="lowest_selling_price" type="number" name="lowest_selling_price">
	<input placeholder="size" type="text" name="size">
	<input placeholder="diameter" type="text" name="diameter">
	<input placeholder="brand" type="text" name="brand">
	<input placeholder="material" type="text" name="material">
	<input placeholder="description" type="text" name="description">
	<input placeholder="ministry_code" type="text" name="ministry_code">
	<input placeholder="country_of_origin" type="text" name="country_of_origin">
	<input placeholder="stock" type="text" name="stock">
	<input type="submit" name="add_item" value="add_item">

</form>
<h2>Add client</h2>
	
<form action="demo.php" method="post">
	<input placeholder="name" type="text" name="name">
	<input placeholder="balance" type="number" name="balance">
	<input placeholder="mof" type="text" name="mof">
	<input placeholder="address" type="text" name="address">
	<input placeholder="phone_number" type="number" name="phone_number">
	<input placeholder="discount" type="number" name="discount">
	<input type="submit" name="add_client" value="add_client">

</form>
<br>
<br>
<h2>Sell Items</h2>

<form action="demo.php" method="post">
		<span>Item name</span>	<select name="item">
		<?php select_sell_item()?>
	</select>	
	<span>Client Name</span>
	<select name="client">
		<?php select_client();?>
	</select>
<input placeholder="quantity" type="number" name="quantity">
<input placeholder="price" type="number" name="price">
<input placeholder="payment_type" type="text" name="payment_type">
<input placeholder="amount" type="number" name="amount">
<input placeholder="date" type="date" name="date">
	<input type="checkbox" name="is_paid" >
<input type="submit" name="sell_item" value="sell_item">

</form>
<br>
<br>
	<h2>purchace Items</h2>
<form action="demo.php" method="post">
	<select name="supplier">
		<?php select_supplier();?>
	</select>
	<select name="item">
		<?php select_item();?>

	</select>
	<input placeholder="quantity" type="number" name="quantity">
	<input type="number" name="price_per_item" placeholder="price_per_item" >
	<input type="number" placeholder="amount Paid" name="amount" >
	<input type="date"  name="date" placeholder="date" >
	<input type="submit" name="purchase" value="purchase">

</form>
<h2>Delete item</h2>
<form action="demo.php" method="post">
	<select name="item"><?php select_item(); ?></select>
	<input type="submit" name="delete_item" value="delete_item">
</form>
<h2>Delete client</h2>
<form action="demo.php" method="post">
	<select name="client"><?php select_client(); ?></select>
	<input type="submit" name="delete_client" value="delete_client">
</form>
	<h2>Delete supplier</h2>
<form action="demo.php" method="post">
	<select name="supplier"><?php select_supplier(); ?></select>
	<input type="submit" name="delete_supplier" value="delete_supplier">
</form>
<form action="demo.php" method="post">
	<input type="submit" name="show_inventory" value="show_inventory">
</form>
<form action="demo.php" method="post">
	<input type="submit" name="check_balance_with_amount_paid" value="check_balance_with_amount_paid" >
<br>
<br>
</form>
<form action="demo.php" method="post">
	<input type="submit" name="check_balance_with_full_payment" value="check_balance_with_full_payment">
</form>

<form action="demo.php" method="post">
	<input type="submit" name="return_bought_items" value="return_bought_items">
</form>

<form action="demo.php" method="post">
	<input type="submit" name="return_sold_items" value="return_sold_items">
</form>
</body>
</html>
<?php
delete_supplier();
delete_item();
delete_client();
purchase_item();
sell_item();
add_supplier();
add_item();
add_client();
show_inventory();
check_balance_with_amount_paid();
check_balance_with_full_payment();
return_bought_items();
return_sold_items();
// $insertItems= "INSERT into item VALUES ()";
// $insertpurchases="IN";
 // $('#printInvoice').click(function(){
 //            Popup($('.invoice')[0].outerHTML);
 //            function Popup(data) 
 //            {
 //                window.print();
 //                return true;
 //            }
 //        });

?>