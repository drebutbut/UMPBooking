<?php
session_start();

include("db.php");

$userid = intval($_SESSION["userid"]);

extract($_POST);

$purchasedate = date("Y-m-d H:i:s");
$btime = date("Y-m-d H:i:s");

$query = "INSERT INTO booking 
    (Book_id, 
    Accom_id,
    User_ID,
    Book_time,
    purchase_date,
    Book_date,
    Book_Capacity,
    Book_purpose,
    Book_status) VALUES
    ('',
    '$accom',
    '$userid',
    '$btime',
    '$purchasedate',
    '$bdate',
    '$capacity',
    '$purpose',
    'Waiting List'
    )
";

if (mysqli_query($conn, $query)) {
    $book_id = $conn->insert_id;//conn=mengambil booking id

    $_SESSION['bookid'] = "$book_id";//buat session book id dgn value book id
      
   echo "<script type='text/javascript'> window.location='Main2.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
