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