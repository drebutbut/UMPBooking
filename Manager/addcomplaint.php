<?php
session_start();

include("fkdb.php");

$managerid = intval($_SESSION["managerid"]);

extract($_POST);

$data = mysqli_query($conn, "SELECT * FROM booking WHERE Book_ID = '$bookid'");
$row = mysqli_fetch_assoc($data);

$ctype = $row['Accom_ID'];

$assigndate = date("Y-m-d H:i:s");

$query = "INSERT INTO assign (Assign_ID, Accom_ID, Manager_ID, Technician_ID, assignDate, Assign_status, Book_ID) VALUES('', '$ctype', '$managerid', '$cdesc','$assigndate', 'Assigned', $bookid)";
$query2 = "UPDATE booking SET Book_status = 'Technician Assigned' WHERE Book_ID=$bookid";

if (mysqli_query($conn, $query)) {
    mysqli_query($conn, $query2);
      
   echo "<script type='text/javascript'> window.location='viewcomplaint.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>