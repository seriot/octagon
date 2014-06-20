<html>
<head>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<meta charset="utf-8">
<title>Octogon</title>
</head>
<body>
<form id="myform" action="project2_octagon.php" method="post">
<label for="todo">Item To do </label>
<input id="todo" type="text" name="todo">
<br />
<input type="submit" name="add" value="Add">
<input type="submit" name="all" value="View All">
<input type="submit" name="comp" value="View Only Completed">

</form>


</body>
</html>
<?php
	date_default_timezone_set('UTC');
	$con=mysqli_connect('localhost','username','password','octagon');
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$dbprintout = mysqli_query($con,"SELECT * FROM todo_t");
	if ( isset($_POST['add'])) 
	{
		$date = date("m/d/y - h:m a");	
		$todo = $_POST["todo"];
		mysqli_query($con,"INSERT INTO todo_t (todo, date, done) VALUES ('$todo', '$date', 0)");
		$dbprintout = mysqli_query($con,"SELECT * FROM todo_t");
	}
	echo "<table id='myTable'>
    <tr>
		<th width='25'>
		Completed
		</th>
        <th width='175'>
        Things To do
        </th>
		<th width='130'>
		Date - Time
		</th>
		<th width='15'>
		Delete
		</th>
    </tr>
    <tr>
        <td>	
        </td>
        <td>
		</td>
        <td>
        </td>
	    <td>
        </td>
    </tr>";
	if ( isset($_POST['comp'])) 
	{
		$dbprintout = mysqli_query($con,"SELECT * FROM todo_t WHERE done = 1;");
	}
	if ( isset($_POST['all'])) 
	{
		$dbprintout = mysqli_query($con,"SELECT * FROM todo_t");
	}
	mysqli_close($con);
	if ($dbprintout != ""){
	while($row = mysqli_fetch_array($dbprintout))
	{
		if($row['done'] == 1) {
			echo "<tr><td><form id='myUpdatec".$row['ID']."' action='update.php' method='post'><input type='hidden' name='itemupdate' id='".$row['ID']."' value='n".$row['ID']."'><input type='submit' name='update' value='&#10003'></td></form></td>";
		}
		else {
			echo "<tr><td><form id='myUpdate".$row['ID']."' action='update.php' method='post'><input type='hidden' name='itemupdate' id='".$row['ID']."' value='c".$row['ID']."'><input type='submit' name='update' value=' '></td></form></td>";
		}
		echo "<td>".$row['todo']."</td><td>".$row['date']."</td><td><form id='myDel".$row['ID']."' action='delete.php' method='post'><input type='hidden' name='itemdelete' id='".$row['ID']."' value='".$row['ID']."'><input type='submit' name='remove' value='x'></td></tr></form>";
	}
	}
    echo "</table>";
?>
