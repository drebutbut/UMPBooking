<head>
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
</head>

<body>
    <header>
        <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="70" align="left">
        <h2>FK BOOKING UMP SYSTEM</h2>
    </header>

    <!-- <form action="InsertData.php">
		<button type="Submit" id="button">ADD COMPLAINT</button>
	</form> -->

    <footer>
        <p style="font-size: 20px">Faculty of Computing</p>
    </footer>
</body>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <section class="form-bubble">
        <div class="container">
            <p>Qrcode to Complaint Homepage:
                <a href="Homepage.php" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-qrcode"></span> Qrcode
                </a>
            </p>
        </div>
    </section>
</body>

</html>
