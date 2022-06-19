<?php
    # Connect PHP to MySQL Database
    require 'connect.php';

    # If the submit button clicked, insert the accommodation
    if( isset($_POST['submit']) ){
        # Get the value from form with post method
        $Accom_name = $_POST["Accom_name"];
        $Accom_location = $_POST["Accom_location"];

        # Run the MySQL Query
        $query = mysqli_query($conn, "INSERT INTO accommodation 
            (Accom_ID,
            Accom_name,
            Accom_location)
            VALUES(
                '',
                '$Accom_name',
                '$Accom_location'
            )");

        # If there are rows affected, alert the user that insert succeeded. Else, print the error
        if( mysqli_affected_rows($conn) > 0 ){
            echo"
                <script>
                    alert('Accommodation added.')
                    document.location.href = 'accommodation.php'
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
    <title>Insert Accommodation</title>
    <link rel="stylesheet" href="techstyles.css">
</head>
<body>
    <section class="form-bubble">
        <h1>Accommodation</h1>
        <h4>Register accommodation</h4>
        <form action="" method="post" class="form-class">
            <label for="Accom_name">Accommodation Name</label>
            <input type="text" name="Accom_name" id="Accom_name" placeholder="Insert accommodation name" required autocomplete = "off">
            <label for="Accom_location">Accommodation Location</label>
            <input type="text" name="Accom_location" id="Accom_location" placeholder="Insert accommodation location" required autocomplete = "off">
            <button type="submit" name="submit" id="submit">ADD ACCOMMODATION</button>
        </form>
    </section>
</body>
</html>