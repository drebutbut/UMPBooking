<?php
    # Start session
    session_start();

    # Connect PHP to MySQL Database
    require 'connect.php';

    # Get the value from sessionid and convert it to integer value. After that, store in a variable
    $sessionid = intval($_SESSION["sessionid"]);

    # Run the MySQL Query
    $result = mysqli_query($conn, "SELECT * FROM technician WHERE Technician_ID = $sessionid");

    # Extract the table as associative array
    $data = mysqli_fetch_assoc($result);

    # Declare a function to manage image file
    function upload(){
        # Store file name, file size, error, and temporary name from the file
        $fileName = $_FILES['technician_pic']['name'];
        $fileSize = $_FILES['technician_pic']['size'];
        $error = $_FILES['technician_pic']['error'];
        $temp = $_FILES['technician_pic']['tmp_name'];

        # Check if there is any picture uploaded
        if( $error === 4 ){
            $newFileName = 'profilepic/default.png';
            exit;
        }

        # Declare the acceptable extensions
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
                    document.location.href = 'profiletech.php'
                </script>
            ";
        }

        # Check file size
        if( $fileSize > 1000000 ){
            echo "
                <script>
                    alert('File is too big. Please upload smaller file')
                    document.location.href = 'profiletech.php'
                </script>
            ";
        }

        # Upload to directory
        # Create a new unique name for picture
        $newFileName = uniqid();
        # Add '.'
        $newFileName .= '.';
        # Add extension
        $newFileName .= $picExtension;

        # Move to directory
        move_uploaded_file($temp, 'profilepic/'.$newFileName);

        return $newFileName;
    }

    if( isset($_POST["submit"]) ){
        # Get the value from form with post method
        $technician_id = $sessionid;
        $technician_name = htmlspecialchars($_POST['technician_name']);
        $technician_email = htmlspecialchars($_POST['technician_email']);
        $technician_password = mysqli_real_escape_string($conn, $_POST['technician_password']);
        $technician_pic = upload();

        $technician_password = password_hash($technician_password, PASSWORD_DEFAULT);

        # If upload file, picture data will be not updated
        if( !$technician_pic ){
            return false;
        }

        # Declare the MySQL Query
        $update_query = "UPDATE technician SET
                            Technician_name = '$technician_name',
                            Technician_email = '$technician_email',
                            Technician_password = '$technician_password',
                            Technician_pic = '$technician_pic'
                            WHERE Technician_ID = $technician_id";

        # Run the MySQL QUery
        $result = mysqli_query($conn, $update_query);

        if( mysqli_affected_rows($conn) > 0 ){
            echo "
                <script>
                    alert('Technician updated')
                    document.location.href = 'profiletech.php'
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Update failed')
                    document.location.href = 'profiletech.php'
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
    <title>Update Technician</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyles.css">
</head>
<body>
    <section class="form-bubble">
        <table class="table table-borderless">
        <form action="" method="post" enctype="multipart/form-data">
                <tr>
                    <th>Technician ID</th>
                    <td>
                        <input type="number" name="technician_ID" id="technician_ID" disabled value="<?= $data['Technician_ID']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="technician_name">Technician Name</label>
                    </th>
                    <td>
                        <input type="text" name="technician_name" id="technician_name" value="<?= $data['Technician_name']; ?>" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="technician_email">Technician Email</label>
                    </th>
                    <td>
                        <input type="email" name="technician_email" id="technician_email" value="<?= $data['Technician_email']; ?>" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="technician_password">Technician Password</label>
                    </th>
                    <td>
                        <input type="password" name="technician_password" id="technician_password">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="technician_pic">Profile Picture</label>
                    </th>
                    <td>
                        <input type="file" name="technician_pic" id="technician_pic" value="<?= $data['Technician_pic']; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                        <a href="profiletech.php" class="btn btn-secondary" role="button">Back</a>
                    </td>
                </tr>
            </form>
        </table>
    </section>
</body>
</html>