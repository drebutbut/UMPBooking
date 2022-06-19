<?php
    require 'connect.php';

    $id = $_GET['id'];

    $data = mysqli_query($conn, "SELECT * FROM accommodation WHERE Accom_ID = '$id'");

    $row = mysqli_fetch_assoc($data);

    if( isset($_POST['update']) ){
        $accomname = $_POST['accomname'];
        $accomloc = $_POST['accomloc'];

        mysqli_query($conn, "UPDATE accommodation SET
                                Accom_name = '$accomname',
                                Accom_location = '$accomloc'
                                WHERE Accom_ID = '$id'");
        
        if( mysqli_affected_rows($conn) > 0 ){
            echo "
                <script>
                    alert('Data updated!')
                    document.location.href = 'accommodation.php'
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
    <title>Update Accommodation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="techstyles.css">
</head>
<body>
    <section class="form-bubble">
        <h2>Update Accommodation</h2>
        <br>
        <form action="" method="post" class="form-class">
            <label for="accomid">Accommodation ID</label>
            <br>
            <input type="number" name="accomid" id="accomid" disabled value="<?= $row['Accom_ID'] ?>">
            <br>
            <label for="accomname">Accommodation Name</label>
            <br>
            <input type="text" name="accomname" id="accomname" required value="<?= $row['Accom_name'] ?>">
            <br>
            <label for="accomloc">Accommodation Location</label>
            <br>
            <input type="text" name="accomloc" id="accomloc" required value="<?= $row['Accom_location'] ?>">
            <br>
            <br>
            <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
        </form>
        <br>
        <a href="accommodation.php" class="btn btn-secondary" role="button">Back</a>
        <br>
    </section>
</body>
</html>