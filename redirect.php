<?php

/****************************************************************

   Modify content below according your MySQL database settings

*****************************************************************/


// MySQL Database
$servername = "localhost";      // MySQL Host
$username = "user";             // Username for you database
$password = "pass";             // Password with your username
$dbname = "database";           // Database Name


/****************************************************************

  DO NOT modify anything below if you are not sure what they do

*****************************************************************/


// Get url input
$redirectUrl = $_GET['forward'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} 

// sql to create table
$sql = "CREATE TABLE ClickRecord (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Url TEXT NOT NULL,
Clicks INT UNSIGNED NOT NULL
)";

if ($conn->query($sql) === TRUE) {

	//echo "Checking Table...<br>";
	//echo "Table created successfully<br>";

	// Insert new row
	//echo "Inserting...<br>";
	$sql = "INSERT INTO ClickRecord (Url, Clicks)
	VALUES ('$redirectUrl', '1')";

	// Check if row added successfully
	if ($conn->query($sql) === TRUE) {
		//echo "Checking Row...<br>";

	} else {

		//echo "Error: " . $sql . "<br>" . $conn->error;

		// Updating existing row
		//echo "Checking Row...<br>";
		//echo "Updating...<br>";
		$sql = "UPDATE ClickRecord SET Clicks=Clicks+1 WHERE Url='{$redirectUrl}'";

		// Check if row updated successfully
		if ($conn->query($sql) === TRUE) {
			//echo "Record updated successfully";

		} else {

			//echo "Error updating record: " . $conn->error;

		}

	}

} else {

	//echo "Updating Existing Record...<br>";
	
	$sql = "SELECT Url FROM ClickRecord WHERE Url='{$redirectUrl}'";
	$checkResult = $conn->query($sql);

	if ($checkResult->num_rows == 1) {

		// output data of the row
		while($checkRow = $checkResult->fetch_assoc()) {

			$output = $checkRow["Url"];

		}

			if ($output == $redirectUrl) {

				// Updating existing row
				$sql = "UPDATE ClickRecord SET Clicks=Clicks+1 WHERE Url='{$redirectUrl}'";

				// Check if row updated successfully
				if ($conn->query($sql) === TRUE) {

					//echo "Record updated successfully";

				} else {

					//echo "Error updating record: " . $conn->error;

				}

			}

	} else {

		// Insert new row
		$sql = "INSERT INTO ClickRecord (Url, Clicks)
		VALUES ('$redirectUrl', '1')";

		// Check if row added successfully
		if ($conn->query($sql) === TRUE) {

			//echo "New record created successfully";

		} else {

			//echo "Error: " . $sql . "<br>" . $conn->error;

		}

	}

}

header("Location: ".$redirectUrl);

// Written by Steve-luo <http://www.steve-luo.com>
// You can do whatever you want with the codes as long as you keep my info above.

?>