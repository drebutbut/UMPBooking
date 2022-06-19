<!-- Edit.php -->
<!-- Interface of update data. -->

<?php
session_start();
include("ComplaintDatabase.php");

$managerid = intval($_SESSION["managerid"]);

$Complaint_ID = $_GET['Complaint_ID'];

$query = "SELECT * FROM complaint WHERE Complaint_ID = '$Complaint_ID'";
$result = mysqli_query($conn, $query) or die("Could not execute query in Edit.php");
$row = mysqli_fetch_assoc($result);

$Complaint_ID = $row['Complaint_ID'];
$User_ID = $row['User_ID'];
$Complaint_date = $row['Complaint_date'];
$Complaint_time = $row['Complaint_time'];
$Complaint_type = $row['Complaint_type'];
$Complaint_desc = $row['Complaint_desc'];

//@mysql_free_result($result);
?>
<html>

<head>
    <title> Complaint Booking Universiti Malaysia Pahang </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF" text="#000000">
    <form method="post" action="Update.php">
        Complaint_ID:
        <input type="text" name="Complaint_ID" size="40" value="<?php echo $Complaint_ID; ?>" hidden>
        <br>
        Complaint_date:
        <input type="date" name="Complaint_date" size="25" value="<?php echo $Complaint_date; ?>">
        <br>
        Complaint_time:
        <input type="time" name="Complaint_time" size="25" value="<?php echo $Complaint_time; ?>">
        <br>
        Complaint_type:
        <input type="text" name="Complaint_type" size="40" value="<?php echo $Complaint_type; ?>">
        <br>
        Complaint_desc: <br>
        <textarea name="comment" cols="30" rows="8"><?php echo $Complaint_desc; ?></textarea>
        <br>
        <label for="Complaint_status">Complaint Status:</label>
        <select name="Complaint_status" id="Complaint_status">
            <option value="In Investigation">In Investigation</option>
            <option value="Resolved">Resolved</option>
        </select>
        <input type="hidden" name="User_ID" value="<?php echo $User_ID; ?>">
        <input type="submit" value="Change">
        <input type="reset" value="Edit">
        <br>
    </form>
    <hr>
    <div align="centre">[ <a href="View.php" ]>Back to View</a> |
        <a href="Homepage.php">Back to Homepage</a> |
        <a href="Insert.php">More Complaints</a> ]
    </div>
</body>

</html>