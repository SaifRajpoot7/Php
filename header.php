<?php
$currentUri = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['logedin'])) {
    if (strpos($currentUri, '/php/crud_app_PDO/login.php') === FALSE && stripos($currentUri, '/php/crud_app_PDO/register.php') === FALSE) {
        header("location: http://localhost/php/crud_app_PDO/login.php");
        exit;
    }
}

///////////////////////////  Login Validation Result  ///////////////////////
if (!empty($_SESSION['login_errors']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_errors = $_SESSION['login_errors'];
}


///////////////////////////  Form Validation Result  ///////////////////////

if (!empty($_SESSION['form-validation']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_validation_notice = $_SESSION['form-validation'];
}


///////////////////////////  successfully Submition Result  ///////////////////////

if (!empty($_SESSION['submit-success']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_submition_notice = $_SESSION['submit-success'];
}

///////////////////////////  Not Successfully Submition Result  ///////////////////////

if (!empty($_SESSION['submit-unsuccess']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_submition_error = $_SESSION['submit-unsuccess'];
}

///////////////////////////  successfully Deletion Result  ///////////////////////

if (!empty($_SESSION['delete-success'])) {
    $record_deletion_notice = $_SESSION['delete-success'];
}

///////////////////////////  Not Successfully Deletion Result  ///////////////////////

if (!empty($_SESSION['delete-unsuccess'])) {
    $record_deletion_error = $_SESSION['delete-unsuccess'];
}


include('views/header_view.php');
?>