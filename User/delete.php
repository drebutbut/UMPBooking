<?php
    $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM requirement WHERE Requirement_ID=$id");

    if($result){
        echo "
            <script>
                alert('Data has been deleted');
                document.location.href = 'requirement.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data failed to delete');
                document.location.href = 'requirement.php';
            </script>
        ";
    }

    mysqli_close($conn);
?>