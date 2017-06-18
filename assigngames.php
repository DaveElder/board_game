<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="TM02.css">

<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
<title>Assign Game</title>

</head>
<body>

<h1>Assign Game</h1>
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

$sql = "SELECT * FROM board_game_owner";
$result = mysqli_query($conn, $sql);
echo "<form  method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
if(mysqli_num_rows($result) > 0) {
	// output data of each row
	?>BG ID: <select id='bg_select' name='bg_select'>
	 
<?php
	while($row = mysqli_fetch_assoc($result)){
		echo "<option>" .$row["bgID"]. "</option>";
		//$bgID = $row["bgID"];
		//echo "<optin value = '".$bgID."'> '".$bgID."' </option>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	echo "</select><br>";
}
$sql = "SELECT * FROM players";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	
	// output data of each row
	echo "Member ID: <select id='member_select' name='member_select'>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<option>" .$row["memberID"]. "</option>";
		//$bgID = $row["bgID"];
		//echo "<optin value = '".$bgID."'> '".$bgID."' </option>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	echo "</select><br><br><input type='submit' name='assign' value='Assign Game'></form>";
}

if(isset($_POST["assign"])){
	if(isset($_POST["bg_select"]) and isset($_POST["member_select"])){
		$sql = "INSERT INTO bg_assigned (bgID, memberID) VALUES ('".$_POST["bg_select"]."','".$_POST["member_select"]."')";
	}
	if ($conn->query($sql) === TRUE){
	echo "New game assigned sucessfully";
	// echo "<a href='index.html'>Go Back</a>";
 }else {
 	echo "Error: " . $sql . "<br>" . $conn->error;
}
}

echo "<h4>Board Games Assigned</h4>";
$sql = "SELECT * FROM bg_assigned";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	
	// output data of each row
	echo "<table border='1'>";
	echo "BgID: MemberID:";
	while($row = mysqli_fetch_assoc($result)){

		echo "<tr><td>" .$row["bgID"]. "</td>";
		echo "<td>" .$row["memberID"]. "</td>";
		//$bgID = $row["bgID"];
		//echo "<optin value = '".$bgID."'> '".$bgID."' </option>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	echo "</table>";
}	
?>
<form method="post" action="index.php">

<input type="submit" name="return_home" value="Return Home">
</table>
</form>

</body>
</html>