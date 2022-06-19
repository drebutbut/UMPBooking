<!-- Homepage.php (index) -->
<!-- Homepage of the Booking Universiti Malaysia Pahang Complaint. -->

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

</html>


<head>
  <title>Booking Universiti Malaysia Pahang Complaint</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
    <!--
    .style1 {
      font-family: Verdana, Arial, Helvetica, sans-serif
    }

    .style3 {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 12px;
      font-weight: bold;
    }
    -->
  </style>
</head>

<body>
  <?php
  // set the default time zone to use in Malaysia
  date_default_timezone_set('Asia/Kuala_Lumpur');
  ?>
  <section class="form-bubble">
    <div align="center">
      <table width="379" height="286" border="3" bordercolor="#219F94">
        <tr>
          <td height="190" bgcolor="#C1DEAE">
            <p align="center" class="style1">
              <strog> Booking Complaint Booking UMP </strong>
            </p>
            <div align="center">
              <span class="style3">date : <?php echo date("d-m-Y"); ?></span>
            </div>
            <p align="center" class="style1"></p>
            <div align="center">
              <span class="style3">time : <?php echo date("H:i", time()); ?></span>
            </div>
            <p align="center" class="style1">
              [<a href="InsertData.php">Insert New Data</a> | <a href="View.php">Display Data</a> ]
            </p>
        </tr>
      </table>
      <p class="style1">&nbsp;</p>
    </div>
  </section>
</body>

</html>