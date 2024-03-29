<?php
  include('DBConnector.php');
  include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Events</title>
  <link rel="stylesheet" href="../stylesheet/style.css">
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
    <li class="home"><a href="../pages/office/home_office.php" class="home">HOME</a></li>
    <li class="events"><a class="current" href="event_page_office.php" class="events">EVENTS</a></li>
    <li class="faci"><a href="list_facilities_office.php" class="faci">FACILITIES</a></li>    
    <li class="req"><a href="list_of_requests_office.php" class="req">REQUEST</a></li>    
  </ul>

  <table id="customers">
      <tr>
        <th>Event Name</th>
        <th>Venue</th>
        <th>Time Start</th>
        <th>Time End</th>            
      </tr>

  <?php

    $sql = "SELECT * FROM reservation WHERE status LIKE 'Approved'";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0){
      while ($row = $result-> fetch_assoc()){
        echo "<tr>
            <td>" . $row["title"] . "</td>
            <td>" . $row["Venue"] . "</td>          
            <td>"  . $row["start_event"] . "</td>
            <td>" . $row["end_event"] . "</td>          
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