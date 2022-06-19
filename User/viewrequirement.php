<html>

<head>
</head>
<body>
	<header>
	</header>

	<h3>LIST OF Requirement</h3>
	<?php
	include("ll.php");

	$query = "SELECT * FROM requirement";
	$result = mysqli_query($conn, $query); ?>

	<table id="table">
		<thead>
			<tr>
            <th>Setup ID</th>
				<th>Setup name</th>
				<th>Quantity</th>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<?php $cid = $row['Requirement_ID']; ?>
					<td><?php echo $cid; ?></td>
					<td><?php echo $row['Item_name']; ?></td>
					<td><?php echo $row['Item_quantity']; ?></td>
					
				
					
					<td><a href=".php?id=<?php echo $cid; ?>">UPDATE</a><br><a href=".php?id=<?php echo $cid; ?>">DELETE</a></td>
				</tr>
		</tbody>
	<?php
			}
	?>
	</table>
	<br>



	
	<form action="Main2.php">
		<button type="Submit" id="button1">continue</button>
	</form>

	<footer>
	</footer>
</body>

</html>