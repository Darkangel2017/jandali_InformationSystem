<?php 
include('connection.php');
$q="SELECT * FROM balance";
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($result);
echo '<span class="price" ><input type=number step="0.0001" id="new_balance_lbp" value='.$row['balance_lbp'].'></span>
<span>Lebanese Pounds</span><br><br>
<input type="submit" name="editbalance" onclick="save_edit_balance_lbp()" class="editbutton" value="Confirm"></input>
'
?>