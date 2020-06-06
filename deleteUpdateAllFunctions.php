<!doctype html>
<html>
<head>
<style>

	body{background-color: Thistle;}

</style>
</head>
<body>
<h3> Now that you are able to successfully find a Customers ID using my API you can delete a Customer and update their information</h3>
  <?php
	//http://msloan.create.stedwards.edu/dbProject/deleteUpdateAllFunctions.php
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
		"<form action = 'deleteUpdateAllFunctions.php' method = 'post'>
		<fieldset>
			<legend>Deletion #1: Enter the id of the customer you would like to delete </legend>

		<label for 'id'> Customer ID: </label>
		<input type = 'number' name = 'id'>

		<input type = 'submit' value = 'submit'>

	</fieldset>
	</form>";
//Posting the data recieved from the user to to php variables.
$customerID = $_POST['id'];
echo "The ID you entered:";
echo $customerID;
echo "<br>";
//Function that receives the php variables above and deletes a customer instance according to their id.
function deleteCustomer($conn, $customerID)
{
	$sql = sprintf("DELETE from Customer WHERE Customer.Customer_ID = '%u';", $customerID);
  echo "<br>";
	echo "<br>";
	echo "<b>" .  "Contents for Deletion #1:" . "</b>" . "<br>";
    echo "The query to be completed is: ";
    echo $sql;
    echo "<br>";
	$result = $conn->query($sql);
//DB foreign keys are set to delete Restrict so it will complete the deletion, but the else statement below gives a detailed message of why the exact
//query you were making and its relationship in the database to the foreign keys and tables.
echo "<br>";
    echo "The database is currently set with referential integrity of Delete Restrict. Therefore this deletion will not work, but will give you an idea of what the correct query was to be made. It will display an error message that shows the api is performing correctly, and once again this deletion would be successful if the database had a referential integrity of on cascade. Thank you. ";
      echo "<br>";
  if ($conn->query($sql) === TRUE) {
        echo "<br>";
    // echo "The database is currently set with referential integrity of Delete Restrict. Therefore this deletion will not work, but will give you an idea of what the correct query was to be made. It will display an error message that shows the api is performing correctly, and once again this deletion would be successful if the database had a referential integrity of on cascade. Thank you. ";
      echo "<br>";
} else {
    echo "<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br>";

}//end of function
}
//Creating an HTML form so that I can take data from the user. Completed using a fieldset.
echo
		"<form action = 'deleteUpdateAllFunctions.php' method = 'post'>
		<fieldset>
			<legend>Deletion #2: Enter the name and email of the Recharger you would like to delete </legend>

		<label for 'rechargerName'> Recharger Name: </label>
		<input type = 'text' name = 'rechargerName'>

		<label for 'rechargerEmail'> Recharger Email: </label>
		<input type = 'text' name = 'rechargerEmail'>

		<input type = 'submit' value = 'submit'>

	</fieldset>
	</form>";
//Posting the data recieved from the user to to php variables.
$rechargerName = $_POST['rechargerName'];
$rechargerEmail = $_POST['rechargerEmail'];

//Function that receives the php variables above and deletes a recharger instance according to their name of the recharger and their email.
function deleteRecharger($conn, $rechargerName, $rechargerEmail)
{
	$sql = sprintf("delete from Recharger Where Recharger.name = '%s' AND Recharger.email = '%s';", $rechargerName, $rechargerEmail);
  echo "<br>";
	echo "<br>";
	echo "<b>" .  "Contents for Deletion #2:" . "</b>" . "<br>";
    echo "The query to be completed is: ";
    echo $sql;
    echo "<br>";
	$result = $conn->query($sql);

echo "<br>";
    echo "The database is currently set with referential integrity of Delete Restrict. Therefore this deletion will not work, but will give you an idea of what the correct query was to be made. It will display an error message that shows the api is performing correctly, and once again this deletion would be successful if the database had a referential integrity of on cascade. Thank you. ";
      echo "<br>";
  if ($conn->query($sql) === TRUE) {
        echo "<br>";
    // echo "The database is currently set with referential integrity of Delete Restrict. Therefore this deletion will not work, but will give you an idea of what the correct query was to be made. It will display an error message that shows the api is performing correctly, and once again this deletion would be successful if the database had a referential integrity of on cascade. Thank you. ";
      echo "<br>";
} else {
    echo "<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br>";

}//end of function
}


//Creating an HTML form so that I can take data from the user. Completed using a fieldset.
echo
		"<form action = 'deleteUpdateAllFunctions.php' method = 'post'>
		<fieldset>
			<legend>Update #1: Enter the ID of the customer you would like to update their email. The email of the  </legend>

		<label for 'customerID'> customerID: </label>
		<input type = 'text' name = 'customerID2'>

    <label for 'email'> email: </label>
		<input type = 'text' name = 'email2'>

		<input type = 'submit' value = 'submit'>

	</fieldset>
	</form>";
//Posting the data recieved from the user to to php variables.
$customerID2 = $_POST['customerID2'];
// $customerName = $_POST['name'];
$customerEmail = $_POST['email2'];


function updateCustomer($conn,$customerID2, $customerEmail)
{
	$sql = sprintf("Update Customer set Customer.email = '%s' WHERE Customer.Customer_ID = '%u';", $customerEmail,$customerID2);
	$result = $conn->query($sql);
	echo "<b>" .  "Contents for Update #1:" . "</b>" . "<br>";
	echo "The query to be completed is: ";

    echo $sql;
    echo "<br>";
		if ($conn->query($sql) === TRUE) {
			echo "<br>";
	    echo "Your connection to the database is currently working and if your update does not work correctly an error message will display. Thank you. ";
	} else {
		echo "<br>";
	    echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<br>";
}//end of function
}

echo
		"<form action = 'deleteUpdateAllFunctions.php' method = 'post'>
		<fieldset>
			<legend>Update #1: Move all of scooters location from  city to city designated by the state: </legend>

		<label for 'ScooterCity'> City to move scooters to: </label>
		<input type = 'text' name = 'ScooterCity'>

    <label for 'ScooterState'> State to choose what collection of scooters you will be moving: </label>
		<input type = 'text' name = 'ScooterState'>

		<input type = 'submit' value = 'submit'>

	</fieldset>
	</form>";


$scooterCity  = $_POST['ScooterCity'];
$scooterState  = $_POST['ScooterState'];



function updateScooterCityAndState($conn,$scooterCity, $scooterState)
{

	$sql = sprintf("update Scooter set Scooter.City = '%s' WHERE Scooter.state = '%s';", $scooterCity,$scooterState);
	$result = $conn->query($sql);
	echo "<b>" .  "Contents for Update #2:" . "</b>" . "<br>";
	echo "The query to be completed is: ";

    echo $sql;
    echo "<br>";
		if ($conn->query($sql) === TRUE) {
			echo "<br>";
	    echo "Your connection to the database is currently working and if your update does not work correctly an error message will display. Thank you. ";
	} else {
		echo "<br>";
	    echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<br>";
}//end of function
}


$conn = dbConnect();
deleteCustomer($conn, $customerID);
updateCustomer($conn,$customerID2, $customerEmail);
deleteRecharger($conn, $rechargerName, $rechargerEmail);
updateScooterCityAndState($conn,$scooterCity, $scooterState);
$conn->close();




?>
</body>
</html>
