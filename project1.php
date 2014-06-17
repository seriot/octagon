<html>
<head>
<meta charset="utf-8">
<title>Octogon</title>
</head>
<body>
<form id="myform" action="octagon.php" method="post">
<label for="fullname">Full Name: </label>
<input id="fullname" type="text" name="fullname" required>
<label for="email">Email: </label>
<input id="email" type="email" name="email" required>
<br />
<input type="submit" value="Register">
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
        <td>
        </td>
        <td>
        </td>
    </tr>";
	if(!empty($_POST["fullname"])){
		$fullname = $_POST["fullname"];
		$email = $_POST["email"];
		$con=mysqli_connect('localhost','username','password','octagon');
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		mysqli_query($con,"INSERT INTO data (fullname, email) VALUES ('$fullname', '$email')");
		mysqli_close($con);
		echo "<tr><td>$fullname</td><td>$email</td><td></td></tr>";
	}
    echo "</table>";
?>
