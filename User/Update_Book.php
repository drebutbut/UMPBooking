<?php

include ("db.php");

extract($_POST);



$query = "UPDATE booking SET  Book_time = '$btime', purchase_date = '$bdate', Book_Capacity= '$capacity', Book_purpose='$purpose' where Book_ID='$id'";

$result = mysqli_query($conn,$query) or die ("Could Not Execute Query for Update");

if($result){
 echo "<script type = 'text/javascript'> window.location='viewbooking.php' </script>";
}
?>