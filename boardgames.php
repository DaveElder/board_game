<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="TM02.css">

<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
<title>Manage_Boardgames</title>

</head>
<body>

<h1>Manage Board Games</h1>


<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<table>

<tr><td>
Boardgame: 
</td><td>
<input type="text" name="boardgame" id="boardgame" size="20" maxlength="50" required placeholder="Enter boardgame"  title="The boardgame is?."/>
   
</td></tr>

<tr><td>
Date: 
</td><td>
<input type="text" name="date" id = "date" size="20" maxlength="50" required placeholder="Enter date"  title="Please enter date."/>
   
</td></tr>

<tr><td>
Event ID: 
</td><td>
<input type="text" name="eventID" id = "eventID" size="20" maxlength="50" required placeholder="Enter Event ID"  title="Please enter date."/>
   
</td></tr>

<tr><td>
Game ID: 
</td><td>
<input type="text" name="gameID" id = "gameID" size="20" maxlength="50" required placeholder="Enter game ID"  title="text to update."/>
   
</td></tr>

<tr><td>
Member ID: 
</td><td>
<input type="text" name="memberID" id = "memberID" size="20" maxlength="50" required placeholder="Enter member ID"  title="text to update."/>
   
</td></tr>

<tr><td>
Notes:
</td><td> 
<input type="text" name="notes" size="20" maxlength="50" required placeholder="Enter notes"  title="Please enter notes" />
</td></tr>


<tr><td>
Position:
</td><td> 
<input type="text" name="position" size="20" maxlength="50"  required placeholder="Enter position"   required title="Please enter position"/>
</td></tr>

</table>
<input type="submit" name="insert" value="insert">


</form>

<form method="post" action="findBg.php">
<table>

<tr><td>
Boardgame: 
</td><td>
<input type="text" name="bgID" id="bgID" size="20" maxlength="50" required pattern="\d{3}" required placeholder="Enter Board Game ID"  title="Your Board Game ID is 3 digits."/>
 
<input type="submit" name="find" value="find">
</table>
</form>

<form method="post" action="index.php">

 
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
$boardgameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["boardgame"])) {
	$boardgameErr = "boardgame required";
} else {
	$boardgame = test_input($_POST["boardgame"]);
}

if(empty($_POST["date"])) {
	$dateErr = "Enter date please";
} else {
$date = test_input($_POST["date"]);
}

if (empty($_POST["eventID"])) {
	$eventIDErr = "eventID please";
}
else {
$eventID = test_input($_POST["eventID"]);
}

if (empty($_POST["gameID"])){
	$gameIDErr = "please gameID";
}
else{	
$gameID = test_input($_POST["gameID"]);
}

if (empty($_POST["memberID"])){
	$memberIDErr = "Please MemberID";
}
else{
$memberID = test_input($_POST["memberID"]);
}
if (empty($_POST["notes"])){
	$notesErr = "Please enter notes";
}
else{
$notes = test_input($_POST["notes"]);
}
if (empty($_POST["position"])){
	$positionErr = "Please enter position";
}
else{
$position = test_input($_POST["position"]);

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
$sql = "INSERT INTO board_games (gameID, memberID, boardgame, date, notes, position, eventID) VALUES ('$gameID', '$memberID', '$boardgame','$date', '$notes', '$position', '$eventID')";
if ($conn->query($sql) === TRUE){
	echo "New boardgame record created sucessfully";
	// echo "<a href='index.html'>Go Back</a>";
 }else {
 	echo "Error: " . $sql . "<br>" . $conn->error;
}
}		
?>
 
