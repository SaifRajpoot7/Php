<?php
// session_start();
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes_taking";

$database = "mysql:host=localhost;dbname=notes_taking";

// Create a connection
$conn = new PDO($database,$username,$password);

// $conn = mysqli_connect($servername, $username, $password, $database);

require_once("functions.php");

?>