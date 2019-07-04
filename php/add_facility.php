<?php
	include('DBConnector.php');

	$level = mysqli_real_escape_string($conn, $_REQUEST['level']);
	$room = mysqli_real_escape_string($conn, $_REQUEST['room']);
	$type = mysqli_real_escape_string($conn, $_REQUEST['roomType']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
	$capacity = mysqli_real_escape_string($conn, $_REQUEST['capacity']);

	$insertFacility = "INSERT INTO facility (Level, room, roomType, description, capacity) VALUES ('$level', '$room', '$type', '$description', '$capacity')";
	
	if (mysqli_query($conn, $insertFacility)) {
		header("location: list_facilities_admin.php");
	}else{
		echo (mysqli_connect_error());
	}
?>