<html>
<head>
<link rel="stylesheet" href="TM02.css">
</head>
<body>
<h1>Board Games Owners</h1>
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
 if(isset($_POST['findID'])){
	$bgID = $_POST["findID"]; 
 }
 
 $sql = "SELECT * FROM board_game_owner WHERE bgID = '".$bgID."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	echo "<table>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='changeDataBGOwner.php'>";
	echo "<tr><td>";	
	echo "memberID: <input type='text' name='r_id' value='"   .$row["memberID"]. "'><br>";
	echo "<tr><td>";
	echo "Boardgame ID: <input type='text' name = 'bgID' value='"	        	.$row["bgID"]. "'><br>";
	echo "<tr><td>";
	echo "Boardgame: <input type='text' value='"			  .$row["boardgame"]. "'><br>";
	echo "<tr><td>";
	echo "num_of_players: <input type='text' value='"				.$row["num_of_players"]. "'><br>";
	echo "<tr><td>";
	echo "type         <input type='text' value='"				.$row["type"]. "'><br>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	echo "</table>";
} else {
	echo "0 results";
	echo "<br>";
	echo "<br>";
	echo "<a href='index.php'
	>Go Back</a>";
}
// email address:
/*
$eAddress = "";
 if(isset($_POST['eAddress'])){
	$eAddress = $_POST['eAddress']; 
 }
 
 $sql = "SELECT * FROM players WHERE email like '%@$eAddress%'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='changeData.php'>";
	echo "MemberID: <input type='text' name='r_id' value='" .$row["memberID"]. "'><br>";
	echo "First Name: <input type='text' value='"			.$row["first_name"]. "'><br>";
	echo "Family Name: <input type='text' value='"			.$row["family_name"]. "'><br>";
	echo "Email: <input type='text' value='"				.$row["email"]. "'><br>";
	echo "Phone: <input type='text' value='"				.$row["phone"]. "'><br>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	
} else {
	echo "0 results";
	echo "<br>";
	echo "<br>";
	echo "<a href='index.php'
	>Go Back</a>";
}
*/
?>

<table>
<tr><td>
<br>
<input type="submit" name="delete" value="delete">
<input type="submit" name="update" value="update">
</td><td>
<table>
</form>

</body>
</html>