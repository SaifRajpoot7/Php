<?php
include('config.php');

function loginSystem()
{
    global $conn;
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $sql_username = "SELECT user_email from users WHERE user_email = :userEmail";
    $result = $conn->prepare($sql_username);
    $result->bindParam(':userEmail', $user_email);
    $result->execute();
    $email_rows = $result->fetchAll(\PDO::FETCH_ASSOC);
    if (count($email_rows) > 0) {
        $sql_username = "SELECT user_password from users WHERE user_email = :userEmail";
        $result = $conn->prepare($sql_username);
        $result->bindParam(':userEmail', $user_email);
        $result->execute();
        $pass_rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        foreach($pass_rows as $pass){
            if($pass['user_password'] == $user_password){
                $_SESSION['logedin'][] = [
                    "type" => "logedin",
                ];
                header("location: http://localhost/php/crud_app_PDO/index.php");
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    loginSystem();
}
include('views/login_view.php');
