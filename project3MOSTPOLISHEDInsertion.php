<!doctype html>
<html>
<head>
<style>

	body{background-color: powderblue;}

</style>
</head>
<body>

<?php

//http://msloan.create.stedwards.edu/dbProject/project3MOSTPOLISHEDInsertion.php
//Function to connect to database. In this case we are using the msloancr_IncrediblyReliableScooters2 for completion of this project.
function dbConnect()
{
	$servername = "localhost";
	$username = "msloancr_scooter";
	$password = "Community23";
	$dbname = "msloancr_IncrediblyReliableScooters2";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
} //end of function
//Creating an HTML form so that I can take data from the user. Completed using a fieldset.
echo
		"<form action = 'project3MOSTPOLISHEDInsertion.php' method = 'post'>
		<fieldset>
			<legend>To create a new customer instance plese enter your name and email</legend>

		<label for 'name1'> Name: </label>
		<input type = 'text' name = 'name1'>

		<label for 'email1'> email: </label>
		<input type = 'text' name = 'email1'>

		<input type = 'submit' value = 'submit your information'
		name = 'submitButton'>

	</fieldset>
	</form>";

//Posting the data recieved from the user to to php variables.
$nameIn2 = $_POST["name1"];
$emailIn2 = $_POST["email1"];
$buttonPressed = $_POST["submitButton"];
if(!empty($emailin2))
{
    "Your Insertion was made successfully";
}

//Function that receives the php variables above and inserts a customer instance according to their name and email.
function insertCustomer($conn,$nameIn2,$emailIn2)
{
	$sql = sprintf("insert into Customer values(null,'%s','%s');", $nameIn2,$emailIn2);
	$result = $conn->query($sql);
	echo "<br>";
	echo "<br>";
    echo "<b> Insertion 1: </b> The query to be completed is: ";
    echo $sql;
    echo "<br>";
    if ($conn->query($sql) === TRUE) {
			echo "<br>";
    echo "<b> Connection status: </b>Your connection to the database is currently working and if your insertion does not work correctly an error message will display. Thank you. ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;


}//end of function
}

//Creating an HTML form so that I can take data from the user. Completed using a fieldset.
echo
		"<form action = 'project3MOSTPOLISHEDInsertion.php' method = 'post'>
		<fieldset>
			<legend>To create a new Recharger account plese enter your name and email</legend>

		<label for 'rechargerName'> Name: </label>
		<input type = 'text' name = 'rechargerName'>

		<label for 'rechargerEmail'> email: </label>
		<input type = 'text' name = 'rechargerEmail'>

		<input type = 'submit' value = 'submit your information'
		name = 'submitButton'>

	</fieldset>
	</form>";
//Posting the data recieved from the user to to php variables.
	$rechargerName = $_POST["rechargerName"];
	$rechargerEmail = $_POST["rechargerEmail"];

function insertRecharger($conn,$rechargerName,$rechargerEmail)
{
	$sql = sprintf("insert into Recharger values (null, '%s', '%s');", $rechargerName,$rechargerEmail);
	$result = $conn->query($sql);
	echo "<br>";

    echo "<br>";
    if ($conn->query($sql) === TRUE) {
			echo "<br>";
    echo "";
    echo "<br>";
    echo "<b> Insertion 2: </b> The query to be completed is: ";
    echo $sql;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;


}//end of function
}
//Creating an HTML form so that I can take data from the user. Completed using a fieldset.
echo
		"<form action = 'project3MOSTPOLISHEDInsertion.php' method = 'post'>
		<fieldset>
			<legend>To enter a new scooter into the database: </legend>

		<label for 'scooterPrice'> Price: </label>
		<input type = 'number' name = 'scooterPrice'>

		<label for 'ScooterCity'> City: </label>
		<input type = 'text' name = 'ScooterCity'>

		<label for 'ScooterState'> State: </label>
		<input type = 'text' name = 'ScooterState'>

		<label for 'ScooterBrand'> Brand: </label>
		<input type = 'text' name = 'ScooterBrand'>

		<input type = 'submit' value = 'submit your information'
		name = 'submitButton'>

	</fieldset>
	</form>";
//Posting the data recieved from the user to to php variables.
	$scooterPrice = $_POST["scooterPrice"];
	$scooterCity = $_POST["ScooterCity"];
	$scooterState = $_POST["ScooterState"];
	$scooterBrand = $_POST["ScooterBrand"];
//Function that receives the php variables above and inserts a scooter into the db according to price, city, state, and brand.
function insertScooter($conn,$scooterPrice,$scooterCity,$scooterState,$scooterBrand)
{
	$sql = sprintf("insert into Scooter values (null, '2017-12-05', '%u','%s', '%s', '%s', 'TRUE');", $scooterPrice,$scooterCity, $scooterState,$scooterBrand);
	$result = $conn->query($sql);
	echo "<br>";

    echo "<br>";
    if ($conn->query($sql) === TRUE) {
			echo "<br>";
    echo "";
    echo "<br>";
    echo "<b> Insertion 3: </b> The query to be completed is: ";
    echo $sql;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn = dbConnect();

//calling functions with php variables in the parameters.
insertRecharger($conn,$rechargerName,$rechargerEmail);
insertCustomer($conn,$nameIn2,$emailIn2);
insertScooter($conn,$scooterPrice,$scooterCity,$scooterState,$scooterBrand);

$conn->close();



?>

</body>
</html>
