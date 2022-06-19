<?php
    require 'connect.php';

    # Check if the submit button have been clicked or not
    if( isset($_POST["submit"]) ){
        $item_name = strtolower($_POST["item_name"]);
		$item_quantity = strtolower($_POST["item_quantity"]);

        mysqli_query($conn, "INSERT INTO requirement (Requirement_ID, Item_name, Item_quantity) VALUES('', '$item_name', '$item_quantity')");

        if(mysqli_affected_rows($conn) > 0){
            echo "<script>
                alert('Item added!')
                </script>";
        }
        else{
            echo mysqli_error($conn);
        }
    }
	
	$data = mysqli_query($conn, "SELECT * FROM requirement");
    
    $test = mysqli_fetch_row($data);
    // var_dump($test);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirement</title>
    <style>
        section{
            width: 40%;
            margin:auto;
            padding: 0px 20px 20px 20px;
            border: 1px solid black;
            border-radius: 25px;
            text-align: center;
        }

        form{
            padding: 20px;
            width: 80%;
            margin: auto;
        }

        table{
            width: 100%;
        }
		
		table, tr, th, td{
            border: 1px solid black;
        }
		
        th, td{
            padding: 10px;
        }

        th{
            width: 40%;
        }

        td{
            width: 60%;
        }

        input{
            width: 90%;
        }
    </style>
</head>
<body>
    <section class="requirement">
    <h1 class="rq">Requirement</h1>
	<h2>The list of item that can be borrow</h2>
	<ul>
	<li>Table</li>
	<li>Chair</li>
	<li>Projector</li>
	<li>Wire extension</li>
	</ul>
        <form action="" method="post">
            <table id="formTable">                
                <tr>
                    <th>
                        <label for="item_name">Item Name</label>
                    </th>
                    <td>
                        <input type="item_name" name="item_name" id="item_name" placeholder="Insert item name" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="item_quantity">Quantity</label>
                    </th>
                    <td>
                        <input type="item_quantity" name="item_quantity" id="item_quantity" placeholder="Insert item quantity" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="submit" id="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
	
    <h2>All Required things</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Item Name</th>
            <th>Quantity</th>
			<th></th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($data as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["Item_name"]; ?></td>
                <td><?= $row["Item_quantity"]; ?></td>
				<td>
                    <a href="update.php?id=<?= $row["Requirement_ID"] ?>">Update</a>
                    <a href="delete.php?id=<?= $row["Requirement_ID"] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>