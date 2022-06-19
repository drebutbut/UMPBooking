<?php
    $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());

    $id = $_GET['id'];
	$user_type = $_GET['user_type'];

	
	if( $user_type == 'manager' ){
            $result = mysqli_query($conn, "DELETE FROM manager WHERE Manager_ID=$id");
        }
	else if( $user_type == 'technician' ){
            $result = mysqli_query($conn, "DELETE FROM technician WHERE Technician_ID=$id");
        }
	else{
            $result = mysqli_query($conn, "DELETE FROM user WHERE User_ID=$id");
        }
    if($result){
        echo "
            <script>
                alert('Data has been deleted');
                document.location.href = 'admin.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data failed to delete');
                document.location.href = 'admin.php';
            </script>
        ";
    }

    mysqli_close($conn);
?>