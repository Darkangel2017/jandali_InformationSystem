            <thead>
            <tr>
			<th>Invoice Date</th>
            <th>Supplier Name</th>
            <th>Amount Paid</th>
            
			<th>Action</th>
		</tr>
	</thead>
	<?php
    include 'connection.php';
    $q="SELECT * FROM purchase_invoice";
    $result=mysqli_query($conn,$q);
    $q="SELECT * FROM purchase_invoice";
    $result1=mysqli_query($conn,$q);
    $temp=mysqli_fetch_assoc($result1);
    $q="SELECT supplier_id from purchase WHERE invoice_group='{$temp['invoice_group']}'";
    $row_supplier=mysqli_fetch_assoc(mysqli_query($conn,$q));
    $q="SELECT title from supplier where supplier_id='{$row_supplier['supplier_id']}'";
    $supplier_name=mysqli_fetch_assoc(mysqli_query($conn,$q));
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr id=".$row["invoice_id"]." >";
		echo "<td>".$row["invoice_date_of_sale"]."</td>";
        echo "<td>".$supplier_name["title"]."</td>";
        echo "<td>".$row["amount_paid"]."</td>";
		echo "<td><button onclick='return_bought_invoice(".$row["invoice_id"].")' class='editbutton'>Return</button></td>";
		echo "</tr>";
	}
	?>
	<tfoot>
		<tr>
            <th>Invoice Date</th>
            <th>Supplier Name</th>
			<th>Amount Paid</th>
			<th>Action</th>
		</tr>
	</tfoot>


    
