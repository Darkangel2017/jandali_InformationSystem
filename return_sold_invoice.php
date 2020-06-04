<?php
require_once 'connection.php';
$q="SELECT * FROM sell_invoice WHERE invoice_id='{$_GET['id']}'";
$result=mysqli_fetch_assoc(mysqli_query($conn,$q));
?>
<form method="post" action="view_items_from_invoice_sell.php";>
<input type="text" hidden value=<?php echo $_GET['id']?> name="invoice_id">
<input type="text" hidden value=<?php echo $result['invoice_group']?> name="invoice_group">
<input type="text" hidden value=<?php echo $result['invoice_date_of_sale']?> name="invoice_date_of_sale">
<input type="text" hidden value=<?php echo $result['amount_paid']?> name="amount_paid">
<input type="submit"  value="confirm Return" name="invoice_confirm">
</form>
