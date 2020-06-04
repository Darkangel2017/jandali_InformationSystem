
	<thead>
		<tr>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Address</th>
			<th>MOF</th>
			<th>Dept</th>
			<th>Discount</th>
			<th>Action</th>
			<th>Action</th>
		</tr>
	</thead>
	<?php
	session_start();
	require_once("connection.php");
	$q="SELECT * FROM client";
	$result=mysqli_query($conn,$q);
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr id=".$row["client_id"]." >";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["phone_number"]."</td>";
		echo "<td>".$row["address"]."</td>";
		echo "<td>".$row["MOF"]."</td>";
		echo "<td>".$row["balance_usd"]."</td>";
		echo "<td>".$row["discount"]."</td>";
		echo "<td><button onclick='get_edit_row_clients(".$row["client_id"].")' class='editbutton'>Edit</button></td>";
		echo "<td><button  onclick='delete_clients(".$row["client_id"].")' class='deletebutton'>Delete</button></td>";
		echo "</tr>";
	}

	?>
	<tfoot>
		<tr>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Address</th>
			<th>MOF</th>
			<th>Dept</th>
			<th>Discount</th>
			<th>Action</th>
			<th>Action</th>
			<!-- <th colspan="2">Action</th> -->
		</tr>
	</tfoot>
