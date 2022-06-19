<!-- Delete.php -->
<!-- To delete one particular data. -->

<?php

include("ComplaintDatabase.php");

$Complaint_ID = $_GET['Complaint_ID'];

$query = "DELETE FROM complaint WHERE Complaint_ID = '$Complaint_ID'";
$result = mysqli_query($conn, $query) or die("Could not execute query in Edit.php");

if ($result) {
    echo "<script type= 'text/javascript'> window.location='View.php'</script>";
}
?>