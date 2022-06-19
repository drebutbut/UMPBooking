<?php
    # Start session
    session_start();

    # Connect PHP to MySQL Database
    require 'connect.php';

    # Store the Assignment ID in a variable
    $assign_ID = $_GET['id'];

    # Run MySQL Query to get all the value from assign table and extract the data to associative array
    $result = mysqli_query($conn, "SELECT * FROM assign WHERE Assign_ID = $assign_ID");
    $data = mysqli_fetch_assoc($result);

    # Store the value of Accom_ID to a variable
    $accom_ID = $data['Accom_ID'];

    # Run MYSQL Query to get all the value from accommodation table and extract the data to associative array
    $accomDetails = mysqli_query($conn, "SELECT * FROM accommodation WHERE Accom_ID = $accom_ID");
    $accomData = mysqli_fetch_assoc($accomDetails);

    # If the remove button clicked, set the aasign_pic value as NULL to delete it
    if( isset($_POST['remove']) ){
        $query = mysqli_query($conn, "UPDATE assign SET assign_pic = NULL WHERE Assign_ID = $assign_ID");
        echo "
            <script>
                alert('Image removed!')
                document.location.href = 'technician.php'
            </script>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyles.css">
</head>
<body>
    <section class="detail-bubble">
    <table class= "table table-borderless">
        <tr>
            <th>Assign ID</th>
            <td><?= $data['Assign_ID']; ?></td>
        </tr>
        <tr>
            <th>Book ID</th>
            <td><?= $data['Book_ID']; ?></td>
        </tr>
        <tr>
            <th>Accommodation ID</th>
            <td><?= $data['Accom_ID']; ?></td>
        </tr>
        <tr>
            <th>Accommodation Name</th>
            <td><?= $accomData['Accom_name']; ?></td>
        </tr>
        <tr>
            <th>Accommodation Location</th>
            <td><?= $accomData['Accom_location']; ?></td>
        </tr>
        <?php if( $data['assign_pic'] !== NULL ) : ?>
            <tr>
                <th>Assignment Ready</th>
                <td>
                    <img src="assignpic/<?= $data['assign_pic']; ?>" alt="Assignment Documentation" class="img-assign">
                    <br>
                    <br>
                    <form action="" method="post">
                        <button type="submit" class="btn btn-danger" name="remove">Remove Image</button>
                    </form>
                </td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="technician.php" class="btn btn-primary" role="button">Home Page</a>
    </section>
</body>
</html>