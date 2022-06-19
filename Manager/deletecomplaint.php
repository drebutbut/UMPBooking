<?php

include ("fkdb.php");

$newcid = $_GET['id'];

$query = "DELETE FROM assign WHERE Assign_ID = '$newcid'";
$result = mysqli_query($conn,$query) or die ("Could Not Execute Query for Delete");

if($result){
echo "<script type= 'text/javascript'> window.location='viewcomplaint.php'</script>";
}
?>