<?php
	$con=mysqli_connect('localhost','username','password','octagon');
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$fid = $_POST['itemupdate'];
	$check =  substr($fid, 0 , 1);
	echo $check;
	$id =  substr($fid, 1);
	echo $id;
	if (strpos($check, 'c') !== FALSE) {
		mysqli_query($con,"UPDATE todo_t SET done=1 WHERE ID='".$id."'");
	}
	if (strpos($check, 'n') !== FALSE) {
		mysqli_query($con,"UPDATE todo_t SET done=0 WHERE ID='".$id."'");
	}		
	mysqli_close($con);
	header("Location: project2_octagon.php");
	?>
