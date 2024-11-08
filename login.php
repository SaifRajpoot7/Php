<?php
include('config.php');

if (isset($_SESSION['logedin'])) {
    header("location: http://localhost/php/crud_app_PDO/index.php");
    exit;
}

function loginSystem()
{
    global $conn;
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    ///////// checking email /////////
    $sql_username = "SELECT user_email from users WHERE user_email = :userEmail";
    $result = $conn->prepare($sql_username);
    $result->bindParam(':userEmail', $user_email);
    $result->execute();
    $email_rows = $result->fetchAll(\PDO::FETCH_ASSOC);
    if (count($email_rows) > 0) {
        ///////// checking password /////////
        $sql_username = "SELECT user_password from users WHERE user_email = :userEmail";
        $result = $conn->prepare($sql_username);
        $result->bindParam(':userEmail', $user_email);
        $result->execute();
        $pass_rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($pass_rows as $pass) {
            if ($pass['user_password'] == $user_password) {
                $_SESSION['logedin'] = TRUE;
                ////////// getting user details /////////
                $sql_get_user_info = "SELECT * from users WHERE user_email = :userEmail";
                $result = $conn->prepare($sql_get_user_info);
                $result->bindParam(':userEmail', $user_email);
                $result->execute();
                $user_data = $result->fetchAll(\PDO::FETCH_ASSOC);
                if (count($user_data) > 0) {
                    foreach ($user_data as $row) {
                        $_SESSION['login_user_details'][] = [
                            "user_name" => $row['user_name'],
                            "user_email" => $row['user_email'],
                            "user_id" => $row['user_id']
                        ];
                    }
                }
                header("location: http://localhost/php/crud_app_PDO/index.php");
            } else {
                $_SESSION['login_errors'][] = [
                    "type" => "invalid_password",
                    "msg" => "Your password is incorrect."
                ];
            }
        }
    } else {
        $_SESSION['login_errors'][] = [
            "type" => "invalid_email",
            "msg" => "Please Enter a valid email."
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    loginSystem();
}
include('views/login_view.php');
