<!DOCTYPE html>
<html>
<head>
	
<meta charset="UTF-8">
<meta charset="UTF-8">
  
	<style>
		#table {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
			margin-top: 100px;
			margin-left: 250px;
			
		}

	
		#table tr:nth-child(even) {
			background-color: #219f94;
		}

		#table tr:hover {
			background-color: #ddd;
		}

		#table th {
			padding-top: 8px;
			padding-bottom: 10px;
			text-align: left;
			background-color:#219f94;
			color: white;
			height: 70px;
		}
		
		body {
			width: 100%;
			margin: auto;
			font-family: 'Times New Roman';
			background-color: #C1DEAE;
		}
		header {
			height: 10vh;
			background-color: #219F94;
			text-align: center;
		}
		footer {
			height: 10vh;
			width: 100%;
			left: 0;
			bottom: 0;
			text-align: center;
			color: white;
			font-size: 20;
			font-family: 'Times New Roman';
			font-weight: bold;
			background-color: #219f94;
		}

		header h2 
		{
			padding: 10px;
			text-align: center;
			color: white;
			font-family: 'Times New Roman';
			text-align:left;
			background-color: #219F94;

		}
		h3
		{
			text-align: center;
		}
        .form
		{
			border-radius: 10px;
			border: 2px solid black;
			height: 300px;
			width: 450px;

			position: absolute;
			right: 0;
			left: 0;
			top: 0;
			bottom: 0;
			margin: auto;
			background-color: #F2F5C8;
		}

		.button
		{	
			width: 50%;
			margin-top: 30px;
			background-color: #085fad;
			color: white;
		}

		td
		{
			text-align: center;
		}
		th
		{
			background-color: #E8E8A6;
		}


    

			/*sidebar dashboard*/
			*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: Arial, Helvetica, sans-serif;
		}
		.sidebar{
		position: fixed;
		height: 110%;
		width: 250px;
		background: #1b8f85;
		transition: all 0.5s ease;
		}
		.sidebar.active{
		width: 60px;
		}
		.sidebar .logo-details{
		height: 80px;
		display: flex;
		align-items: center;
		}
		.sidebar .logo-details i{
		font-size: 28px;
		font-weight: 500;
		color: #fff;
		min-width: 60px;
		text-align: center
		}
		.sidebar .logo-details .logo_name{
		color: #fff;
		font-size: 24px;
		font-weight: 500;
		}

		.sidebar .nav-links li{
		position: relative;
		list-style: none;
		height: 50px;
		}
		.sidebar .nav-links li a{
		height: 100%;
		width: 100%;
		display: flex;
		align-items: center;
		text-decoration: none;
		transition: all 0.4s ease;
		}
		.sidebar .nav-links li a.active{
		background: #C1DEAE;
		}
		.sidebar .nav-links li a:hover{
		background: #081D45;
		}
		.sidebar .nav-links li i{
		min-width: 60px;
		text-align: center;
		font-size: 18px;
		color: #000;
		}
		.sidebar .nav-links li a .links_name{
		color: #000;
		font-size: 15px;
		font-weight: 400;
		white-space: nowrap;
		}
		.home-section{
		position: relative;
		background: #f5f5f5;
		min-height: 100vh;
		width: calc(100% - 240px);
		left: 240px;
		transition: all 0.5s ease;
		}
		.sidebar.active ~ .home-section{
		width: calc(100% - 60px);
		left: 60px;
		}
		.home-section nav{
		display: flex;
		justify-content: space-between;
		height: 80px;
		background: #fff;
		display: flex;
		align-items: center;
		position: fixed;
		width: calc(100% - 240px);
		left: 240px;
		z-index: 100;
		padding: 0 20px;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
		transition: all 0.5s ease;
		}
		.sidebar.active ~ .home-section nav{
		left: 60px;
		width: calc(100% - 60px);
		}
		.home-section nav .sidebar-button{
		display: flex;
		align-items: center;
		font-size: 24px;
		font-weight: 500;
		}
		nav .sidebar-button i{
		font-size: 35px;
		margin-right: 10px;
		}
		.home-section nav .search-box{
		position: relative;
		height: 50px;
		max-width: 550px;
		width: 100%;
		margin: 0 20px;
		}
		/
		/*container total .. */
		.overview-boxes .box{
		display: flex;
		align-items: center;
		justify-content: center;
		width: calc(100% / 4 - 15px);
		background: #fff;
		padding: 15px 14px;
		border-radius: 12px;
		box-shadow: 0 5px 10px rgba(0,0,0,0.1);
		}
		/*container number*/
		.home-content .box .number{
		display: inline-block;
		font-size: 35px;
		margin-top: -6px;
		font-weight: 500;
		}
		
		/* Responsive Media Query */
		@media (max-width: 1240px) {
		.sidebar{
			width: 60px;
		}
		.sidebar.active{
			width: 220px;
		}
		.home-section{
			width: calc(100% - 60px);
			left: 60px;
		}
		.sidebar.active ~ .home-section{
			/* width: calc(100% - 220px); */
			overflow: hidden;
			left: 220px;
		}
		}	

	</style>
