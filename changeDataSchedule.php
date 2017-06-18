<html>
<head>
<link rel="stylesheet" href="TM02.css">
</head>
<body>
<h1>Please make changes to record before updating</h1>
<?php
$uid="root";
 $pwd="root";
 $database="bg_db";
 $host = "localhost";
 // function connect_db($host, $uid, $pwd, $database)

 $conn=mysqli_connect($host, $uid, $pwd, $database);
 if (!$conn) {
		die('connection problem:' . mysqli_connect_error());
 }
 
 $eventID = "";
 if(isset($_POST["eventID"])){
	$eventID = $_POST["eventID"];
	
 }
 
if(isset($_POST['update'])){
	$sql = "SELECT * FROM schedule WHERE eventID = '$eventID'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
	echo "<table><tr><td>eventID: <input type='text' name='eventID' value='".$row["eventID"]. "'></tr></td><br>";
	echo "Event Name: <input type='text' name='event_name' value='".$row["event_name"]. "'><br>";
	echo "Day: <input type='text' name='day' value='".$row["day"]. "'><br>";
	echo "Time: <input type='text' name='time' value='".$row["time"]. "'><br>";
	echo "location: <input type='text' name='location' value='".$row["location"]. "'></table><br>";
	echo "<input type='submit' name='update_record' value='Update Record'><br>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	
} else {
	echo "0 results";
}
}
if(isset($_POST['delete'])){
	$sql = "DELETE FROM schedule WHERE eventID='".$eventID."'";


if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	echo "<br>";
	echo "<br>";
	echo "<a href='index.php'
	>Go Back</a>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
	echo "<br>";
	echo "<br>";
	echo "<a href='index.php'
	>Go Back</a>";
}

mysqli_close($conn);
}

if(isset($_POST['update_record'])){
	$event_name = $_POST["event_name"];
	$day = $_POST["day"];
	$time = $_POST["time"];
	$location = $_POST["location"];
	$sql = "UPDATE schedule SET event_name = '".$event_name."', day = '".$day."', time ='".$time."', location ='".$location."' WHERE eventID = '".$eventID."'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
	echo "<br>";
	echo "<br>";
	echo "<a href='index.php'
	>Go Back</a>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
	echo "<br>";
	echo "<br>";
	echo "<a href='index.php'
	>Go Back</a>";
}

mysqli_close($conn);
}
?>
</body>
</html>