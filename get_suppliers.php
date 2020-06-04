	<thead>
		<tr>
			<!-- <th style="display: none;">supplier id</th> -->
			<th>Title</th>
			<th>Location</th>
			<th>Phone number</th>
			<th>Email</th>
			<th>Balance USD</th>
			<th>Action</th>
			<th>Action</th>
			<!-- <th colspan="2">Action</th> -->
		</tr>
	</thead>
	<?php
	session_start();
	require_once("connection.php");
	$q="SELECT * FROM supplier";
	$result=mysqli_query($conn,$q);
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr id=".$row["supplier_id"].">";
		echo "<td>".$row["title"]."</td>";
		echo "<td>".$row["location"]."</td>";
		echo "<td>".$row["phone_number"]."</td>";
		echo "<td>".$row["email"]."</td>";
		echo "<td>".$row["balance_usd"]."</td>";
		echo "<td><button class='editbutton' onclick='get_edit_row_suppliers(".$row["supplier_id"].")'>Edit</button></td>";
		echo "<td><button class='deletebutton' onclick='delete_suppliers(".$row["supplier_id"].")'>Delete</button></td>";
		echo "</tr>";
	}
	?>
	<tfoot>
		<tr>
		<tr>
			<!-- <th style="display: none;">Supplier id</th> -->
			<th>Title</th>
			<th>Location</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Balance USD</th>
			<th>Action</th>
			<th>Action</th>

			<!-- <th colspan="2">Action</th> -->
		</tr>
		</tr>
	</tfoot>
