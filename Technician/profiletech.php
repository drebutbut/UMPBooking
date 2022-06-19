<?php
    # Start session
    session_start();

    # Connect PHP to MySQL Database
    require 'connect.php';

    # Get the value from sessionid and convert it to integer value. After that, store in a variable
    $sessionid = intval($_SESSION["sessionid"]);

    # Run the MySQL Query
    $result = mysqli_query($conn, "SELECT * FROM technician WHERE Technician_ID = $sessionid");

    # Extract the data as associative array
    $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['Technician_name']; ?>'s Profile</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<section class="form-bubble">
    <img src="profilepic/<?= $data['Technician_pic']; ?>" alt="Profile picture" style="width: 70%; border: 1px solid black; border-radius: 50%; display: block; margin: 20px auto;">
    <br>
    <table class="table table-striped">
        <tr>
            <th>Technician ID</th>
            <td><?= $data["Technician_ID"]; ?></td>
        </tr>
        <tr>
            <th>Technician Name</th>
            <td><?= $data["Technician_name"]; ?></td>
        </tr>
        <tr>
            <th>Technician Email</th>
            <td><?= $data["Technician_email"]; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                              
            </td>
        </tr>
        <tr>
            <th>Technician QR Code</th>
            <td>
            <div class="container">
                <p>
                    <a href="technician.php">
                        <span class="glyphicon glyphicon-qrcode"></span>
                    </a>
                </p>
                </div>
            </td>
        </tr>
    </table>
    <a href="updatetech.php" class="btn btn-primary" role="button">Update</a>
    <a href="technician.php" class="btn btn-secondary" role="button">Home Page</a>  
</section>
</body>
</html>
