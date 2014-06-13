<html>
<head>
<meta charset="utf-8">
<title>Octogon</title>
</head>
<body>
<form id="myform" action="octagon.php" method="post">
<label for="fullname">Full Name: </label>
<input id="fullname" name="fullname" required>
<label for="email">Email: </label>
<input id="email" name="email" required>
<br />
<input type="submit" value="Add Entry">
</form>
<form id="myform2" action="" method="post">
<input type="hidden" id="all" name="all" value="all">	
<input type="submit" value="View All">
</form>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>

</body>
</html>
<?php
	echo "<table id='myTable'>
    <tr>
		<th width='5'>
		</th>
        <th width='70'>
            Full Name
        </th>
        <th width='95'>
            Email
        </th>
    </tr>
    <tr>
        <td>	
        </td>
        <td>
        </td>
        <td>
        </td>
    </tr>";
	if(!empty($_POST["fullname"])){
		$fullname = $_POST["fullname"];
		$email = $_POST["email"];
		$con=mysqli_connect('localhost','seriot','loop900','octagon');
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		mysqli_query($con,"INSERT INTO data (fullname, email) VALUES ('$fullname', '$email')");
		mysqli_close($con);
		echo "<tr><td>$fullname</td><td>$email</td><td></td></tr>";
	}
	if(isset($_POST['all'])){
		$con=mysqli_connect('localhost','seriot','loop900','octagon');
		$result = mysqli_query($con,"SELECT * FROM data");
		$i=0;
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr>';
			echo "<td><button id=".$i.">X</button></td>";
			echo "<td>".$row['fullname']."</td>";
			echo "<td>".$row['email']."</td>";
			echo '</tr>';
		}
		mysqli_close($con);
	}
    echo "</table>";
?>
