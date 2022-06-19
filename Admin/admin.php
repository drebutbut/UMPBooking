<?php
    $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());	
	
	$dataM = mysqli_query($conn, "SELECT * FROM manager");
	$dataT = mysqli_query($conn, "SELECT * FROM technician");
	$dataU = mysqli_query($conn, "SELECT * FROM user");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirement</title>
    <style>
        body {
			width: 100%;
			margin: auto;
			font-family: 'Times New Roman';
			background-color: #C1DEAE;
		}

		header {
			height: 10vh;
			background-color: #219F94;
			text-align: center;
		}

		footer {
			height: 10vh;
			width: 100%;
			left: 0;
			bottom: 0;
			text-align: center;
			color: white;
			font-size: 20;
			font-family: 'Times New Roman';
			font-weight: bold;
			background-color: #219f94;
		}

		header h2 
		{
			padding: 10px;
			text-align: center;
			color: white;
			font-family: 'Times New Roman';
			text-align:left;
			background-color: #219F94;

		}

		header h3
		{

			padding: 10px;
			text-align: center;
			color: white;
			font-family: 'Times New Roman';
			text-align: center;
			background-color: #219F94;

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
			background-color: #C1DEAE;
		}

		.button
		{	
			width: 50%;
			margin-top: 30px;
			background-color: #C1DEAE;
			color: white;
		}

		td
		{
			width: 60%;
			text-align: right;
		}
		section{
            width: 40%;
            margin:auto;
            padding: 0px 20px 20px 20px;
            border: 1px solid black;
            border-radius: 25px;
            text-align: center;
        }

        form{
            padding: 20px;
            width: 80%;
            margin: auto;
        }

        table{
            width: 100%;
        }

        th, td{
            padding: 10px;
        }

        th{
            width: 40%;
        }
		
        input{
            width: 90%;
        }
    </style>
</head>
<body>
	<header>
		<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="70" align="left">
		<h2>UMP BOOKING SYSTEM</h2>
	</header>

	<button onclick="window.location.href = 'register.php';">Homepage for Admin</button>
	<h2>List of Manager</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Manager Name</th>
            <th>Manager Email</th>
			<th></th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($dataM as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["Manager_name"]; ?></td>
                <td><?= $row["Manager_email"]; ?></td>
				<td>
                    <a href="updateM.php?id=<?= $row["Manager_ID"] ?>">Update</a>
                    <a href="delete.php?id=<?= $row["Manager_ID"] ?>&user_type=manager" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
	<h2>List of Technician</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Technician Name</th>
            <th>Technician Email</th>
			<th></th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($dataT as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["Technician_name"]; ?></td>
                <td><?= $row["Technician_email"]; ?></td>
				<td>
                    <a href="updateT.php?id=<?= $row["Technician_ID"] ?>">Update</a>
                    <a href="delete.php?id=<?= $row["Technician_ID"] ?>&user_type=technician" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
	<h2>List of User</h2>
    <table>
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>User Email</th>
			<th></th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($dataU as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["User_name"]; ?></td>
                <td><?= $row["User_email"]; ?></td>
				<td>
                    <a href="updateU.php?id=<?= $row["User_ID"] ?>">Update</a>
                    <a href="delete.php?id=<?= $row["User_ID"] ?>&user_type='user' " onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <footer>
		<p style="font-size: 20px">Faculty of Computing</p>
	</footer>
</body>
</html>			