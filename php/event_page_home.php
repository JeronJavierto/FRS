<?php include('DBConnector.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Events</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../stylesheet/style.css">
  <h1>FACILITY RESERVATION SYSTEM</h1>
</head>

<body>
  <ul class="menu"> 
    <li class="home_index"><a href="../index.php" class="home">HOME</a></li>
    <li class="events_index"><a class="current" href="event_page_home.php" class="events">EVENTS</a></li>
    <li class="faci_index"><a href="list_facilities_home.php" class="faci">FACILITIES</a></li>
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

  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="loginB">LOGIN</button>

  <div id="id01" class="loginmodal">
  <form class="modal-content animate" action="login.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close_signin" title="Close Modal">&times;</span>
    </div>
    <div class="logincontainer">
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required="">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required="">   
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn_login">Cancel</button>  
      <button type="submit" class="loginbtn">LOGIN</button>   
    </div>
  </form>
</div>


</body>
</html>