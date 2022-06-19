<!DOCTYPE html>
<html>
<div class="header">
  <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="95" align="center">
  <h1>  <h1>FK-Booking</h1></h1>
</div>
    <head>
        <link rel="stylesheet" >
        <title>Report</title>
		<style>
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

		header h3
		{

			padding: 10px;
			text-align: center;
			color: white;
			font-family: 'Times New Roman';
			text-align: center;
			background-color: #219F94;

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
			background-color: #C1DEAE;
		}

		.button
		{	
			width: 50%;
			margin-top: 30px;
			background-color: #C1DEAE;
			color: white;
		}

		td
		{
			width: 60%;
			text-align: right;
		}
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

        th, td{
            padding: 10px;
        }

        th{
            width: 40%;
        }

        input{
            width: 90%;
        }
</style>
    </head>
    <body>
	<header>
		<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="70" align="left">
		<h2>UMP BOOKING SYSTEM</h2>
	</header>
        <div align="center">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "book_ump") or die(mysqli_connect_error());

                $querydata1 = "SELECT * FROM systemadministrator";
                $querydata2 = "SELECT * FROM manager";
                $querydata3 = "SELECT * FROM technician";
                $querydata4 = "SELECT * FROM user";

                $rs_admin = mysqli_query($conn, $querydata1);
                $rowcount_admin = mysqli_num_rows($rs_admin);

                $rs_manager = mysqli_query($conn, $querydata2);
                $rowcount_manager =mysqli_num_rows($rs_manager);

                $rs_technician = mysqli_query($conn, $querydata3);
                $rowcount_technician = mysqli_num_rows($rs_technician);

                $rs_user = mysqli_query($conn, $querydata4);
                $rowcount_user =mysqli_num_rows($rs_user);
				
				$rowcount_users = $rowcount_manager + $rowcount_technician + $rowcount_user;
                
                mysqli_close($conn);
            ?>
        </div>
        <div id="chart-container" align="center">
        <!-- add canvas to draw the chart -->
        <canvas id="myChart1" style="width:100%;max-width:700px"></canvas>
		<canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
        </div>

        <footer>
		<p style="font-size: 20px">Faculty of Computing</p>
	</footer>

    </body>

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

    <!-- create the chart -->
    <script>
    var xValues = ["Admin", "Manager","Technician","User"];
    //use json_encode to get JSON response
    //if you store data from DB in an array, then you have to encode it to JSON before you can visualise it 
    var yValues = [<?php echo json_encode($rowcount_admin); ?>, <?php echo json_encode($rowcount_manager); ?>, 
    <?php echo json_encode($rowcount_technician); ?>, <?php echo json_encode($rowcount_user); ?>];
    var barColors = ["blue", "green","yellow","red"];
	
	var aValues = ["Admin", "Users"];
    //use json_encode to get JSON response
    //if you store data from DB in an array, then you have to encode it to JSON before you can visualise it 
    var bValues = [<?php echo json_encode($rowcount_admin); ?>, <?php echo json_encode($rowcount_users); ?>];
    var barColors2 = ["orange", "purple"];

    new Chart("myChart1", {
    //scatter, line, bar, pie, doughnut
    //https://www.w3schools.com/js/js_graphics_chartjs.asp
        type: "bar",
        data: {
            labels:xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues,
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Admin vs Manager vs Technician vs User"
            }
        }
    });
	
	new Chart("myChart2", {
    //scatter, line, bar, pie, doughnut
    //https://www.w3schools.com/js/js_graphics_chartjs.asp
        type: "doughnut",
        data: {
            labels:aValues,
            datasets: [{
                backgroundColor: barColors2,
                data: bValues,
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Admin vs Users"
            }
        }
    });
    </script>
</html>