<?php

// MySQL Database
$servername = "localhost";      // MySQL Host
$username = "user";             // Username for you database
$password = "pass";             // Password with your username
$dbname = "database";           // Database Name

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
        echo "id: " . $row["id"]. "  -  Url: " . $row["Url"]. "  -  Click Count: " . $row["Clicks"]. "<br>";
    }
} else {
    echo "No Data Available";
}
$conn->close();

// Written by Steve-luo <http://www.steve-luo.com>
// You can do whatever you want with the codes as long as you keep my info above.

?>