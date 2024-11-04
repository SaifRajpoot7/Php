<?php
include('config.php');

unset($_SESSION['logedin']);
header("location: http://localhost/php/crud_app_PDO/login.php");
exit();
?>