<header>
		<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="70" align="left">
		<h2>FK BOOKING UMP SYSTEM</h2>
        
	</header>
<body>

	<!--dashboard sidebar-->
	<div class="sidebar">
    <div class="logo-details">
      
    </div>
      <ul class="nav-links">
        <li>
          <a href="Main.php" >
            <span class = "links_name" >Booking Form </span>
          </a>
        </li>
        <li>
          <a href="viewbooking.php"class="active">
            <span class="links_name">Booking Details</span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <span class="links_name">Booking Report</span>
          </a>
        </li>
		
      </ul>
	</div>

	<script>
    	let sidebar = document.querySelector(".sidebar");
    	let sidebarBtn = document.querySelector(".sidebarBtn");
    	sidebarBtn.onclick = function() {
    	sidebar.classList.toggle("active");
    	if(sidebar.classList.contains("active")){
    	sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    	}else
    	sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    	}
 </script>
<style>


</style>
<?php
	include("db.php");

	$query = "SELECT 
	    booking.Book_ID,
		booking.Book_time,
		booking.Book_date,
		booking.Book_Capacity,
		booking.Book_purpose,
		booking.purchase_date,
		booking.Book_status,
		requirement.Requirement_ID,
		requirement.Item_name,
		requirement.Item_quantity
    	FROM requirement
		
    	INNER JOIN booking ON
		
    	requirement.Requirement_ID=booking.Requirement_ID";
    
    $data = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($data);


	
?>

<html>


<body>
	

	<h3>LIST OF BOOKING</h3>

	<table id="table" style="width: 80px"  >
		<thead>
			<tr>
				<th>No</th>
				<th>Booking ID</th>
				<th>Booking TIme</th>
				<th>Book Date</th>
				<th>Book Capacity</th>
				<th>Book Purpose</th>
				<th>Purchase Date</th>
				<th>Booking Action</th>
				<th>Requirement ID</th>
				<th>Setup name</th>
				<th>Setup quantity</th>
				<th>Requirement Action</th>
				<th>Total days left </th>
				<th>Status </th>
				
				
			</tr>
		</thead>
		<tbody>
			<?php $index = 1; ?>
			<?php foreach($data as $row) : ?>
				<tr>
					<td><?= $index; ?></td>
					<td><?= $row["Book_ID"]; ?></td>
					<td><?= $row["Book_time"]; ?></td>
					<td><?= $row["Book_date"]; ?></td>
					<td><?= $row["Book_Capacity"]; ?></td>
					<td><?= $row["Book_purpose"]; ?></td>
					<td><?= $row["purchase_date"]; ?></td>
					<td><a href="Bookingupdateform.php?id=<?php echo $row["Book_ID"]; ?>">UPDATE</a><br>
					<a href="Deletebooking.php?id=<?php echo $row["Book_ID"]; ?>">DELETE</a></td>
					<td><?= $row["Requirement_ID"]; ?></td>
					<td><?= $row["Item_name"]; ?></td>
					<td><?= $row["Item_quantity"]; ?></td>
					
					<td><a href="Requirementupdateform.php?id=<?php echo $row["Requirement_ID"]; ?>">UPDATE</a><br></td>
					<td><a href="Book_calc.php?id=<?php echo $row['Book_ID']; ?>">View</a><br></td>
					<td><?= $row["Book_status"]; ?><td>
					<!-- Display the countdown timer in an element -->
					<td>
						<p id="demo"></p>
						<script>
							countdown(<?= $row["purchase_date"]; ?>)
						</script>
					</td>
					<?php $index++; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
			</table>
			<footer>
		<p style="font-size: 20px">Faculty of Computing</p>
	</footer>


			
	
	