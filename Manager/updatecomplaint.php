<?php
session_start();

include ("fkdb.php");

extract($_POST);

$id = intval($_SESSION["managerid"]);

$cdate = date("Y-m-d H:i:s");

$query = "UPDATE assign SET Accom_ID = '$ctype', Technician_ID = '$cdesc', assignDate = '$cdate' WHERE Manager_ID = $id AND Assign_ID = $assignid";

$result = mysqli_query($conn,$query) or die ("Could Not Execute Query for Update");

if($result){
 echo "<script type = 'text/javascript'> window.location='viewcomplaint.php' </script>";
}
?>