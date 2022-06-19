<?php
	$conn = mysqli_connect("localhost", "root", "", "book_ump");

	$query = mysqli_query($conn, "SELECT * FROM accommodation");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  
	<style>
		#table {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 60%;
			margin-top: 100px;
			margin-left: 250px;
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
			position: fixed;
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
		header h3 {
			position: absolute;
			margin-top: 80px;
			font-family: 'Times New Roman';
			font-size: 20px;
			left: 20%;
			color: white;
		}
        .form
		{
			border-radius: 10px;
			border: 2px solid black;
			height: 50%;
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
			text-align: right;
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
		height: 100%;
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
</head>


<header>
		<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="70" align="left">
		<h2>FK BOOKING UMP SYSTEM</h2>
        
	</header>
      
    </div>	
		
	</header>
<body>
	<!--dashboard sidebar-->
	<div class="sidebar">
    <div class="logo-details">
      
    </div>
      <ul class="nav-links">
        <li>
          <a href="Main.php" class="active">
            <span class = "links_name" >Booking Form </span>
          </a>
        </li>
        <li>
          <a href="viewbooking.php"  >
            <span class="links_name">Booking Details</span>
          </a>
        </li>
        <li>
          <a href="report.php" >
            <span class="links_name">Booking Report</span>
          </a>
        </li>
		<li>
          <a href="../Complaint/Homepage.php" >
            <span class="links_name">Booking Complaint</span>
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



    <div class="form">
		<center><h3>BOOKING FORM</h3></center>
		<br><br>
		<form method="post" action="addbooking.php">

<table>
<tr>
		<td>Full name:</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td>ID</td>
		<td><input type="text" name="id"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="email" name="email"></td>
	</tr>

	<tr>
		<td>Accommodation</td>
		<td>
			<select name="accom" id="accom">
				<?php foreach($query as $row) : ?>
					<option value="<?= $row['Accom_ID']; ?>">
					<?= $row['Accom_ID'] ?> - <?= $row['Accom_name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</td>
	</tr>

	<tr>
		<td>Booking Time:</td>
		<td><input type="time" name="btime"></td>
	</tr>
	<br>
	<tr>
		<td>Booking Date from:</td>
		<td><input type="date" name="bdate"></td>
	</tr>
	
	<br>
	<tr>
		<td>Capacity:</td>
		<td><input type="int" name="capacity"></td>
	</tr>
	
	<br>
	<tr>
		<td>Purpose:</td>
		<td><input type="text" name="purpose"></td>
	</tr>
<tr>
	<td>
	<input type="submit" name="AddBooking" value="continue">
	</td>
</tr>
</table>
    </div>
	
	<footer>
		<p style="font-size: 20px">Faculty of Computing</p>
	</footer>
</body>
</html>