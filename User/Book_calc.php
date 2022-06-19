
<?php
    include("db.php");

    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM booking WHERE Book_id = $id");

    $result = mysqli_fetch_assoc($query);
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
h1
{
	text-align: center; 
}
p
{
	background-color: #fff;
  width: 300px;
  border: 15px #fff;
  padding: 50px;
  margin: 20px;
  text-align: center; 
  margin: auto;
}


</style>
<html>
    <head>
		
    </head>
    <body>
		<h1>Your total days left before booking:</h1>
        <p id="demo"></p>
    </body>
</html>

<script>
		// Set the date we're counting down to
		var countDownDate = new Date("<?= $result['book_date']; ?>").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Display the result in the element with id="demo"
		document.getElementById("demo").innerHTML = days + "Days " + hours + "Hour "
		+ minutes + "Minute " + seconds + "Second ";

		// If the count down is finished, write some text
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = " expired";
		}
		}, 1000);
</script>
