<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="TM02.css">

<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
<title>Board games aficionados</title>

</head>
<body>

<h1>Welcome to board games aficionados!</h1>

<!--
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<table>

<tr><td>
Member ID: 
</td><td>
<input type="text" name="memberID" id="mid" size="20" maxlength="50" required pattern="\d{3}" required placeholder="Enter member ID"  title="Your Member ID is 3 digits."/>
   
</td></tr>

<tr><td>
First name: 
</td><td>
<input type="text" name="first_name" id = "fname" size="20" maxlength="50" required pattern="[A-Z][A-z|-|']+" required placeholder="Enter First name"  title="Please enter your first name. It must start with a capital."/>
   
</td></tr>


<tr><td>
Family name:
</td><td> 
<input type="text" name="family_name" size="20" maxlength="50" required pattern="[A-Z][A-z|-|']+" required placeholder="Enter Family name"  title="Please enter your family name. It must start with a captial" />
</td></tr>


<tr><td>
Email address:
</td><td> 
<input type="email" name="email" size="20" maxlength="50"  required placeholder="Enter Email address"   required title="Please enter your email address.It needs to contain one '@' at least"/>
</td></tr>

<tr><td>
Phone:
</td><td> 
<input type="text" name="phone" size="20" maxlength="50" required placeholder="Enter phone number" required pattern="\d{9}" required title="Please enter a 9 digit mobile phone number" />
</td></tr>


</table>
-->
<form method="post" action="players.php"> 
<input type="submit" id="mp" name="manage_players" value="        Manage players       ">
</form>
<form method="post" action="boardgames.php">
<input type="submit" name="manage_boardgames" value="Manage BoardGames">
</form>
<form method="post" action="boardgameschedule.php">
<input type="submit" name="manage_schedules" value="Manage boardgames schedules">
</form>
<form method="post" action="scores.php">
<input type="submit" name="manage_scores" value="Manage scores">
</form>
<form method="post" action="boardgameowners.php">
<input type="submit" name="manage_boardgame_owners" value="Manage boardgame owners">
</form>
<form method="post" action="assigngames.php">
<input type="submit" name="assign_games" value="Assign Games">


</form>
<!--
<form method="post" action="find.php">
<table>

<tr><td>
Membetesr ID: 
</td><td>
<input type="text" name="findID" id="findID" size="20" maxlength="50" required pattern="\d{3}" required placeholder="Enter member ID"  title="Your Member ID is 3 digits."/>
 
<input type="submit" name="find" value="find">
</table>
</form>

<form method="post" action="addGame.php">
<table>

<tr><td>
AddGame: 
</td><td>
 
<input type="submit" name="addGame" value="addGame">
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
	$memberIDErr = "Member ID required";
} else {
	$memberID = test_input($_POST["memberID"]);
}

if(empty($_POST["first_name"])) {
	$first_nameErr = "Your first name please";
} else {
$first_name = test_input($_POST["first_name"]);
}

if (empty($_POST["family_name"])) {
	$last_nameErr = "Your family name please";
}
else {
$family_name = test_input($_POST["family_name"]);
}

if (empty($_POST["email"])){
	$emailErr = "please enter your email";
}
else{	
$email = test_input($_POST["email"]);
}

if (empty($_POST["phone"])){
	$phoneErr = "Please enter your phone number";
}
else{
$phone = test_input($_POST["phone"]);

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
$sql = "INSERT INTO players (memberID, first_name, family_name, email, phone) VALUES ('$memberID','$first_name','$family_name', '$email', '$phone')";
if ($conn->query($sql) === TRUE){
	echo "New member record created sucessfully";
	// echo "<a href='index.html'>Go Back</a>";
 }else {
 	echo "Error: " . $sql . "<br>" . $conn->error;
}
}		
?>
 
