<?php
include("fkdb.php");
$query = "SELECT COUNT(*) AS assignment_session FROM assignment WHERE assignment_session = 'Lab'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $output1 = $row['assignment_session'];
}
?>

<?php
$query = "SELECT COUNT(*) AS assignment_session FROM assignment WHERE assignment_session='Lecture'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $output2 = $row['assignment_session'];
}
?>

<?php
$query = "SELECT COUNT(*) AS assignment_session FROM assignment WHERE assignment_session='Meeting'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $output3 = $row['assignment_session'];
}
?>

<?php
$query = "SELECT COUNT(*) AS assignment_session FROM assignment WHERE assignment_session='Seminar'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $output4 = $row['assignment_session'];
}
?>
<?php
$query = "SELECT COUNT(*) AS assignment_session FROM assignment WHERE assignment_session='Event'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $output5 = $row['assignment_session'];
}
?>
<?php
$query = "SELECT COUNT(*) AS assignment_session FROM assignment WHERE assignment_session='Others'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
  $output6 = $row['assignment_session'];
}
?>

<html>

<head>
  <style>
    .chart {
      width: 600px;
      height: 400px;
      margin-top: 50px;
      margin-left: 470px;
    }

    body {
			width: 100%;
			margin: auto;
			font-family: 'Times New Roman';
			background-color: #99c1d9;
		}

		header {
			height: 15vh;
			background-color: #085fad;
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
			background-color: #085fad;
		}

		header h2 {
			position: absolute;
			margin-top: 40px;
			font-family: 'Times New Roman';
			font-size: 40px;
			left: 20%;
			color: white;
		}

		header h3 {
			position: absolute;
			margin-top: 80px;
			font-family: 'Times New Roman';
			font-size: 20px;
			left: 20%;
			color: white;
		}

		h3 {
      position: absolute;
			margin-top: 20px;
			font-family: 'Times New Roman';
			font-size: 20px;
			left: 44%;
			color: black;
		}

    #button1 {
			height: 50px;
			width: 100px;
      top: 10px;
			margin-top: 30px;
			margin-left: 715px;
			background-color: #085fad;
			color: white;
		}
  </style>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Assignment Session', 'Total'],
        ['Lab', <?php echo $output1 ?>],
        ['Lecture', <?php echo $output2 ?>],
        ['Meeting', <?php echo $output3 ?>],
        ['Seminar', <?php echo $output4 ?>],
        ['Event', <?php echo $output5 ?>],
        ['Other', <?php echo $output6 ?>]
      ]);

      var options = {
        title: 'Total Assignment by Session'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <header>
    <h2>FK Booking</h2>
    <h3>Resource Booking System</h3>
  </header>

  <h3>Setup Requirement Report</h3>

  <div id="piechart" class="chart"></div>

  <form action="index.php">
		<button type="Submit" id="button1">BACK</button>
	</form>

  <footer>
		<p>Faculty of Computing</p>
	</footer>
</body>

</html>