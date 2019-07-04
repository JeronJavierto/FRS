<?php
  include('DBConnector.php');
  include('session.php');
?>


<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../stylesheet/style.css">
<link rel="stylesheet" href="../stylesheet/style2.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="../stylesheet/bootstrap.min.css">
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
    <li class="home"><a href="../pages/admin/home_admin.php" class="home">HOME</a></li>
    <li class="events"><a href="event_page_admin.php" class="events">EVENTS</a></li>
    <li class="faci"><a href="list_facilities_admin.php" class="faci">FACILITIES</a></li>
    <li class="req"><a href="list_of_requests_admin.php" class="req">REQUEST</a></li>
    <li class="rep"><a class="current" href="../pages/admin/report.php" class="rep">REPORTS</a></li>
  </ul>



<table id="customers">
  <tr>
    <th>Date of Occurence</th>
    <th>Time of Occurence</th>
    <th>Name</th>
    <th>ID No.</th>
    <th>Course</th>
    <th>Description</th>
    <th>Extend of Damage</th>
    <th>Action Taken</th>
    <th></th>
  </tr>
    
 <?php

  $sql = "SELECT * FROM report";
  $result = $conn-> query($sql);

  if ($result-> num_rows > 0){
    while ($row = $result-> fetch_assoc()){
      echo "<tr>
          <td>" . $row["DateOfOccurence"] . "</td>
          <td>" . $row["TimeOfOccurence"] . "</td>          
          <td>"  . $row["Name"] . "</td>
          <td>" . $row["IdNo"] . "</td>
          <td>" . $row["Course"] . "</td>
          <td>" . $row["Description"] . "</td>
          <td>" . $row["ExtentofDamage"] . "</td> 
          <td>" . $row["Action_taken"] . "</td>             
          </tr>";
    }
    echo "</table>";
  }else{
    echo "0 result";
  }

  $conn-> close();
?>
</table>

</body>
</html>
