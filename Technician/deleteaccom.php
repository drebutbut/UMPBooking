<?php
    # Start session
    session_start();

    # Connect PHP to MySQL Database
    require 'connect.php';

    # Store the Assignment ID in a variable
    $id = $_GET['id'];

    # Run the MySQL Query
    $query = mysqli_query($conn, "DELETE FROM accommodation WHERE Accom_ID = '$id'");

    # Redirect user to main page, which in this case accommodation.php
    header("Location: accommodation.php");
?>