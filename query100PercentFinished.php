<!Doctype html>
<html>
<head>
<style>

 body{background-color: salmon;}

</style>
</head>
<body>
<p1> Forgot your id:</p1>
<h> Select the name of the person you would like to get the ID of </h>

</body>

<?php
//http://msloan.create.stedwards.edu/dbProject/query100PercentFinished.php


//Creating an HTML form so that I can take data from the user. Completed using a fieldset.
echo
   "<form action = 'query100PercentFinished.php' method = 'post'>
   <fieldset>
     <legend><b> Query 1:</b>Enter your name and email</legend>

   <label for 'name'> Name: </label>
   <input type = 'text' name = 'name'>

   <label for 'email'> email: </label>
   <input type = 'text' name = 'email'>

   <input type = 'submit' value = 'submit'>
   <input type = 'hidden'>

 </fieldset>
 </form>";

//Posting the data recieved from the user to to php variables.
$nameIn = $_POST["name"];
$emailIn = $_POST["email"];


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


//Function that receives the php variables above and selects a customers ID according to their name and email.

function returnScooterID($conn,$nameIn, $emailIn)
{
 $sql = sprintf("select Customer.Customer_ID from Customer where Customer.name = '%s' and Customer.email = '%s';",$nameIn,$emailIn);
 echo "<br>";
 echo "<br>";
 echo "<b>" .  "Contents for Query 1:" . "</b>" . "<br>";
 echo "The SQL Statement made from your Request: ";
 echo $sql;
 //"SELECT * FROM student where name = '" . $nameIn . "'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
     echo "<br>";
        echo sprintf("The name you entered is: %s.", $nameIn);
   echo "<br>";
   echo("Your Query was successful and the Customer Id is: ". $row["Customer_ID"]);
   echo "<br>";
       }
 }
 else {
     echo "<br>";
     echo "<br>";
     echo "<br>";
            echo "There was 0 results. Unfortunately this name and email does not match anybody in the scooter database";
            echo "<br>";
            echo "<br>";
        }
}
//HTML Form to receive data for Query 2:
echo
   "<form action = 'query100PercentFinished.php' method = 'post'>
   <fieldset>
     <legend><b> Query 2:</b>Find a scooters current GPS Location from its ID:</legend>

   <label for 'scooterID2'> ScooterID: </label>
   <input type = 'text' name = 'scooterID2'>

   <input type = 'submit' value = 'submit scooters ID'>
   <input type = 'hidden'>

 </fieldset>
 </form>";

//PHP Variable that stores data from the user.
$scooterIDIn = $_POST["scooterID2"];

//Function that returns a scooters GPS location accoring to the scooter's ID.
 function returnScooterGPSLocation($conn,$scooterIDIn)
 {
   $sql = sprintf("select Scooter_Analytics.current_GPS_Location from Scooter,Scooter_Analytics where Scooter.scooter_id = Scooter_Analytics.scooter_id and Scooter_Analytics.scooter_id = '%u';",$scooterIDIn);
   echo "<br>";
   echo "<br>";
   echo "<b>" .  "Contents for Query 2:" . "</b>" . "<br>";
   echo "The SQL Statement made from your Request: ";
   echo $sql;
   //"SELECT * FROM student where name = '" . $nameIn . "'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       // output data of each row
         while($row = $result->fetch_assoc()) {
       echo "<br>";
         echo sprintf("The id you entered is: %u.", $scooterIDIn);
     echo "<br>";
     echo("Your Query was successful and the Scooter GPS location is: ". $row["current_GPS_Location"]);
     echo "<br>";
         }
   }
   else {
       echo "<br>";
       echo "<br>";
       echo "<br>";
             echo "There was no scooters with this ID. ";
             echo "<br>";
             echo "<br>";
         }
 }


//HTML Form to recieve data from the user in a legend format. For Query 3
 echo
     "<form action = 'query100PercentFinished.php' method = 'post'>
     <fieldset>
       <legend><b> Query 3: Find the analytics of a Rental Instance</b>Get :</legend>

     <label for 'rentalID'> Rental Instance ID: </label>
     <input type = 'number' name = 'rentalID'>

     <input type = 'submit' value = 'Submit Rental Instance ID'>
     <input type = 'hidden'>

   </fieldset>
   </form>";

//Storing the rental's ID received in the HTML form above in PHP variables.
 $rentalIDIn = $_POST["rentalID"];
//Function that receives Rental ID to return the various analytics of the rental instance.
   function returnRenatalAnalytics($conn, $rentalIDIn)
   {

     $sql = sprintf("select * from rental, Rental_Analytics where rental.Rental_ID=Rental_Analytics.Rental_ID and rental.Rental_ID = '%u';",$rentalIDIn);
     echo "<br>";
     echo "<br>";
     echo "<b>" .  "Contents for Query 3:" . "</b>" . "<br>";
     echo "The SQL Statement made from your Request: ";
     echo $sql;
     //"SELECT * FROM student where name = '" . $nameIn . "'";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
           while($row = $result->fetch_assoc()) {
         echo "<br>";
           echo sprintf("The id you entered is: %u.", $rentalIDIn);
       echo "<br>";
       echo("Your Query was successful and the total distance traveled during this rental instance is: ". $row["distance_traveled"]);
       echo "<br>";
       echo("Your Query was successful and the length of time the scooter was used during this rental instance is: ". $row["length_of_time_used"]);
       echo "<br>";
       echo("Your Query was successful and the top speed achieved during this rental instance is: ". $row["top_speed"]);
       echo "<br>";
           }
     }
     else {
         echo "<br>";
         echo "<br>";
         echo "<br>";
               echo "There was no Rental instances with this ID. ";
               echo "<br>";
               echo "<br>";
           }
   }




//creating php variable that stores db connect function

$conn = dbConnect();


//Calling functions with the correct data stored in the PHP variables.
returnScooterID($conn,$nameIn, $emailIn);
returnScooterGPSLocation($conn,$scooterIDIn);
returnRenatalAnalytics($conn, $rentalIDIn);

$conn->close();


?>

</html>
