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
	$sql = "SELECT * FROM board_game_owner WHERE bgID = '".$bgID."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
	echo "<table><tr><td>Boardgame: <input type='text' name='boardgame' value='".$row["boardgame"]. "'></tr></td><br>";
	echo "bgID: <input type='text' name='bgID' value='".$row["bgID"]. "'><br>";
	echo "memberID: <input type='text' name='memberID' value='".$row["memberID"]. "'></table><br>";
    echo "Number of Players: <input type='text' name='num_of_players' value='".$row["num_of_players"]. "'><br>";
	echo "Type: <input type='text' name='type' value='".$row["type"]. "'></table><br>";
	echo "<input type='submit' name='update_record' value='Update Record'><br>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	
} else {
	echo "0 results";
}
}
if(isset($_POST['delete'])){
	$sql = "DELETE FROM board_game_owner WHERE bgID='".$bgID."'";


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
	
	$memberID = $_POST["memberID"];
	$boardgame = $_POST["boardgame"];
	$num_of_players = $_POST["num_of_players"];
	$type = $_POST["type"];
	$sql = "UPDATE board_game_owner SET memberID = '".$memberID."', boardgame = '".$boardgame."', num_of_players = '".$num_of_players."', type ='".$type."' WHERE bgID = '".$bgID."'";

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