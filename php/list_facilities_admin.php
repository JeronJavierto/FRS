<?php
	include('DBConnector.php');
	include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>List of Facilities</title>
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
	  <li class="home"><a href="../pages/admin/home_admin.php" class="home">HOME</a></li>
	  <li class="events"><a href="event_page_admin.php" class="events">EVENTS</a></li>
	  <li class="faci"><a class="current" href="list_facilities_admin.php" class="faci">FACILITIES</a></li>
	  <li class="req"><a href="list_of_requests_admin.php" class="req">REQUEST</a></li>
	  <li class="rep"><a href="report_admin.php" class="rep">REPORTS</a></li>
	</ul>
<br>
<br>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="addfB">Add Facility</button>

<div id="id01" class="addfmodal">
  <form class="addfmodal-content animate" action="add_facility.php" method="POST">
    <div class="imgcontainer1">
      <span onclick="document.getElementById('id01').style.display='none'" class="close_addf" title="Close Modal">&times;</span>
    </div>
      <p align="center">Fill up the form to add a facility.</p>
      <hr>
      <label for="frstn">Level Name</label>
      <input type="text" placeholder="Enter Level Name" name="level" required>

      <label for="lstn">Room Name</label>
      <input type="text" placeholder="Enter Room Name" name="room">

      <label for="email">Room Type</label>
      <input type="text" placeholder="Enter Room Type" name="roomType" required>      

      <label for="org">Description</label>
      <input type="text" placeholder="Enter Description" name="description" required="">

      <label for="posi">Capacity</label>
      <input type="text" placeholder="Enter Capacity" name="capacity" required="">     

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn_login">Cancel</button> 
        <button type="submit" class="signupbtn">Submit</button>
      </div>
    </div>
  </form>
</div>

<div style="width:700px; margin:0 auto;">
<br>
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Level</th>
<th>Room</th>
<th>Room Type</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<?php
include('DBconnector.php');

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `facility`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$seconnd_last = $total_no_of_pages - 1; // total page minus 1

    $result = mysqli_query($conn,"SELECT * FROM `facility` LIMIT $offset, $total_records_per_page");
    while($row = mysqli_fetch_array($result)){
		echo "<tr>
			  <td>".$row['Level']."</td>
			  <td>".$row['room']."</td>
	 		  <td>".$row['roomType']."</td>
		   	  <td>".$row['description']."</td>
		   	  </tr>";
        }
	mysqli_close($conn);
    ?>
</tbody>
</table>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$seconnd_last'>$seconnd_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$seconnd_last'>$seconnd_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
</div>
</body>
</html>