<?php
include('connection.php');
$new_balance_lbp=$_GET['balance_usd'];
$q="UPDATE balance SET balance_usd='{$new_balance_lbp}' WHERE 1";
mysqli_query($conn,$q);
echo '<span class="price" >'.$new_balance_lbp.'</span>
<span>US Dollars</span><br><br>
<input type="submit" name="editbalance" onclick="get_edit_balance_usd()"class="editbutton" value="Edit Balance in USD"></input>
'
?>