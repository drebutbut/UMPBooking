<?php
	session_start();
	require 'fkdb.php';

	$sessionid = intval($_SESSION["managerid"]);

	$data = mysqli_query($conn, "SELECT * FROM technician");
	$data2 = mysqli_query($conn, "SELECT * FROM accommodation");
	$data3 = mysqli_query($conn, "SELECT * FROM booking WHERE Book_status='Waiting List'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyle2.css">
	<!-- <style>
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

		header h2
		{
			position: absolute;
			margin-top: 40px;
			font-family: 'Times New Roman';
			font-size: 40px;
			left: 20%;
			color: white;
		}

		header h3
		{
			position: absolute;
			margin-top: 80px;
			font-family: 'Times New Roman';
			font-size: 20px;
			left: 20%;
			color: white;
		}

		.form
		{
			border-radius: 10px;
			border: 2px solid black;
			height: 300px;
			width: 450px;

			position: absolute;
			right: 0;
			left: 0;
			top: 0;
			bottom: 0;
			margin: auto;
			background-color: #99c1d9;
		}

		.button
		{	
			width: 50%;
			margin-top: 30px;
			background-color: #085fad;
			color: white;
		}

		p
		{
			text-align: center;
		}
	</style> -->
</head>

<body>
<section class="header-in">
	<header><br>
	<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="80" align="left">	
		<h2>FK BOOKING UMP SYSTEM</h2>
		<br>
	</header>
	</section>

	<section class="form-bubble" style="margin-top:100px;">
		<center><h3><b>Technician Assigning Menu</b></h3></center>
		
		<form method="post" action="addcomplaint.php" class="form-class"><br>
		
					<p><b>Booking ID</b><br>
					<select name="bookid">
						<option style="text-align: center;">--Select Booking ID--</option>
						<?php foreach($data3 as $row) : ?>
						<option value="<?= $row['Book_ID']; ?>">
							<?= $row['Book_ID'] ?> - User <?= $row['User_ID']; ?> - Accommodation <?= $row['Accom_ID']; ?>
						</option>
					<?php endforeach; ?>
					</select></p>

					<!-- <p><b>Room Number:</b><br>
					<select name="ctype">
						<option style="text-align: center;">--Select Room--</option>
						<?php foreach($data2 as $row) : ?>
							<option value="<?= $row['Accom_ID']; ?>">
								<?= $row['Accom_ID'] ?> - <?= $row['Accom_name']; ?>
							</option>
						<?php endforeach; ?>
						<option value="LDK01">LDK01</option>
						<option value="LDK02">LDK02</option>
						<option value="LHDK11">LHDK11</option>
						<option value="LHDK12">LHDK12</option>
						<option value="LHDK13">LHDK13</option>
						<option value="MDK21">MDK21</option>
						<option value="MDK22">MDK22</option>
						<option value="SDK31">SDK31</option>
						<option value="SDK32">SDK32</option>
				</select></p> -->

					<p><b>Technician Name:</b><br>
					<select type="text" name="cdesc">
						<option style="text-align: center;">---Select Technician--</option>
						<?php foreach($data as $row) : ?>
							<option value="<?= $row['Technician_ID']; ?>">
								<?= $row['Technician_ID'] ?> - <?= $row['Technician_name']; ?>
							</option>
						<?php endforeach; ?>
						<!-- <option value="Khairul Anwar">Khairul Anwar</option>
						<option value="Kamala">Kamala</option>
						<option value="Aniq Syazwan">Aniq Syazwan</option>
						<option value="Shafiq Haikal">Shafiq Haikal</option>
						<option value="Hong Wei">Hong Wei</option>
						<option value="Zarul Ikhwan">Zarul Ikhwan</option> -->
				</select></p>
			<!-- <center><input type="submit" class="button" value="Assign"></center> -->
			<button type="submit" name="Assign" id="Assign">ASSIGN</button>
		</form>
	</section>

	<br>
	<br>

	<section class="form-bubble">
		<a href="../Complaint/view.php" class="form-class">
			<button>User Complaint</button>
		</a>
	</section>
	<br>
	<br>
	<footer><p style="font-size:20px">Faculty of Computing</p></footer>
</body>
</html>
