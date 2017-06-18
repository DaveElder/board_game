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
 
 $gameID = "";
 if(isset($_POST["gameID"])){
	$gameID = $_POST["gameID"];
	
 }
 
if(isset($_POST['update'])){
	$sql = "SELECT * FROM scoring WHERE gameID = '".$gameID."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
	echo "<table><tr><td>gameID: <input type='text' name='gameID' value='".$row["gameID"]. "'></tr></td><br>";
	echo "Score: <input type='text' name='score' value='".$row["score"]. "'><br>";
	echo "<input type='submit' name='update_record' value='Update Record'><br>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	
} else {
	echo "0 results";
}
}
if(isset($_POST['delete'])){
	$sql = "DELETE FROM scoring WHERE gameID='".$gameID."'";


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
	$gameID = $_POST["gameID"];
	$score = $_POST["score"];
	$sql = "UPDATE scoring SET score = '".$score."' WHERE gameID = '".$gameID."'";

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