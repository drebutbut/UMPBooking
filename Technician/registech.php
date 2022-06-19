<?php
    require 'connect.php';

    # Check if the register button have been clicked or not
    if( isset($_POST["register"]) ){
        # htmlspecialchars used to avoid HTML or JavaScript code input to the code
        $technician_name = htmlspecialchars($_POST["technician_name"]);
        $technician_email = htmlspecialchars($_POST["technician_email"]);
        # mysqli_real_escape_string used to let techinician input string with parantheses into the password
        $technician_password = mysqli_real_escape_string($conn, $_POST["technician_password"]);
        $technician_password2 = mysqli_real_escape_string($conn, $_POST["technician_password2"]);

        # Check password confirmation
        if( $technician_password !== $technician_password2 ){
            echo "
                <script>
                    alert('Password not match')
                </script>            
            ";
            return false;
        }

        # Password encryption using PASSWORD_DEFAULT algorithm via password_hash
        $technician_password = password_hash($technician_password, PASSWORD_DEFAULT);

        # Insert technician
        $query = mysqli_query($conn, "INSERT INTO technician 
            (technician_ID, 
            technician_name, 
            technician_password, 
            technician_email,
            technician_pic) 
            VALUES(
                '', 
                '$technician_name', 
                '$technician_password', 
                '$technician_email',
                'default.png')
        ");

        # If there are rows affected alert the user
        if( mysqli_affected_rows($conn) > 0 ){
            echo "
                <script>
                    alert('Technician added!')
                    document.location.href = 'logintech.php'
                </script>
            ";
        }
        else{
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Technician</title>
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

    <section class="form-bubble">
        <h1>UMP Booking - Technician</h1>
        <h4>Register your account</h4>
        <form action="" method="post" class="form-class">
            <label for="technician_name">Technician Name</label>
            <input type="text" name="technician_name" id="technician_name" placeholder="Insert your name" required autocomplete = "off">
            <label for="technician_email">Email</label>
            <input type="email" name="technician_email" id="technician_email" placeholder="Insert your email" required autocomplete = "off">
            <label for="technician_password">Password</label>
            <input type="password" name="technician_password" id="technician_password" placeholder="Insert your password" required autocomplete = "off">
            <br>
            <label for="technician_password2">Confirm Password</label>
            <input type="password" name="technician_password2" id="technician_password2" placeholder="Confirm your password" required autocomplete = "off">
            <button type="submit" name="register" id="register">REGISTER</button>
        </form>
        <br>
        <p>Already have an account? <a href="logintech.php">Login here</a></p>
    </section>

    <section>
        <footer>
            <p style="font-size:20px">Faculty of Computing</p>
        </footer>
    </section>
</body>
</html>