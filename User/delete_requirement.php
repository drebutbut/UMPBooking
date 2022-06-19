<!-- buang.php -->
<!-- To delete one particular data. -->

<?php

include ("db.php");

$newrid = $_GET['id'];

$query = "DELETE FROM requirement WHERE Requirement_ID = '$newrid'";
$result = mysqli_query($conn,$query) or die ("Could not execute query for Delete");

if($result){
echo "<script type= 'text/javascript'> window.location='viewbooking.php'</script>";
}
?>