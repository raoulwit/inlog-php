<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
// Include config file
require_once "config.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO meetings (meeting_naam, ontmoetingen, datum) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $meeting_naam, $ontmoetingen, $datum);

// set parameters and execute
$meeting_naam = "Eerste Meeting";
$ontmoetingen = "";
$datum = date('Y-m-d H:i:s');
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meeting</title>
    <link rel="stylesheet" href="all.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
    </style>
</head>
<body>

</body>
</html>
