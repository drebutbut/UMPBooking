<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyle2.css">
	<!-- <style type="text/css">
		#table {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 60%;
			margin-top: 100px;
			margin-left: 250px;
		}

		#table td,
		#table th {
			border: 1px solid #085fad;
			padding: 4px;
		}

		#table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#table tr:hover {
			background-color: #ddd;
		}

		#table th {
			padding-top: 8px;
			padding-bottom: 8px;
			text-align: left;
			background-color: #085fad;
			color: white;
		}

		body {
			width: 100%;
			margin: auto;
			font-family: 'Times New Roman';
			background-color: #99c1d9;
		}

		header {
			height: 15vh;
			background-color: #085fad;
		}

		footer {
			position: fixed;
			height: 10vh;
			width: 100%;
			left: 0;
			bottom: 0;
			text-align: center;
			color: white;
			font-size: 20;
			font-family: 'Times New Roman';
			font-weight: bold;
			background-color: #085fad;
		}

		header h2 {
			position: absolute;
			margin-top: 40px;
			font-family: 'Times New Roman';
			font-size: 40px;
			left: 20%;
			color: white;
		}

		header h3 {
			position: absolute;
			margin-top: 80px;
			font-family: 'Times New Roman';
			font-size: 20px;
			left: 20%;
			color: white;
		}
	</style> -->
</head>

<body>
<section class="header-in">
	<header>
	<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="80" align="left">
		<h2>FK BOOKING UMP SYSTEM</h2>
		<h3>Resource Booking System</h3>
	</header>
	</section>

	<?php
	session_start();

	include("fkdb.php");

	$managerid = intval($_SESSION["managerid"]);

	$query = "SELECT * FROM assign WHERE Manager_ID = '$managerid'";
	$result = mysqli_query($conn, $query); ?>

	<table id="table" style="margin-top:50px;">
		<thead>
			<tr>
				<th style="text-align:center;">Data ID</th>
				<th style="text-align:center;">Room Number</th>
				<th style="text-align:center;">Assigned Technician Name</th>
				<th style="text-align:center;">Assign Date</th>
				<th style="text-align:center;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<?php $cid = $row['Assign_ID']; ?>
					<td><?php echo $cid; ?></td>
					<td><?php echo $row['Accom_ID']; ?></td>
					<td><?php echo $row['Technician_ID']; ?></td>
					<td><?php echo $row['assignDate']; ?></td>
					<td><a href="changecomplaint.php?id=<?php echo $cid; ?>">UPDATE</a><br><a href="deletecomplaint.php?id=<?php echo $cid; ?>">DELETE</a></td>
				</tr>
		</tbody>
	<?php
			}
	?>
	</table>
	<br>
	<!-- <form class="form-class">
	<center><button onclick="back()">Assign More</button></center>
		<script>
			function back(){
				location.href="complaintForm.php";
			}
			</script>
			</form> -->
			<form action="complaintForm.php" class="form-class1">
			<center><button type="submit" name="Assign" id="Assign">Assign More</button></center>
		</form>

	<footer><p style="font-size:20px">Faculty of Computing</p></footer>

</body>

</html>