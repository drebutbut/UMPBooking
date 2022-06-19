<?php

include ("db.php");

extract($_POST);



$query = "UPDATE requirement SET  Item_name = '$requirement', Item_quantity= '$quantity'where requirement_ID='$id'";

$result = mysqli_query($conn,$query) or die ("Could Not Execute Query for Update");

if($result){
 echo "<script type = 'text/javascript'> window.location='viewbooking.php' </script>";
}
?>