<?php
    $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());

    # Check if the register button have been clicked or not
    if( isset($_POST["register"]) ){
        $user_name = $_POST["user_name"];
        $user_email = htmlspecialchars($_POST["user_email"]);
        $user_password = mysqli_real_escape_string($conn, $_POST["user_password"]);
        $user_password2 = mysqli_real_escape_string($conn, $_POST["user_password2"]);
		$user_type = ($_POST["user_type"]);

        if( $user_password !== $user_password2 ){
            echo "<script>
                alert('Password not match')
				document.location.href = 'admin.php';
                </script>";
            return false;
		}
		$user_password = password_hash($user_password, PASSWORD_DEFAULT);
		
		if( $user_type == 'manager' ){
            mysqli_query($conn, "INSERT INTO manager (Manager_ID, Manager_name, Manager_password, Manager_email) VALUES('', '$user_name', '$user_password', '$user_email')");
            echo "<script>
                alert('manager added')
				document.location.href = 'admin.php';
                </script>";
			return false;
        }
		else if( $user_type == 'technician' ){
            mysqli_query($conn, "INSERT INTO technician (Technician_ID, Technician_name, Technician_password, Technician_email, Technician_pic) VALUES('', '$user_name', '$user_password', '$user_email', 'default.png')");
            echo "<script>
                alert('Technician added')
				document.location.href = 'admin.php';
                </script>";
			return false;
        }
		else{
            mysqli_query($conn, "INSERT INTO user (User_ID, User_name, User_password, User_email) VALUES('', '$user_name', '$user_password', '$user_email')");
            echo "<script>
                alert('User added')
				document.location.href = 'admin.php';
                </script>";
			return false;
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin</title>
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
    <section class="login">
        <h1 class="loginh1">Registration for Admin</h1>
        <form action="" method="post">
            <table id="formTable">
                <tr>
                    <th>
                        <label for="user_name">Name</label>
                    </th>
                    <td>
                        <input type="text" name="user_name" id="user_name" placeholder="Insert your name" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="user_email">Email</label>
                    </th>
                    <td>
                        <input type="email" name="user_email" id="user_email" placeholder="Insert your email" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="user_password">Password</label>
                    </th>
                    <td>
                        <input type="password" name="user_password" id="user_password" placeholder="Insert password" required>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="user_password2">Password Confirmation</label>
                    </th>
                    <td>
                        <input type="password" name="user_password2" id="user_password2" placeholder="Confirm your password" required>
                    </td>
                </tr>
				<tr>
                    <th>
                        User Type
					</th>
                    <td>
                        <select name= "user_type" id="user_type">
						<option value="manager"> manager </option>
						<option value="technician"> technician </option>
						<option value="user"> user </option>
					</select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="register" id="register">Register</button>
                    </td>
                </tr>
            </table>
        </form>
		<button onclick="window.location.href = 'admin.php';">Lists of Users</button>
        <button onclick="window.location.href = 'report.php';">Report for Admin</button>
    </section>
</body>
</html>
