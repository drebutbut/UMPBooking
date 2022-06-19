<?php
    # Connect PHP to MySQL Database
    require 'connect.php';

    # Run MySQL Query to get all value from accommodation table 
    $result = mysqli_query($conn, "SELECT * FROM accommodation");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accomodation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS File -->
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

    <section class="detail-bubble" style="margin-top: 100px;">
        <h1>Accommodation</h1>
        <br>
        <a href="insertaccom.php" role="button" class="btn btn-primary">Add Accommodation</a>
        <br>
        <br>
        <?php $index = 1; ?>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Accomodation ID</th>
                <th>Accomodation Name</th>
                <th>Accomodation Location</th>
                <th>Action</th>
            </tr>
            <?php while($rows = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $index; ?></td>
                    <td><?= $rows["Accom_ID"]; ?></td>
                    <td><?= $rows["Accom_name"]; ?></td>
                    <td><?= $rows["Accom_location"]; ?></td>
                    <td>
                        <!-- Update button -->
                        <a href="updateaccom.php?id=<?= $rows['Accom_ID'] ?>" role="button" class="btn btn-secondary">Update</a>
                        <!-- Delete button -->
                        <a href="deleteaccom.php?id=<?= $rows['Accom_ID'] ?>" role="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php $index++; ?>
            <?php endwhile; ?>
        </table>
    </section>

    <br>
    <br>

    <section>
        <footer>
            <p style="font-size:20px">Faculty of Computing</p>
        </footer>
    </section>
</body>
</html>