<!--Update.php-->
<!--To update data of Edit.php into database.-->
<?php
include ("ComplaintDatabase.php");

extract ($_POST);

//Dapatkan Tarikh Dan Masa Masuk
$tarikh = date("Y-m-d", time());
$masa = date("H:i:s", time());

$query = "UPDATE complaint SET Complaint_date = '$Complaint_date', Complaint_time = '$Complaint_time', Complaint_type = '$Complaint_type', Complaint_desc = '$comment', Complaint_status = '$Complaint_status' WHERE Complaint_ID = '$Complaint_ID'";

$result = mysqli_query($conn,$query) or die ("Could not execute query in Edit.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='View.php' </script>";
}
?>