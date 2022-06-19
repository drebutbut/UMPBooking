<?php
session_start();
require 'fkdb.php';

if( isset($_POST["login"]) ){
	$Manager_ID = $_POST['Manager_ID']; //Manager_ID
	$Manager_password = $_POST['Manager_password']; //Manager_password

	$result = mysqli_query($conn, "SELECT * FROM manager WHERE Manager_ID = '$Manager_ID'");

	if( mysqli_num_rows($result) === 1 ){
		$row = mysqli_fetch_assoc($result);
		if( $Manager_password == $row["Manager_password"] ){
			$_SESSION["managerid"] = "$Manager_ID";
			echo $sessionid;
			header("Location: complaintForm.php");
		}
	}

	$error = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
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

		#button {
			height: 50px;
			width: 250px;
			background-color: #085fad;
			color: white;
			margin-top: 200px;
			margin-left: 650px;
		}
	</style> -->
</head>
<body>
	<section class="header-in">
	<header>
	<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="80" align="left">
		<h2>FK BOOKING UMP SYSTEM</h2>
		<h3>Manager Login</h3>
	</header>
	</section>
<section class="form-bubble" style="margin-top:100px;">
		<h1>UMP Booking - Manager</h1>
        <h4>Sign into your account</h4>
	<form action="" method="post" class="form-class">
            <center>
                <input type="text" name="Manager_ID" id="ManagerID" placeholder="Manager ID" required>
		<br>
                <input type="password" name="Manager_password" id="Manager_password" placeholder="Password" required>
        <br><br>       
                <button type="submit" name="login" id="login">LOGIN</button>
                    </center>
					<br>
        </form>
	</section>
	<footer><p style="font-size:20px">Faculty of Computing</p></footer>
</body>

</html>