<?php
    # Start session
    session_start();

    # Connect PHP to MySQL Database
    require 'connect.php';

    # Get the value from sessionid and convert it to integer value. After that, store in a variable
    $sessionid = intval($_SESSION["sessionid"]);

    # Get date
    $date = date('Y-m-d H:i:s');

    # Run the MySQL Query
    $jointable = mysqli_query($conn, "SELECT 
                    assign.Assign_ID,
                    assign.Manager_ID,
                    assign.Accom_ID,
                    assign.Assign_status,
                    booking.Book_ID,
                    booking.Requirement_ID,
                    booking.book_date
                    FROM booking
                    INNER JOIN assign
                    ON assign.Book_ID = booking.Book_ID
                    WHERE assign.technician_ID = $sessionid AND booking.book_date >= '$date'
                    ORDER BY booking.book_date ASC
                ");
    
    # Extract the join table as associative array
    $newjoin = mysqli_fetch_assoc($jointable);

    # Run the MySQL Query
    $result = mysqli_query($conn, "SELECT * FROM assign WHERE Technician_ID = '$sessionid' ORDER BY Assign_status ASC");
    $technician = mysqli_query($conn, "SELECT * FROM technician WHERE Technician_ID = '$sessionid'");

    # Extract the join table as associative array
    $data = mysqli_fetch_assoc($technician);
    $assign = mysqli_fetch_assoc($result);

    # Run the MySQL Query to get the number of tasks, ready task and assigned task
    $complete = mysqli_query($conn, "SELECT COUNT(Assign_ID) FROM assign WHERE Assign_status = 'Ready' AND Technician_ID = $sessionid");
    $assigned = mysqli_query($conn, "SELECT COUNT(Assign_ID) FROM assign WHERE Assign_status = 'Assigned'  AND Technician_ID = $sessionid");
    $total = mysqli_query($conn, "SELECT COUNT(Assign_ID) FROM assign WHERE Technician_ID = $sessionid");

    # Extract the join table as associative array
    $cmplt = mysqli_fetch_assoc($complete);
    $assgnd = mysqli_fetch_assoc($assigned);
    $ttl = mysqli_fetch_assoc($total);

    # Count the percentage
    if( $ttl["COUNT(Assign_ID)"] != 0 )
        $percentage = ($cmplt["COUNT(Assign_ID)"]/$ttl["COUNT(Assign_ID)"]) * 100;
    
    $report = false;

    # Get the date name for chart.js from the device month to two months behind
    $month = getdate(date("U"));
    $monthbefore1 = getdate(date("U", strtotime("-1 months")));
    $monthbefore2 = getdate(date("U", strtotime("-2 months")));

    # Get the month in particular
    $dateMonth = $month["mon"];
    $dateMonthBefore1 = $monthbefore1["mon"];
    $dateMonthBefore2 = $monthbefore2["mon"];

    # Run the MySQL Query
    $dataMonth = mysqli_query($conn, "SELECT COUNT(Assign_ID) FROM assign WHERE MONTH(readyDate) = $dateMonth AND Technician_ID = $sessionid");
    $dataMonthBefore1 = mysqli_query($conn, "SELECT COUNT(Assign_ID) FROM assign WHERE MONTH(readyDate) = $dateMonthBefore1 AND Technician_ID = $sessionid");
    $dataMonthBefore2 = mysqli_query($conn, "SELECT COUNT(Assign_ID) FROM assign WHERE MONTH(readyDate) = $dateMonthBefore2 AND Technician_ID = $sessionid");
    
    # Extract the join table as associative array
    $dtMnth = mysqli_fetch_assoc($dataMonth);
    $dtMnth1 = mysqli_fetch_assoc($dataMonthBefore1);
    $dtMnth2 = mysqli_fetch_assoc($dataMonthBefore2);

    # If search button is clicked, search the data
    if( isset($_POST['search']) ){
        $search = $_POST["searchbar"];
        $query = "SELECT 
            assign.Assign_ID,
            assign.Manager_ID,
            assign.Accom_ID,
            assign.Assign_status,
            booking.Book_ID,
            booking.Requirement_ID,
            booking.book_date
            FROM booking
            INNER JOIN assign
            ON assign.Book_ID = booking.Book_ID
            WHERE
            (assign.Assign_ID LIKE '%$search%' OR
            assign.Manager_ID LIKE '%$search%' OR
            assign.Accom_ID LIKE '%$search%' OR
            assign.Assign_Status LIKE '%$search%' OR
            booking.Book_ID LIKE '%$search%' OR
            booking.Requirement_ID LIKE '%$search%' OR
            booking.book_date LIKE '%$search%') AND
            booking.book_date >= '$date' AND
            assign.Technician_ID = '$sessionid'
            ORDER BY booking.book_date ASC
        ";

        # Run the MySQL Query
        $jointable = mysqli_query($conn, $query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home of The Technician</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyles.css">
</head>
<body>
    <section class="header">
        <header>
            <nav class="nav-bar">
                <div id="navTitle">
                    <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="80" align="left">
		            <h2>FK BOOKING UMP SYSTEM</h2>
                </div>
                <div id="navInfo">
                    <a href="accommodation.php">Accommodation</a>
		    <a href="historytech.php">History</a>
                    <a href="profiletech.php">Profile</a>
                    <a href="logouttech.php">Logout</a>
                </div>
            </nav>
        </header>
    </section>

    <section class="report">
        <h1>Welcome, <?= $data['Technician_name']; ?>!</h1>
        <h3>Have a look at your report</h3>
        <div>
            <!-- Canvas for chart.js -->
            <canvas id="myChart"></canvas>
        </div>
        <br>
        <p>
            You've completed <?= $cmplt["COUNT(Assign_ID)"]; ?> out of <?= $ttl["COUNT(Assign_ID)"]; ?> assigned tasks. 
            <?php if( isset($percentage) ) : ?>
                It is <?= $percentage; ?>% of your work.
            <?php endif; ?>
        </p>
        <p>You got <?= $assgnd["COUNT(Assign_ID)"]; ?> left to do. You got this!</p>
    </section>

    <section class="todosec">
        <h1>To Do List</h1>
        <h3>Assigned tasks to do</h3>
        <br>
        <div class="search-form">
            <form action="" method="post">
                <input type="search" name="searchbar" id="searchbar" placeholder="Search" class="form-control">
                <button class="btn btn-outline-success" type="submit" name="search" id="search">Search</button>
            </form>
        </div>
        <br>
        <?php $index = 1; ?>
        <table class="table table-striped" id="todotable">
        <tr>
                <th>No</th>
                <th>Assign ID</th>
                <th>Manager ID</th>
                <th>Accom ID</th>
                <th>Booking ID</th>
                <th>Requirement ID</th>
                <th>Book Date</th>
                <th colspan="2">Assignment Status</th>
            </tr>
            <?php foreach($jointable as $rows) : ?>
                <tr>
                    <td><?= $index; ?></td>
                    <td><?= $rows["Assign_ID"]; ?></td>
                    <td><?= $rows["Manager_ID"]; ?></td>
                    <td><?= $rows["Accom_ID"]; ?></td>
                    <td><?= $rows["Book_ID"]; ?></td>
                    <td><?= $rows["Requirement_ID"]; ?></td>
                    <td><?= $rows["book_date"]; ?></td>
                    <td><?= $rows["Assign_status"]; ?></td>
                    <td>
                        <a href="assigndetails.php?id=<?= $rows['Assign_ID'] ?>" role="button" class="btn btn-secondary">Details</a>
                        <a href="assignupdate.php?id=<?= $rows['Assign_ID'] ?>" role="button" class="btn btn-primary">Update Status</a>
                    </td>
                </tr>
                <?php $index++; ?>
            <?php endforeach; ?>
        </table>
    </section>

    <section class="footer">
        <footer>
            <h3>Faculty of Computing</h3>
        </footer>
    </section>

    <!-- chart.js script start -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = [
            '<?= $monthbefore2["month"]; ?>',
            '<?= $monthbefore1["month"]; ?>',
            '<?= $month["month"]; ?>',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Completed and Ready',
                backgroundColor: '#E8E8A6',
                data: [
                    <?= $dtMnth2['COUNT(Assign_ID)']; ?>,
                    <?= $dtMnth1['COUNT(Assign_ID)']; ?>,
                    <?= $dtMnth['COUNT(Assign_ID)']; ?>
                ],
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
    </script>

    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    <!-- chart.js script end -->
</body>
</html>
