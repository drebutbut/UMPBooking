<?php
include("db.php");

$newbid = $_GET['id'];

$query = "SELECT * FROM booking WHERE Book_ID = '$newbid'";
$result = mysqli_query($conn, $query) or die("Could Not Execute Query for Update");
$row = mysqli_fetch_assoc($result);

// $btime = $row['Book_time'];
// $bdate = $row['Book_date'];
// $capacity = $row['Book_Capacity'];
// $purpose = $row['Book_purpose'];
?>
<style>
    	body {
			width: 100%;
			margin: auto;
			font-family: 'Times New Roman';
			background-color: #C1DEAE;
		}
    </style>
<html>

<head>
</head>

<body>
    <header>
    </header>

    <center>
        <h3> BOOKING FORM</h3>
    </center>
    <form method="post" action="Update_Book.php">

        <table>
        <tr>
                <td>Full name:</td>
                <td><input type="text" name="name" ></td>
            </tr>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Booking Time:</td>
                <td><input type="text" name="btime" value="<?php echo $btime; ?>"></td>
            </tr>
            <br>
            <tr>
                <td>Booking Date:</td>
                <td><input type="date" name="bdate" value="<?php echo $bdate; ?>"></td>
            </tr>
            <br>
            <tr>
                <td>Capacity:</td>
                <td><input type="int" name="capacity" value="<?php echo $capacity;?>"></td>
            </tr>
            
            <br>
            <tr>
                <td>Purpose:</td>
                <td><input type="text" name="purpose" value="<?php echo $purpose; ?>"></td>
            </tr>
      
        </table>
        <input type ="hidden" name="id" value="<?php echo $newbid; ?>">
			<center><input type="submit" class="button" value="UPDATE"></center>
			<center><input type="reset" class="button" value="RESET"></center>
            </form>
    
    </div>
   
    </head>
    </html>