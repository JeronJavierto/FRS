<?php
	include('DBConnector.php');
	include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Request</title>
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
	  <li class="events"><a href="event_page_office.php" class="events">EVENTS</a></li>
	  <li class="faci"><a href="list_facilities_office.php" class="faci">FACILITIES</a></li>
	  <li class="req"><a class="current" href="list_of_requests_office.php" class="req">REQUEST</a></li>
	</ul>

	<table id="customers">
		<tr>
			<th>Venue</th>
			<th>Activity</th>
			<th>Time Start</th>
			<th>Time End</th>
			<th>Decision</th>			
		</tr>
<?php
	// if($_SERVER["REQUEST_METHOD"] == "POST") {
	$sql = "SELECT * FROM reservation r LEFT JOIN accounts a ON r.user_ID = a.userID WHERE status = 'Pending'";
	// $sql = "SELECT * FROM client";

	$result = $conn-> query($sql);

	if ($result-> num_rows > 0){
		while ($row = $result-> fetch_assoc()){
			$_SESSION['IDres'] = $row["resID"];
			echo "<tr>					
					<td>" . $row["Venue"] . "</td>
					<td>" . $row["title"] . "</td>
					<td>" . $row["start_event"] . "</td>
					<td>" . $row["end_event"] . "</td>
					<td>"
						?>
						<form action="approve_or_decline_office.php" method="POST">
							<input type="submit" name="Approve" value="Approve">
							<input type="submit" name="Decline" value="Decline">
						</form>
						<?php
					"</td>								
				  </tr>";
		}
		echo "</table>";
	}else{
		echo "No reservation";
	}

	$conn-> close();
	// }
?>

</body>
</html>