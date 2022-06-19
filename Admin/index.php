<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());

    # Check if the login button have been clicked or not
    if( isset($_POST["login"]) ){
        $user_ID = $_POST["user_ID"];
        $user_password = $_POST["user_password"];
		$user_type = ($_POST["user_type"]);

        $resultA = mysqli_query($conn, "SELECT * FROM systemadministrator WHERE Admin_ID = '$user_ID'");
		$resultM = mysqli_query($conn, "SELECT * FROM manager WHERE Manager_ID = '$user_ID'");
		$resultT = mysqli_query($conn, "SELECT * FROM technician WHERE Technician_ID = '$user_ID'");
		$resultU = mysqli_query($conn, "SELECT * FROM user WHERE User_ID = '$user_ID'");
		
        if( $user_type == 'admin' && mysqli_num_rows($resultA) === 1 ){
            $row = mysqli_fetch_assoc($resultA);
            if( $user_password == $row["Admin_password"] ){
                $_SESSION["adminid"] = "$user_ID";
                echo $sessionid;
                header("Location: admin.php");
            }
        }
		else if( $user_type == 'manager' && mysqli_num_rows($resultM) === 1 ){
            $row = mysqli_fetch_assoc($resultM);
            if( password_verify($user_password, $row["Manager_password"]) ){
                $_SESSION["managerid"] = "$user_ID";
                echo $sessionid;
                header("Location: ../Manager/complaintform.php");
            }
        }
		else if( $user_type == 'technician' && mysqli_num_rows($resultT) === 1 ){
            $row = mysqli_fetch_assoc($resultT);
            if( password_verify($user_password, $row["Technician_password"]) ){
                $_SESSION["sessionid"] = "$user_ID";
                echo $sessionid;
                header("Location: ../Technician/technician.php");
            }
        }
		else{
            $row = mysqli_fetch_assoc($resultU);
            if( password_verify($user_password, $row["User_password"]) ){
                $_SESSION["userid"] = "$user_ID";
                echo $sessionid;
                header("Location: ../User/Main.php");
            }
        }

        $error = true;

    }
?>

<!DOCTYPE html>
<div class="header">
  <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="95" align="center">
  <h1>  <h1>FK-Booking</h1></h1>
</div>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
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
            width: 100%;
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

        td{
            width: 60%;
        }

        input{
            width: 90%;
        }

        #errormessage{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <section class="login">
        <h1 class="loginh1">User Login</h1>
        <?php if( isset($error) ) : ?>
            <p id="errormessage">Invalid ID and/or password</p>
        <?php endif; ?>
        <form action="" method="post">
            <table id="formTable">
                <tr>
                    <th>
                        <label for="user_ID">User ID</label>
                    </th>
                    <td>
                        <input type="number" name="user_ID" id="user_ID" required>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="user_password">Password</label>
                    </th>
                    <td>
                        <input type="password" name="user_password" id="user_password" required>
                    </td>
                </tr>
				<tr>
                    <th>
                        User Type
					</th>
                    <td>
                        <input list="user_type" name="user_type">
                        <datalist id="user_type">
						   <option value="admin"></option>
                           <option value="manager"></option>
                           <option value="technician"></option>
                           <option value="user"></option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="login" id="login">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>