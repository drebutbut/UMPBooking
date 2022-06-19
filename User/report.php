<?php  
 $connect = mysqli_connect("localhost", "root", "", "book_ump");  
 $query = "SELECT Item_name, count(*) as number FROM requirement GROUP BY Item_name  ";  
 
 $result = mysqli_query($connect, $query);  
 ?>  
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
			text-align: right;
		}
       
	</style>
	<header>
		<img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="70" align="left">
		<h2>FK-BOOKING</h2>
        
	</header>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Requirement</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Item_name', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Item_name"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'OVERVIEW REPORT OF SETUP THAT HAS BEEN USED',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
               
                <br />  
                <div align="center" id="piechart" style="width: 900px; height: 500px;"></div>  
           </div> 
		   <footer>
		<p style="font-size: 20px">Faculty of Computing</p>
	</footer> 
      </body>  
 </html> 
  
 