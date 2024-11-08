<?php
if(!function_exists("getUsersList")){
    function getUsersList(){
        global $conn;
        $sql = "SELECT * from student";
        $result = $conn->query($sql);
        $data = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }
}

function getUsersDetail(){
    global $conn;
    $sql_get_user_info = "SELECT * from users WHERE user_email = :userEmail";
    $result = $conn->prepare($sql_get_user_info);
    $result->bindParam(':userEmail', $user_email);
    $result->execute();
    $user_data = $result->fetchAll(\PDO::FETCH_ASSOC);

    return $user_data;
}