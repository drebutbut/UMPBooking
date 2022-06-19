<?php
    $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());

    $id = $_GET["id"];

    $data = mysqli_query($conn, "SELECT * FROM user WHERE User_ID=$id");
    $row = mysqli_fetch_assoc($data);

    $user_name = $row['User_name'];
    $user_email = $row['User_email'];

    if( isset($_POST['submit']) ){
        $user_name = htmlspecialchars($_POST['user_name']);
        $user_email = htmlspecialchars($_POST['user_email']);
		
		$sql = "UPDATE user SET User_name='$user_name', User_email='$user_email' WHERE User_ID=$id";   
	 
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
        <input type="hidden" name="id" value="<?= $row["User_ID"]; ?>">
        <table class="table">
            <tr>
                <td>
                    <p>User Name</p>
                </td>
                <td>
                    <input type="text" name="user_name" id="user_name" required value="<?= $row["User_name"]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>User Email</p>
                </td>
                <td>
                    <input type="text" name="user_email" id="user_email" required value="<?= $row["User_email"]; ?>">
                </td>
            </tr>
        </table>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>