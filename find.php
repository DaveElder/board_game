<html>
<head>
<link rel="stylesheet" href="TM02.css">
</head>
<body>
<h1> Member Details</h1>
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
 $id = "";
 if(isset($_POST['findID'])){
	$id = $_POST["findID"]; 
 }
 
 $sql = "SELECT * FROM players WHERE memberID = '$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	// output data of each row
	echo "<table>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<form  method='post' action='changeData.php'>";
	echo "<tr><td>";	
	echo "Member ID: <input type='text' name='r_id' value='"   .$row["memberID"]. "'><br>";
	echo "<tr><td>";
	echo "First Name: <input type='text' value='"	        	.$row["first_name"]. "'><br>";
	echo "<tr><td>";
	echo "Family Name: <input type='text' value='"			  .$row["family_name"]. "'><br>";
	echo "<tr><td>";
	echo "Email address: <input type='text' value='"				.$row["email"]. "'><br>";
	echo "<tr><td>";
	echo "Phone:         <input type='text' value='"				.$row["phone"]. "'><br>";
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