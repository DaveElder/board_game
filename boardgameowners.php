<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="TM02.css">

<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
<title>Manage boardgame owners</title>

</head>
<body>

<h1>Manage boardgame owners</h1>


<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<table>

<tr><td>
Member ID: 
</td><td>
<input type="text" name="memberID" id="memberID" size="20" maxlength="50" required placeholder="Enter Member ID"  title="text needs updating."/>
   
</td></tr>

<tr><td>
Boardgame ID: 
</td><td>
<input type="text" name="bgID" id ="bgID" size="20" maxlength="50" required placeholder="Enter boardgame ID"  title="text needs to be updated"/>
   
</td></tr>

<tr><td>
Boardgame:
</td><td> 
<input type="text" name="boardgame" ID="boardgame" size="20" maxlength="50"  required placeholder="Enter boardgame"  title="Text to update" />
</td></tr>

<tr><td>
Number of Players:
</td><td> 
<input type="text" name="num_of_players" size="20" maxlength="50"  required placeholder="Enter number of players"   required title="Text to update"/>
</td></tr>

<tr><td>
Type:
</td><td> 
<input type="text" name="type" size="20" maxlength="50" required placeholder="Enter Type"  required title="test to update" />
</td></tr>

</table>
<input type="submit" name="insert" value="insert">


</form>

<form method="post" action="findOwner.php">
<table>

<tr><td>
Boardgame ID: 
</td><td>
<input type="text" name="findID" id="findID" size="20" maxlength="50" required placeholder="Enter boardgame ID"  title="Need to update this text"/>
 
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
$memberIDErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["memberID"])) {
	$memberIDErr = "memberID required";
} else {
	$memberID = test_input($_POST["memberID"]);
}

if(empty($_POST["bgID"])) {
	$bgIDErr = "boardgame ID please";
} else {
$bgID = test_input($_POST["bgID"]);
}

if (empty($_POST["boardgame"])) {
	$boardgameErr = "boardgame please";
}
else {
$boardgame = test_input($_POST["boardgame"]);
}

if (empty($_POST["num_of_players"])){
	$num_of_playersErr = "please enter number of players";
}
else{	
$num_of_players = test_input($_POST["num_of_players"]);
}

if (empty($_POST["type"])){
	$typeErr = "Please enter type";
}
else{
$type = test_input($_POST["type"]);

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
$sql = "INSERT INTO board_game_owner (memberID, bgID, boardgame, num_of_players, type) VALUES ('$memberID','$bgID','$boardgame', '$num_of_players', '$type')";
if ($conn->query($sql) === TRUE){
	echo "New boardgame record created sucessfully";
	// echo "<a href='index.html'>Go Back</a>";
 }else {
 	echo "Error: " . $sql . "<br>" . $conn->error;
}
}		
?>
 
