<?php
    # Start session
    session_start();

    # Connect the PHP to MySQL Database
    require 'connect.php';

    # Kill the session
    $_SESSION = [];
    session_unset();
    session_destroy();

    # Redirect user to login page
    header("Location: ../Admin/index.php");
    exit;
?>