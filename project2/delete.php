<?php
	$con=mysqli_connect('localhost','username','password','octagon');
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if ( isset($_POST['remove']))
	{
		$idd = $_POST['itemdelete'];
		mysqli_query($con,"DELETE FROM todo_t WHERE ID='".$idd."'");
	}
	mysqli_close($con);
	header("Location: http://localhost/raw4/project2_octagon.php");
	?>
