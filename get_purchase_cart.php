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
            <th>Total Price</th>
			<th>Action</th>

			<!-- <th colspan="2">Action</th> -->
		</tr>
	</thead>
	<?php
	session_start();
	include('connection.php');
	$final_price=0;
	$q="SELECT * FROM purchase_cart WHERE user_id='{$_SESSION['user_id']}'";
	$cart_id=mysqli_fetch_assoc(mysqli_query($conn,$q))["cart_id"];
	$q="SELECT quantity as c,item_id,cart_id,items_in_cart_id FROM `items_in_purchase_cart` WHERE cart_id='{$cart_id}' group by item_id";
	$items_in_cart=mysqli_query($conn,$q);
	while($row1=mysqli_fetch_assoc($items_in_cart)){
		$q="SELECT * FROM item WHERE item_id=".$row1['item_id'];
		$result=mysqli_query($conn,$q);
		$row=mysqli_fetch_assoc($result);
		$total_price=$row1["c"]*$row["selling_price"];
		echo "<tr id=".$row["item_id"].">";
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
		echo "<td>".$row1["c"]."</td>";
		echo "<td>".$total_price."</td>";
		echo "<td><button onclick='delete_items_from_cart_purchase(".$row["item_id"].")' class='deletebutton'>Delete</button></td>";
		echo "</tr>";
		$final_price=$final_price+($row['buying_price']*$row1['c']);
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
            <th>Total Price</th>
			<th>Action</th>


			<!-- <th colspan="2">Action</th> -->
		</tr>
		</tr>
	</tfoot>
	<br>
	<p>TOTAL PRICE WITHOUT DISCOUNT IS : <?php echo $final_price ?></p>