<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    unset($_SESSION['logedin']);
    header("location: http://localhost/php/crud_app_PDO/login.php");
    exit();
} else {
    header("location: http://localhost/php/crud_app_PDO/index.php");
}
