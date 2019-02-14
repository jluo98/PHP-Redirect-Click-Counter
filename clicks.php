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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, Url, Clicks FROM ClickRecord ORDER BY id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

	// output data of each row
	while($row = $result->fetch_assoc()) {

		echo "ID: " . $row["id"]. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;URL: " . $row["Url"]. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clicks: " . $row["Clicks"]. "<br>";

	}

} else {

	echo "No Data Available";

}

$conn->close();

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