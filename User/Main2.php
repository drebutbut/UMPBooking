<html>



<body style="background-color:#C1DEAE;">
<style>
.header {
  padding: 10px;
  text-align: center;
  color: black;
  font-family: Helvetica;
  text-align: center;
  background-color: #219F94;
}
footer {
  text-align: center;
  padding: 100px;
  background-color: #219F94;
  color: white;
}
</style>
<div class="header">
  <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt="ump logo" width="150" height="95" align="center">
  <h1>  <h1>FK BOOKING UMP SYSTEM</h1></h1>
</div>

    <header>
    </header>

    <center>
        <h3> SETUP REQUIREMENT</h3>
    </center>
    <form method="post" action="insert_requirement.php">
    <h4> List of requirement</h4>
<P>Printer</P>
<p>Audio</p>
<p>Router</p>
<p>Projector screen</p>

  <table>
    <tr>
      <td>Choose your setup<td>
      <td>
  <select  name="requirement" dropdown list>
    <option value="printer">Printer</option>
    <option value="audio">Audio</option>
    <option value="router">Router</option>
    <option value="projector screen">Projector screen</option>
  </select>
</td>
</tr>
<tr>
<td>
  Quantity:
</td>
    <td>
      <input type="number" name="quantity">
    </td> 
</tr>
<tr>
<td>
  <input type="submit" name="Submit" value="Submit">
</td>
</tr>
</table>
</form>
</body>
    
   
    </html>