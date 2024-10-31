<?php
include('config.php');
$currentUri = $_SERVER['REQUEST_URI'];
echo $currentUri;
if (strpos($currentUri, '/php/crud_app_PDO/index.php') !== false) {
    if (!isset($_SESSION['logedin'])) {
        header("location: http://localhost/php/crud_app_PDO/login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Taking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        span {
            color: red;
            margin-left: 25px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- -------------------------------------- nav bar--------------------------------------- -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/php/crud_app_PDO/index.php">Notes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/php/crud_app_PDO/index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php

    ///////////////////////////  Form Validation Result  ///////////////////////

    if (!empty($_SESSION['form-validation']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <?php

            foreach ($_SESSION['form-validation'] as $notice) {

                echo $notice['msg'] ?> </br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php }
            ?>
        </div>
    <?php
        unset($_SESSION['form-validation']);
    }


    ///////////////////////////  successfully Submition Result  ///////////////////////

    if (!empty($_SESSION['submit-success']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($_SESSION['submit-success'] as $submitSuccessMsg) {
                echo $submitSuccessMsg['msg'];
            ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php
            }
            ?>
        </div>
    <?php
        unset($_SESSION['submit-success']);
    }

    ///////////////////////////  Not Successfully Submition Result  ///////////////////////

    if (!empty($_SESSION['submit-unsuccess']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($_SESSION['submit-unsuccess'] as $submitUnsuccessMsg) {
                echo $submitUnsuccessMsg['msg'];
            ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php
            }
            ?>
        </div>
    <?php
        unset($_SESSION['submit_unsuccess']);
    }

    ///////////////////////////  successfully Deletion Result  ///////////////////////

    if (!empty($_SESSION['delete-success'])) {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($_SESSION['delete-success'] as $deleteSuccessMsg) {
                echo $deleteSuccessMsg['msg'];
            ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php
            }
            ?>
        </div>
    <?php
        unset($_SESSION['delete-success']);
    }

    ///////////////////////////  Not Successfully Deletion Result  ///////////////////////

    if (!empty($_SESSION['delete-unsuccess'])) {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($_SESSION['delete-unsuccess'] as $deleteUnsuccessMsg) {
                echo $deleteUnsuccessMsg['msg'];
            ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php
            }
            ?>
        </div>
    <?php
        unset($_SESSION['delete-unsuccess']);
    }

    ?>