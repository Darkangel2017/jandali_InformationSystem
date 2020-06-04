<?php
include('connection.php');
$new_balance_lbp=$_GET['balance_lbp'];
$q="UPDATE balance SET balance_lbp='{$new_balance_lbp}' WHERE 1";
mysqli_query($conn,$q);
echo '<span class="price" >'.$new_balance_lbp.'</span>
<span>Lebanese Pounds</span><br><br>
<input type="submit" name="editbalance" onclick="get_edit_balance_lbp()"class="editbutton" value="Edit Balance in LBP"></input>
'
?>