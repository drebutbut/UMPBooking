<?php
    # Start session
    session_start();

    # Connect PHP to MySQL Database
    require 'connect.php';

    # Store the Assignment ID in a variable
    $assign_ID = $_GET['id'];

    $data = mysqli_query($conn, "SELECT * FROM assign WHERE Assign_ID = $assign_ID");
    $row = mysqli_fetch_assoc($data);
    $bookid = $row['Book_ID'];

    # Declare a function to manage image file
    function upload(){
        # Store file name, file size, error, and temporary name from the file
        $fileName = $_FILES['assign_img']['name'];
        $fileSize = $_FILES['assign_img']['size'];
        $error = $_FILES['assign_img']['error'];
        $temp = $_FILES['assign_img']['tmp_name'];

        # Check if there is any picture uploaded
        if( $error === 4 ){
            echo "
                <script>
                    alert('Upload file!')
                </script>
            ";
            exit;
        }

        # Declare the acceptable extension
        $validExtension = ['jpg', 'jpeg', 'png'];
        # explode is used to make string to array
            # Example: picture.png -> ['picture', 'png']
        $picExtension = explode('.', $fileName);
        $picExtension = strtolower(end($picExtension));

        # Check if the picExtension is in validExtention
        if( !in_array($picExtension, $validExtension) ){
            echo "
                <script>
                    alert('File uploaded is not allowed. Please upload file with jpg, jpeg, or png extension')
                    document.location.href = 'technician.php'
                </script>
            ";
        }

        # Check file size
        if( $fileSize > 1000000 ){
            echo "
                <script>
                    alert('File is too big. Please upload smaller file')
                    document.location.href = 'technician.php'
                </script>
            ";
        }

        # Upload to directory
        # Create a new unique name for picture. It is used so no confusion created due to the same name
        $newFileName = uniqid();
        # Add '.'
        $newFileName .= '.';
        # Add extension
        $newFileName .= $picExtension;

        # Move to directory
        move_uploaded_file($temp, 'assignpic/'.$newFileName);

        # Return new file name
        return $newFileName;
    }

    # If submit button is clicked, update the assignment row
    if( isset($_POST["submit"]) ){
        $assign_ID = $assign_ID;
        $readyDate = date('Y-m-d H:i:s');
        $assign_pic = upload();

        # If no file uploaded, alert the user
        if( !$assign_pic ){
            echo"
                <script>
                    alert('Upload file failed')
                </script>
            ";
            return false;
        }

        # Run the MySQL Query to update the table value
        $result = mysqli_query($conn, "UPDATE assign SET
                                        Assign_status='Ready',
                                        readyDate='$readyDate',
                                        assign_pic = '$assign_pic'
                                        WHERE Assign_ID = $assign_ID");

        # If the update succeeded, let the user know. So does when the update is failed
        if( mysqli_affected_rows($conn) > 0 ){
            mysqli_query($conn, "UPDATE booking SET Book_status='Ready' WHERE Book_ID = $bookid");
            echo "
                <script>
                    alert('Status updated!')
                    document.location.href = 'technician.php'
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Status update failed!')
                    document.location.href = 'technician.php'
                </script>
            ";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyles.css">
</head>
<body>
    <section class="form-bubble">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="assign_img" id="assign_img">
            <br>
            <br>
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
            <a href="technician.php" class="btn btn-secondary" role="button">Back</a>
        </form>
    </section>
</body>
</html>