<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="TM02.css">

<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
<title>Manage_Board_Game_Schedule</title>

</head>
<body>

<h1>Boardgame Schedule</h1>


<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<table>

<tr><td>
Event ID: 
</td><td>
<input type="text" name="eventID" id="eventID" size="20" maxlength="50" required placeholder="Enter event ID"  title="Update this text."/>
   
</td></tr>

<tr><td>
Event Name: 
</td><td>
<input type="text" name="event_name" id="Ename" size="20" maxlength="50" required placeholder="Enter event name"  title="Enter event name."/>
   
</td></tr>

<tr><td>
Day: 
</td><td>
<input type="text" name="day" id = "day" size="20" maxlength="50" required placeholder="Enter day of game"  title="Please enter your first name. It must start with a capital."/>
   
</td></tr>


<tr><td>
Time:
</td><td> 
<input type="text" name="time" size="20" maxlength="50"  required placeholder="Enter game time"  title="Please enter the time." />
</td></tr>


<tr><td>
location:
</td><td> 
<input type="text" name="location" size="20" maxlength="50"  required placeholder="Enter location or venue"   required title="Please enter location"/>
</td></tr>

</table>
<input type="submit" name="insert" value="insert">


</form>

<form method="post" action="findSchedule.php">
<table>

<tr><td>
Event ID: 
</td><td>
<input type="text" name="findID" id="findID" size="20" maxlength="50"  required placeholder="Enter event ID"  title="Your event ID is x digits."/>
 
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
$eventIDErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["eventID"])) {
	$eventIDErr = "Event ID required";
} else {
	$eventID = test_input($_POST["eventID"]);
}

if(empty($_POST["event_name"])) {
	$event_nameErr = "Event name please";
} else {
$event_name = test_input($_POST["event_name"]);
}

if (empty($_POST["day"])) {
	$dayErr = "day please";
}
else {
$day = test_input($_POST["day"]);
}

if (empty($_POST["time"])){
	$timeErr = "time";
}
else{	
$time = test_input($_POST["time"]);
}

if (empty($_POST["location"])){
	$locationErr = "Please enter location";
}
else{
$location = test_input($_POST["location"]);

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
$sql = "INSERT INTO schedule (eventID, event_name, day, time, location) VALUES ('$eventID','$event_name','$day', '$time', '$location')";
if ($conn->query($sql) === TRUE){
	echo "New event record created sucessfully";
	// echo "<a href='index.html'>Go Back</a>";
 }else {
 	echo "Error: " . $sql . "<br>" . $conn->error;
}
}		
?>
 
