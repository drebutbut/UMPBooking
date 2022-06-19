<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="QRcode.css" type="text/css">
        
        <title>Foody</title>
        </head>
<body>

    <img src="foodylogo.jpg" alt="Foody logo" style="width:200px;height:100px;">


<button class="buttonlogout">Log Out</button>
<button class="button button2" onclick="profile()">Profile</button>
<button class="button button1" onclick="commission()">Commission</button>
<button class="button button2" onclick="delivery()">Delivery Record</button>
<button class="button button1" onclick="myFunction()">Complaint</button>
<button class="button button2" onclick="order()">Order</button>
<button class="button button1" onclick="dashboard()">Home</button>
<div>
    <button class="buttonback">Back</button>
</div>

<script>
    function myFunction(){
        location.replace("complainttable.php")
    }

    function completed(){
        location.replace("test.php")
    }

    function order(){
        location.replace("orderPage.html")
    }

    function commission(){
            location.replace("commissionJan.php")
        }

        function delivery(){
            location.replace("deliveryRecord.php")
        }
        function profile(){
            location.replace("profile.php")
        }

function pickup(){
    location.replace("orderPageprepared.php")
}

function dashboard(){
    location.replace("dashboard.php")
}
</script>

    <div>
        <button class="buttonback">Back</button>
    </div>
<br><br>

<p style="text-align: center; font-weight: 400; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 25pt;">QR CODE</p>

<div id="example1" style="margin-top: 30px;">

    <center><img src="QRCode.png" alt="QRCODE logo" class="qr"></center>
    <center><h2>SCAN TO COMPLETE YOUR ORDER</h2></center>

    </div>
    <center>
        <div class="footer">
          <a href="#help">HELP</a>
          <a href="#privacy">PRIVACY</a>
          <a href="#setting">SETTING</a>
          <p>Copyright 2022 All Right Reserved</p>  
        </center>
        </div>
  

</body>
</html>

