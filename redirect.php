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
$inputUrl = $_GET['forward'];

// Format input URL for recording and redirecting
if (stripos($inputUrl, "http://") === 0) {

	$redirectUrl = $inputUrl;
	$recordUrl = substr($inputUrl, strlen("http://"));

} elseif (stripos($inputUrl, "https://") === 0) {

	$redirectUrl = $inputUrl;
	$recordUrl = substr($inputUrl, strlen("https://"));

} elseif (stripos($inputUrl, "//") === 0) {

	$redirectUrl = $inputUrl;
	$recordUrl = substr($inputUrl, strlen("//"));

} else {

	$redirectUrl = "http://" . $inputUrl;
	$recordUrl = $inputUrl;

}

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
	VALUES ('$recordUrl', '1')";

	// Check if row added successfully
	if ($conn->query($sql) === TRUE) {
		
		//echo "Checking Row...<br>";

	} else {

		//echo "Error: " . $sql . "<br>" . $conn->error;

		// Updating existing row
		//echo "Checking Row...<br>";
		//echo "Updating...<br>";
		$sql = "UPDATE ClickRecord SET Clicks=Clicks+1 WHERE Url='{$recordUrl}'";

		// Check if row updated successfully
		if ($conn->query($sql) === TRUE) {

			//echo "Record updated successfully";

		} else {

			//echo "Error updating record: " . $conn->error;

		}

	}

} else {

	//echo "Updating Existing Record...<br>";
	
	$sql = "SELECT Url FROM ClickRecord WHERE Url='{$recordUrl}'";
	$checkResult = $conn->query($sql);

	if ($checkResult->num_rows == 1) {

		// output data of the row
		while($checkRow = $checkResult->fetch_assoc()) {

			$output = $checkRow["Url"];

		}

			if ($output == $recordUrl) {

				// Updating existing row
				$sql = "UPDATE ClickRecord SET Clicks=Clicks+1 WHERE Url='{$recordUrl}'";

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
		VALUES ('$recordUrl', '1')";

		// Check if row added successfully
		if ($conn->query($sql) === TRUE) {

			//echo "New record created successfully";

		} else {

			//echo "Error: " . $sql . "<br>" . $conn->error;

		}

	}

}

header("Location: ".$redirectUrl);

/*

	Written by Steve-luo <https://steve-luo.com>

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

?>