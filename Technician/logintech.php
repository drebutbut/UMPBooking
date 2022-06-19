<?php
    # Start Session
    session_start();

    # Connect to database via file
    require 'connect.php';

    #Check if the login button have been clicked or not
    if( isset($_POST["login"]) ){
        # Store the information in variables
        $technician_id = $_POST['technician_id'];
        $technician_password = $_POST['technician_password'];

        # Check the ID in database
        $query = mysqli_query($conn, "SELECT * FROM technician WHERE Technician_ID = '$technician_id'");
        if( mysqli_num_rows($query) === 1 ){
            $row = mysqli_fetch_assoc($query);
            # Verify the input password with encrypted password
            if( password_verify($technician_password, $row["Technician_password"]) ){
                $_SESSION["sessionid"] = "$technician_id";
                header("Location: technician.php");
                exit;
            }

            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Login</title>
    <link rel="stylesheet" href="techstyles.css">
    <link rel="stylesheet" href="headerfooter.css">
</head>
<body>
    <section class="header-in">
        <header>
	        <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="80" align="left">
		    <h2>FK BOOKING UMP SYSTEM</h2>
		    <h3>Technician Login</h3>
	    </header>
    </section>

    <section class="form-bubble" style="margin-top:100px;">
        <h1>UMP Booking - Technician</h1>
        <h4>Sign into your account</h4>
        <?php if( isset($error) ) : ?>
            <div class="errordiv">
                <p id="errormessage">Invalid ID and/or Password</p>
            </div>
        <?php endif; ?>
        <form action="" method="post" class="form-class">
            <input type="number" name="technician_id" id="technician_id" placeholder="Technician ID" required autocomplete = "off">
            <br>
            <input type="password" name="technician_password" id="technician_password" placeholder="Password" autocomplete = "off">
            <br>
            <button type="submit" name="login" id="login">LOGIN</button>
        </form>
        <br>
        <p>Don't have an account? <a href="registech.php">Register here</a></p>
    </section>

    <section>
        <footer>
            <p style="font-size:20px">Faculty of Computing</p>
        </footer>
    </section>
</body>
</html>