<thead>
            <tr>
			<th>Invoice Date</th>
			<th>Amount Paid</th>
			<th>Action</th>
		</tr>
	</thead>
	<?php
    include 'connection.php';
    $q="SELECT * FROM sell_invoice";
	$result=mysqli_query($conn,$q);
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr id=".$row["invoice_id"]." >";
		echo "<td>".$row["invoice_date_of_sale"]."</td>";
		echo "<td>".$row["amount_paid"]."</td>";
		echo "<td><button onclick='return_sold_invoice(".$row["invoice_id"].")'  class='editbutton'>Return</button></td>";
		echo "</tr>";
	}
	?>
	<tfoot>
		<tr>
            <th>Invoice Date</th>
			<th>Amount Paid</th>
			<th>Action</th>
		</tr>
	</tfoot>


    
