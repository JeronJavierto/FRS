<?php
  include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../stylesheet/style5.css">
<link rel="stylesheet" href="../stylesheet/style.css">   
<link rel="stylesheet" href="../stylesheet/bootstrap.min.css">
  <title>Reports</title>
  <h1>FACILITY RESERVATION SYSTEM</h1>
  <div class="prof">
       <?php
      echo $login_session;
   ?>
</div>
<div class="logout"><a href="../../php/logout.php" class="signup">Log Out</a></div>
</head>
    <body>
    
<ul class="menu">
      <li class="home"><a href="../pages/client/home_client.php" class="home">HOME</a></li>
      <li class="events"><a href="event_page_client.php" class="events">EVENTS</a></li>
      <li class="faci"><a href="list_facilities_client.php" class="faci">FACILITIES</a></li>
      <li class="faci"><a class="current" href="Report.php" class="repo">REPORT</a></li>
  </ul>
        
    <div class="abc">Reports</div>
        <div class="bcd">
            <div class="cde">Incident Report</div>
        <br>
<form action="report_client.php" method="POST">
    <label for="Org">Date of Occurence</label>
    <input type="date" id="Occur" name="date/occur" placeholder="...." required="">
    <br>
    <br>
    <label for="Vent">Time of Occurence</label>
    <input type="time" id="" name="time" placeholder="... " required="">
    <br>
    <h4>Causet of Incident</h4>
    <label for="Ven">Name</label>
    <input type="fill" id="n" name="name" placeholder="....." required="">
    <br>
    <label for="Dat">ID no.</label>
    <input type="fill" id="no" name="idno" placeholder="...... " required="">
    <br>
    <label for="Tim">Course</label>
    <input type="fill" id="cr" name="course" placeholder="....." required="">
    <br>
    <h4>Description</h4>
    <textarea rows="4" cols="50" name="description" required="">
</textarea>
    <h4>Extent of Damage</h4>
    <textarea rows="4" cols="50" name="damage" required="">
</textarea>
    <h4>Action Taken</h4>
    <textarea rows="4" cols="50" name="actaken" required="">
</textarea>
    <br>
    <br>
 
    <button type="submit" class="butt">Submit</button>
        
</form>

      </div>  
    </body>
</html>