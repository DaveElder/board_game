<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="TM02.css">

<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
<title>Manage_Scores</title>

</head>
<body>

<h1>Player Scores</h1>


<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table>

<tr><td>
Game ID: 
</td><td>
<input type="text" name="gameID" id=gameIDg" size="20" maxlength="50"  required placeholder="Enter game ID"  title="The game ID is."/>
   
</td></tr>

<tr><td>
Score: 
</td><td>
<input type="text" name="score" id = "score" size="20" maxlength="50"  required placeholder="Enter score"  title="Text to be updated."/>
   
</td></tr>
<input type="submit" name="insert" value="insert">


</form>

<form method="post" action="findScore.php">
<table>

<tr><td>
Game ID: 
</td><td>
<input type="text" name="findID" id="findID" size="20" maxlength="50" required pattern="\d{3}" required placeholder="Enter Game ID"  title="Update this text."/>
 
<input type="submit" name="find" value="find">
</table>
</form>

<form method="post" action="index.php">
<table>


<input type="submit" name="return_home" value="Return Home">
</table>
</form>


<!-- // didn,t quote get this working the way I wanted.
<form method="post" action="find.php">
<table>
<tr><td>
Email address: 
</td><td>
<input type="text" name="eAddress" id="eAddress" size="20" maxlength="50" required placeholder="Enter member ID"  title="Please enter your member ID. It must start with a capital."/>
 
<input type="submit" name="find" value="find">
</table>
</form>
-->

</body>
</html>

<?php

//  server-side validation, thanks to www.w3schools.com for the code example this was formed with. 
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$gameIDErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["gameID"])) {
	$gameIDErr = "Game ID required";
} else {
	$gameID = test_input($_POST["gameID"]);
}

if (empty($_POST["score"])){
	$scoreErr = "Please enter your phone number";
}
else{
$score = test_input($_POST["score"]);

}
}

$uid="root";
 $pwd="root";
 $database="bg_db";
 $host = "localhost";
 // function connect_db($host, $uid, $pwd, $database)

 $conn=mysqli_connect($host, $uid, $pwd, $database);
 if (!$conn) {
		die('connection problem:' . mysqli_connect_error());
 }

if(isset($_POST['insert'])){
$sql = "INSERT INTO scoring (gameID, score) VALUES ('".$gameID."','".$score."')";
if ($conn->query($sql) === TRUE){
	echo "New score record created sucessfully";
	// echo "<a href='index.html'>Go Back</a>";
 }else {
 	echo "Error: " . $sql . "<br>" . $conn->error;
}
}		
?>
 
