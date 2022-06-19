<?php
include("db.php");

$newrid = $_GET['id'];

$query = "SELECT * FROM requirement WHERE Requirement_ID = '$newrid'";
$result = mysqli_query($conn, $query) or die("Could Not Execute Query for Update");
$row = mysqli_fetch_assoc($result);

$requirement = $row['Item_name'];
$quantity = $row['Item_quantity'];

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
<body>
    <header>
    </header>
    <center>
        <h3> SETUP REQUIREMENT</h3>
    </center>
    <form method="post" action="update_requirement.php">
<P>Printer</P>
<p>Audio</p>
<p>Router</p>
<p>Projector screen</p>

  <table>
    <tr>
      <td>Choose your setup<td>
      <td>
  <select name="requirement" multiple>
  <option selected="selected"><?php echo $requirement;?></option>
    <option value="printer">Printer</option>
    <option value="audio">Audio</option>
    <option value="router">Router</option>
    <option value="projector screen">Projector screen</option>
  </select>
</td>
</tr>
<tr>
<td>
  Quantity:
</td>
    <td>
      <input type="number" name="quantity" value="<?php echo $quantity;?>">
    </td> 
</tr>

</table>
<input type ="hidden" name="id" value="<?php echo $newrid; ?>">
			<center><input type="submit" class="button" value="UPDATE"></center>
			<center><input type="reset" class="button" value="RESET"></center>
</form>
</body>
    </html>