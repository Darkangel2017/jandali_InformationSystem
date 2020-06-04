	<thead>
		<tr>
			<th>Item code</th>
			<th>Name</th>
			<th>Buying price</th>
			<th>Selling price</th>
			<th>Size</th>
			<th>Diameter</th>
			<th>Brand</th>
			<th>Material</th>
			<th>Description</th>
			<th>Country of origin</th>
			<th>Stock</th>
			<th>Ministry code</th>
			<th>Quantity</th>
			<th>Action</th>
			<th>Action</th>
			<!-- <th colspan="2">Action</th> -->
		</tr>
	</thead>
	<?php
	session_start();
	require_once("connection.php");
	$q="SELECT * FROM item";
	$result=mysqli_query($conn,$q);
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr id=".$row["item_id"]." >";
		echo "<td>".$row["item_code"]."</td>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["buying_price"]."</td>";
		echo "<td>".$row["selling_price"]."</td>";
		echo "<td>".$row["size"]."</td>";
		echo "<td>".$row["diameter"]."</td>";
		echo "<td>".$row["brand"]."</td>";
		echo "<td>".$row["material"]."</td>";
		echo "<td>".$row["description"]."</td>";
		echo "<td>".$row["country_of_origin"]."</td>";
		echo "<td>".$row["stock"]."</td>";
		echo "<td>".$row["ministry_code"]."</td>";
		echo "<td><input min='0' id='".$row['item_id']."_quantity'  type=number value=0></td>";
		echo "<td><button onclick='add_to_sell_cart(".$row['item_id'].")' class='sellbutton'>Sell</button></td>";
		echo "<td><button onclick='add_to_purchase_cart(".$row['item_id'].")' class='purchasebutton'>Purchase</button></td>";
		echo "</tr>";
	}
	?>
	<tfoot>
		<tr>
		<tr>
			<th>Item code</th>
			<th>Name</th>
			<th>Buying price</th>
			<th>Selling price</th>
			<th>Size</th>
			<th>Diameter</th>
			<th>Brand</th>
			<th>Material</th>
			<th>Description</th>
			<th>Country of origin</th>
			<th>Stock</th>
			<th>Ministry code</th>
			<th>Quantity</th>
			<th>Action</th>
			<th>Action</th>

			<!-- <th colspan="2">Action</th> -->
		</tr>
		</tr>
	</tfoot>
