<?php
    $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());

    $id = $_GET["id"];

    $data = mysqli_query($conn, "SELECT * FROM technician WHERE Technician_ID=$id");
    $row = mysqli_fetch_assoc($data);

    $technician_name = $row['Technician_name'];
    $technician_email = $row['Technician_email'];

    if( isset($_POST['submit']) ){
        $technician_name = htmlspecialchars($_POST['technician_name']);
        $technician_email = htmlspecialchars($_POST['technician_email']);
		
		$sql = "UPDATE technician SET Technician_name='$technician_name', Technician_email='$technician_email' WHERE Technician_ID=$id";   
	 
		if ($conn->query($sql) === TRUE) {
		  echo "
                <script>
                    alert('Data has been updated');
                    document.location.href = 'admin.php';
                </script>
            ";
		} else {
		  echo "
                <script>
                    alert('Data fail to update');
                    document.location.href = 'admin.php';
                </script>
            " . $conn->error;
		}

		mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<style>
	.header {
  padding: 10px;
  text-align: center;
  color: black;
  font-family: Helvetica;
  text-align: center;
  background-color: #219F94;
}
footer {
  text-align: center;
  padding: 100px;
  background-color: #219F94;
  color: white;
}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Update</title>
    <link rel="stylesheet">
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
	<footer>
		<p style="font-size: 20px">Faculty of Computing</p>
	</footer>
    <h1>Data Update</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $row["Technician_ID"]; ?>">
        <table class="table">
            <tr>
                <td>
                    <p>Technician Name</p>
                </td>
                <td>
                    <input type="text" name="technician_name" id="technician_name" required value="<?= $row["Technician_name"]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Technician Email</p>
                </td>
                <td>
                    <input type="text" name="technician_email" id="technician_email" required value="<?= $row["Technician_email"]; ?>">
                </td>
            </tr>
        </table>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>