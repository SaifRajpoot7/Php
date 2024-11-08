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

                <?php
                if (stripos($currentUri, '/php/crud_app_PDO/login.php') !== FALSE || stripos($currentUri, '/php/crud_app_PDO/register.php') !== FALSE) {
                } else {
                ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://localhost/php/crud_app_PDO/index.php">Home</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>

            <?php
            if (stripos($currentUri, '/php/crud_app_PDO/login.php') !== FALSE) {
            ?>
                <a class="btn btn-outline-success" type="submit" href="register.php">Sign up</a>
            <?php
            } else if (stripos($currentUri, '/php/crud_app_PDO/register.php') !== FALSE) {
            ?>
                <a class="btn btn-outline-success" type="submit" href="login.php">Login</a>
                <?php
            } else {
                if (!empty($user_detail)) {
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <h5>
                        <?php
                        foreach ($user_detail as $notice) {
                            echo $notice['user_name'];
                        }
                        ?>
                    </h5>
                <?php
                }
                ?>
                <form method="post" action="logout.php" style="margin-left: 20px;">
                    <button class="btn btn-outline-success" type="submit">Log out</button>
                </form>
            <?php
            }
            ?>
        </div>
    </nav>
    <?php

    ///////////////////////////  Registration Validation Result  ///////////////////////
    if (!empty($registraion_errors)) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <?php

            foreach ($registraion_errors as $notice) {

                echo $notice['msg'] ?> </br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php }
            ?>
        </div>
    <?php
        unset($_SESSION["register_form_validation"]);
    }

    ///////////////////////////  Login Validation Result  ///////////////////////
    if (!empty($login_errors)) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <?php

            foreach ($login_errors as $notice) {

                echo $notice['msg'] ?> </br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php }
            ?>
        </div>
    <?php
        unset($_SESSION['login_errors']);
    }

    ///////////////////////////  Form Validation Result  ///////////////////////

    if (!empty($form_validation_notice)) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
            foreach ($form_validation_notice as $notice) {
                echo $notice['msg'] ?> </br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php }
            ?>
        </div>
    <?php
        unset($_SESSION['form-validation']);
    }


    ///////////////////////////  successfully Submition Result  ///////////////////////

    if (!empty($form_submition_notice)) {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($form_submition_notice as $submitSuccessMsg) {
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

    if (!empty($form_submition_error)) {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($form_submition_error as $submitUnsuccessMsg) {
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

    if (!empty($record_deletion_notice)) {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($record_deletion_notice as $deleteSuccessMsg) {
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

    if (!empty($record_deletion_error)) {
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php
            foreach ($record_deletion_error as $deleteUnsuccessMsg) {
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