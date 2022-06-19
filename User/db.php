<!-- dbase.php -->
<!-- To connect between php scripting and database. -->
<?php

define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");
//define("DATABASE_PASSWORD", "password");

// To establish a connection to database and save in $conn
$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER);
//$conn = mysqli_connect("localhost", "root", "", "db_book");;
// If connection failed then dsplay mysql error
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


// To select one particular database to be used
mysqli_select_db($conn,"book_ump") or die( "Could Not Open Products Database");

//set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
?>