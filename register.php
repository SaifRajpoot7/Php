<?php
include('config.php');

if (isset($_SESSION['logedin'])) {
    header("location: http://localhost/php/crud_app_PDO/index.php");
    exit;
}
// Data Saving Function
function userRegistratoin()
{
    global $conn;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    ///////// empty field validation ////////
    if (empty($username)) {
        $_SESSION["register_form_validation"][] = [
            "type" => "user_name_error",
            "msg" => "User Name can't be empty"
        ];
    }
    if (empty($email)) {
        $_SESSION["register_form_validation"][] = [
            "type" => "email_error",
            "msg" => "Email can't be empty"
        ];
    } else if (str_contains($email, '@') == FALSE) {
        $_SESSION["register_form_validation"][] = [
            "type" => "email_type",
            "msg" => "Email Must Contain @ in it"
        ];
    }
    if (empty($password)) {
        $_SESSION["register_form_validation"][] = [
            "type" => "password_error",
            "msg" => "Password can't be empty"
        ];
    }
    if (empty($cpassword)) {
        $_SESSION["register_form_validation"][] = [
            "type" => "cpassword_error",
            "msg" => "Confirm Password can't be empty"
        ];
    }
    ////////// data validation ///////////
    $sql_username = "SELECT user_name from users WHERE user_name = :userName";
    $result = $conn->prepare($sql_username);
    $result->bindParam(':userName', $username);
    $result->execute();
    $username_rows = $result->fetchAll(\PDO::FETCH_ASSOC);
    if (count($username_rows) > 0) {
        $_SESSION["register_form_validation"][] = [
            "type" => "username_availability",
            "msg" => "Username not availabe"
        ];
    }
    $sql_username = "SELECT user_email from users WHERE user_email = :userEmail";
    $result = $conn->prepare($sql_username);
    $result->bindParam(':userEmail', $email);
    $result->execute();
    $email_rows = $result->fetchAll(\PDO::FETCH_ASSOC);
    if (count($email_rows) > 0) {
        $_SESSION["register_form_validation"][] = [
            "type" => "email_availability",
            "msg" => "Email is already Registered"
        ];
    }
    if (!empty($cpassword)) {
        if ($password !== $cpassword) {
            $_SESSION["register_form_validation"][] = [
                "type" => "password_similarity",
                "msg" => "Confirm password must be same as password"
            ];
        }
    }

    if (!isset($_SESSION["register_form_validation"])) {

        // Submit these to a database

        // Sql query to be executed
        $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (:user_name, :user_email, :user_password)";
        $result = $conn->prepare($sql);
        $result->bindParam(':user_name', $username);
        $result->bindParam(':user_email', $email);
        $result->bindParam(':user_password', $password);
        $result->execute();
        if ($result) {
            header("location: http://localhost/php/crud_app_PDO/login.php");
        }
    }
}
// Form Data Handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    userRegistratoin();
}

include('views/register_view.php');
