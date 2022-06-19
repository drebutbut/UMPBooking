<!-- Insert.php -->
<!-- To insert data of Insert.php into database. -->
<?php
session_start();

include("ComplaintDatabase.php");

$userid = intval($_SESSION["userid"]);

//Dapatkan Tarikh Dan Masa Masuk
extract($_POST);
$Complaint_date = date("Y-m-d", time());
$Complaint_time = date("H:i:s", time());

$query = "INSERT INTO complaint (
    Complaint_ID,
    User_ID,
    Complaint_date,
    Complaint_time,
    Complaint_type,
    Complaint_desc,
    Complaint_status)
    VALUES(
    '',
    $userid,
    '$Complaint_date',
    '$Complaint_time',
    '$Complaint_type',
    '$comment',
    'In Investigation'
    )
    ";

if (mysqli_query($conn, $query)) {

    echo "<script type='text/javascript'> window.location='View.php' </script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}


?>