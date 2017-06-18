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
 
 $bgID = "";
 if(isset($_POST["bgID"])){
	$bgID = $_POST["bgID"];
	
 }
 
if(isset($_POST['update'])){
	$sql = "SELECT * FROM board_games WHERE gameID = '".$bgID."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
	echo "Boardgame: <input type='text' name='boardgame' value='".$row["boardgame"]. "'><br>";
	echo "Date: <input type='text' name='date' value='".$row["date"]. "'></table><br>";
	echo "EventID: <input type='text' name='eventID' value='".$row["eventID"]. "'></table><br>";
	echo "Game ID: <input type='text' name='gameID' value='".$row["gameID"]. "'></table><br>";
	echo "MemberID: <input type='text' name='memberID' value='".$row["memberID"]. "'></table><br>";
	echo "Notes: <input type='text' name='notes' value='".$row["notes"]. "'></table><br>";
	echo "Position: <input type='text' name='position' value='".$row["position"]. "'></table><br>";
	echo "<input type='submit' name='update_record' value='Update Record'><br>";

	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	
} else {
	echo "0 results";
}
}
if(isset($_POST["delete"])){
	$sql = "DELETE FROM board_games WHERE gameID='".$bgID."'";


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

if(isset($_POST["update_record"])){
	$boardgame = $_POST["boardgame"];
	$date = $_POST["date"];
	$eventID = $_POST["eventID"];
	$mID = $_POST["memberID"];
	$notes = $_POST["notes"];
	$position = $_POST["position"];
	$sql = "UPDATE board_games SET boardgame = '".$boardgame."', date = '".$date."', eventID = '".$eventID."', memberID = '".$mID."', notes = '".$notes."', position = '".$position."'  WHERE gameID = '".$bgID."'";

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