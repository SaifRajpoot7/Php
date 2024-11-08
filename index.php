<?php
include('config.php');



// Deletion Function

function deleterecord($del, $conn)
{
    $sqldel = "DELETE FROM student WHERE id = :delid";
    $result = $conn->prepare($sqldel);
    $result->bindParam(':delid', $del);
    $result->execute();
    if ($result) {
        $_SESSION["delete-success"][] = [
            "type" => "delete-success",
            "msg" => "Record Deletion Successfull."
        ];
        //header("location: http://localhost/php/crud_app_PDO/index.php");
    } else {
        $_SESSION["delete-unsuccess"][] = [
            "type" => "delete-unsuccess",
            "msg" => "Record Deletion Unsuccessfull."
        ];
    }
}


// Data Saving Function

function savingDataInDatabase($conn)
{

    // check that the values are in correct format
    if (empty($_POST['name'])) {
        $_SESSION["form-validation"][] = [
            "type" => "name-error",
            "msg" => "Name can't be empty"
        ];
    }
    if (empty($_POST['father-name'])) {
        $_SESSION["form-validation"][] = [
            "type" => "father-name-error",
            "msg" => "Father Name can't be empty"
        ];
    }
    if (empty($_POST['email'])) {
        $_SESSION["form-validation"][] = [
            "type" => "email-empty",
            "msg" => "Email can't be empty"
        ];
    } else if (str_contains($_POST['email'], '@') == FALSE) {
        $_SESSION["form-validation"][] = [
            "type" => "email-type",
            "msg" => "Email Must Contain @ in it"
        ];
    }
    if (empty($_POST['contact'])) {
        $_SESSION["form-validation"][] = [
            "type" => "contact-error",
            "msg" => "Contact Number can't be empty"
        ];
    }

    // Taking Data from Form

    $name = $_POST['name'];
    $father_name = $_POST['father-name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    if (!isset($_SESSION["form-validation"])) {

        // Submit these to a database

        // Sql query to be executed
        $sql = "INSERT INTO student (name, father_name, email, contact) VALUES (:name, :father_name, :email, :contact)";
        $result = $conn->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':father_name', $father_name);
        $result->bindParam(':email', $email);
        $result->bindParam(':contact', $contact);
        $result->execute();


        if ($result) {

            $_SESSION["submit-success"][] = [
                "type" => "submit-success",
                "msg" => "Success! Your note was successfully submitted."
            ];
        } else {
            $_SESSION["submit-unsuccess"][] = [
                "type" => "submit-unsuccess",
                "msg" => "Unsuccess! Your note was not successfully submitted."
            ];
        }
    }
}


// -------------------------------------- Form Data Handling--------------------------------------- 

// Data Deletion From Form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $del = $_POST['delete'];
    deleterecord($del, $conn);
}

// Form Data Handling
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['delete'])) {
    savingDataInDatabase($conn);
}


// $sql = "SELECT * from student";
// $result = $conn->query($sql);
// $data = $result->fetchAll(\PDO::FETCH_ASSOC);
$data = getUsersList();

include('views/index_view.php');
