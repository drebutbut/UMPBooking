<?php
include("ComplaintDatabase.php");
$query = "SELECT COUNT(*) AS Complaint_status FROM complaint WHERE Complaint_status='In Investigation'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
    $output1 = $row['Complaint_status'];
}
?>

<?php
$query = "SELECT COUNT(*) AS Complaint_status FROM complaint WHERE Complaint_status='Resolved'";
$query_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_result)) {
    $output2 = $row['Complaint_status'];
}
?>



<head>
    <style>
        body {
            width: 100%;
            margin: auto;
            font-family: 'Times New Roman';
            background-color: #C1DEAE;
        }

        .form-bubble {
            border: 1px solid black;
            border-radius: 25px;
            width: 30%;
            margin: auto;
            padding: 20px;
            background-color: white;
        }

        .form-class {
            width: 100%;
            margin: auto;
        }

        .form-class input {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 10px;
            border: 0.25px solid black;
            border-radius: 5px;
            width: calc(100% - 22px);
            /*Because padding will affect the outside of an object, calc() is used to get the correct width*/
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

        header h2 {
            padding: 10px;
            text-align: center;
            color: white;
            font-family: 'Times New Roman';
            text-align: left;
            background-color: #219F94;

        }

        header h3 {

            padding: 10px;
            text-align: center;
            color: white;
            font-family: 'Times New Roman';
            text-align: center;
            background-color: #219F94;

        }

        .form {
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

        .button {
            width: 50%;
            margin-top: 30px;
            background-color: #C1DEAE;
            color: white;
        }

        td {
            text-align: right;
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
                ['Status ', 'Total'],
                ['In Investigation', <?php echo $output1 ?>],
                ['Resolved', <?php echo $output2 ?>],
            ]);

            var options = {
                title: 'Total Complaint '
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

</head>

<body>
    <header>
        <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="70" align="left">
        <h2>FK BOOKING UMP SYSTEM</h2>
    </header>
    <section class="form-bubble">
        <div id="piechart" class="chart"></div>
    </section>
        <footer>
            <p style="font-size: 20px">Faculty of Computing</p>
        </footer>
</body>

</html>