<?php
session_start();

include("db.php");

extract($_POST);

$bookid = intval($_SESSION["bookid"]);//nilai session id dibuat dalam book id

// $cdate = date("d-m-Y", time());
// $ctime = date("H:i:s", time());

$query = "INSERT INTO requirement (Item_name, Item_quantity) VALUES('$requirement', '$quantity')";

if($conn->query($query) === TRUE){
    $requirement_id = $conn->insert_id;//mengambil nilai requirement id
    
    $bookupdate = mysqli_query($conn, "UPDATE booking SET Requirement_ID = '$requirement_id' WHERE Book_ID = $bookid");//tambah book id yang ada di requirement id
    echo "<script type='text/javascript'> window.location='viewbooking.php' </script>";
}

// if (mysqli_query($conn, $query)) {
      
//    echo "<script type='text/javascript'> window.location='viewbooking.php' </script>";
	
// } 
// else {
//     echo "Error: " . $query . "<br>" . mysqli_error($conn);
// }
?>