<!-- View.phph (papar)-->
<!-- To display all information of database. -->

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

</html>

<head>
    <title>Display UMP Booking Complaint</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF" text="#000000">
    <section class="form-bubble">
        <ol>
            <?php
            session_start();

            include("ComplaintDatabase.php");

            $userid = intval($_SESSION["userid"]);

            $query = "SELECT * FROM complaint";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $Complaint_ID = $row["Complaint_ID"];
                    $User_ID = $row["User_ID"];
                    $Complaint_date = $row["Complaint_date"];
                    $Complaint_time = $row["Complaint_time"];
                    $Complaint_type = $row["Complaint_type"];
                    $Complaint_desc = $row["Complaint_desc"];
            ?>
                    <li>
                        Complaint_ID : <?php echo $Complaint_ID; ?><br>
                        User_ID : <?php echo $User_ID; ?><br>
                        Complaint_date / Complaint_time : <?php echo "$Complaint_date / $Complaint_time"; ?><br>
                        Complaint_type : <?php echo $Complaint_type; ?><br>
                        Complaint_desc : <?php echo nl2br($Complaint_desc); ?><br>
                        action : <a href="Edit.php?Complaint_ID=<?php echo $Complaint_ID; ?>">Update</a> / <a href="Delete.php?Complaint_ID=<?php echo $Complaint_ID; ?>">Delete</a><br>
                    </li>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </ol>
        <div align="center">[ <a href="Homepage.php">Back to Homepage</a> |
            <a href="InsertData.php">Add More Complaints</a> ]
        </div>
    </section>
</body>

</html>