<?php
    # Start session
    session_start();

    # Connect PHP to MySQL
    require 'connect.php';

    # Get the value from sessionid and convert it to integer value. After that, store in a variable
    $sessionid = intval($_SESSION["sessionid"]);

    # Run the MySQL Query
    $query = mysqli_query($conn, "SELECT * FROM assign WHERE Technician_ID = '$sessionid'");

    # If the search button clicked, search the row with value that contain the search content
    if( isset($_POST['search']) ){
        # Get the value from form with post method
        $search = $_POST["searchbar"];
        # Declare MySQL Query that join two tables and look for the search content
        $searchquery = "SELECT 
            assign.Assign_ID,
            assign.Manager_ID,
            assign.Accom_ID,
            assign.Assign_status,
            assign.readyDate,
            booking.Book_ID,
            booking.Requirement_ID,
            booking.book_date
            FROM booking
            INNER JOIN assign
            ON assign.Book_ID = booking.Book_ID
            WHERE
            assign.Technician_ID = '$sessionid' AND
            (assign.Assign_ID LIKE '%$search%' OR
            assign.Manager_ID LIKE '%$search%' OR
            assign.Accom_ID LIKE '%$search%' OR
            assign.Assign_Status LIKE '%$search%' OR
            booking.Book_ID LIKE '%$search%' OR
            booking.Requirement_ID LIKE '%$search%' OR
            booking.book_date LIKE '%$search%')
            ORDER BY booking.book_date ASC
        ";

        # Run the MySQL Query
        $query = mysqli_query($conn, $searchquery);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyles.css">
</head>
<body>
    <section class="detail-bubble">
        <h1>Assignment History</h1>
        <br>
        <div class="search-form">
            <form action="" method="post">
                <input type="search" name="searchbar" id="searchbar" placeholder="Search" class="form-control">
                <button class="btn btn-outline-success" type="submit" name="search" id="search">Search</button>
            </form>
        </div>
        <br>
        <table class="table table-striped">
            <?php $index = 1; ?>
            <tr>
                <th>No</th>
                <th>Assign ID</th>
                <th>Manager ID</th>
                <th>Book ID</th>
                <th>Accommodation ID</th>
                <th>Status</th>
                <th>Ready Date</th>
            </tr>
            <?php foreach($query as $row) : ?>
                <tr>
                    <td><?= $index; ?></td>
                    <td><?= $row['Assign_ID']; ?></td>
                    <td><?= $row['Manager_ID']; ?></td>
                    <td><?= $row['Book_ID']; ?></td>
                    <td><?= $row['Accom_ID']; ?></td>
                    <td><?= $row['Assign_status']; ?></td>
                    <td><?= $row['readyDate']; ?></td>
                </tr>
                <?php $index++; ?>
            <?php endforeach; ?>
        </table>
        <a href="technician.php" class="btn btn-secondary" role="button">Home Page</a>
    </section>
</body>
</html>