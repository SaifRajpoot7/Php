<?php
// session_start();
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes_taking";

$database = "mysql:host=localhost;dbname=notes_taking";

// Create a connection
$conn = new PDO($database, $username, $password);

// $conn = mysqli_connect($servername, $username, $password, $database);
$file_path = "http://localhost/php/crud_app_PDO";
require_once("functions.php");

$currentUri = $_SERVER['REQUEST_URI'];
echo $currentUri;
if (!$currentUri == "/http://localhost/php/crud_app_PDO/login.php") {
    if (!isset($_SESSION['logedin'])) {
        header("location: http://localhost/php/crud_app_PDO/login.php");
    }
    echo "hello";
}
