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
 
 $r_id = "";
 if(isset($_POST["r_id"])){
	$r_id = $_POST["r_id"];
	
 }
 
if(isset($_POST['update'])){
	$sql = "SELECT * FROM players WHERE memberID = '".$r_id."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
	echo "<table><tr><td>MemberID: <input type='text' name='r_id' value='".$row["memberID"]. "'></tr></td><br>";
	echo "First Name: <input type='text' name='fname' value='".$row["first_name"]. "'><br>";
	echo "Family Name: <input type='text' name='fmname' value='".$row["family_name"]. "'><br>";
	echo "Email: <input type='text' name='e' value='".$row["email"]. "'><br>";
	echo "Phone: <input type='text' name='p' value='".$row["phone"]. "'></table><br>";
	echo "<input type='submit' name='update_record' value='Update Record'><br>";
	//echo "<a href='index.php'>Go Back</a>";
	//echo "<script> alert('test')</script>";
	}
	
} else {
	echo "0 results";
}
}
if(isset($_POST['delete'])){
	$sql = "DELETE FROM players WHERE memberID='".$r_id."'";


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
	$fname = $_POST["fname"];
	$fmname = $_POST["fmname"];
	$e = $_POST["e"];
	$p = $_POST["p"];
	$sql = "UPDATE players SET first_name = '".$fname."', family_name = '".$fmname."', email='".$e."', phone='".$p."' WHERE memberID = '".$r_id."'";

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