<?php
include('header.php');
$upId;





// Upated Data Saving in Database Function


function updateRecordDatabase($conn, $upId)
{


    // check that the values are in correct format

    if (empty($_POST['name'])) {
        global $name_error;
        $name_error = "Name can't be empty";
    }
    if (empty($_POST['father-name'])) {
        global $father_name_error;
        $father_name_error = "Father Name can't be empty";
    }
    if (empty($_POST['email'])) {
        global $email_empty_error;
        $email_empty_error = "Email can't be empty";
    }
    if (str_contains($_POST['email'], '@') == FALSE) {
        global $email_type_error;
        $email_type_error = "Email Must Contain @ in it";
    }
    if (empty($_POST['contact'])) {
        global $contact_error;
        $contact_error = "Contact Number can't be empty";
    }

    $sr = $_POST['id'];
    $name = $_POST['name'];
    $father_name = $_POST['father-name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];


    // Die if connection was not successful



    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
        // Submit these to a database
        // Sql query to be executed 


        // check that the values are in correct format

        if (empty($_POST['name']) == FALSE && empty($_POST['father-name']) == FALSE && empty($_POST['email']) == FALSE && str_contains($_POST['email'], '@') == TRUE && empty($_POST['contact'] == FALSE)) {


            $sqlUpdate = "UPDATE student SET name = :name, father_name = :father_name, email = :email, contact = :contact WHERE id   = $sr";
            $result = $conn->prepare($sqlUpdate);
            $result->bindParam(':name', $name);
            $result->bindParam(':father_name', $father_name);
            $result->bindParam(':email', $email);
            $result->bindParam(':contact', $contact);
            $result->execute();

            if ($result) {
?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">Success! Your note was successfully updated.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
                header("location: http://localhost/php/crud_app_PDO/");
            } else {
            ?>

                // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                <div class="alert alert-info alert-dismissible fade show" role="alert">Unsuccessful! Your note was not successfully update.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php
            }
        }
    }
}

// Updation Function

function updationForm($upId, $conn)
{

    $sql = "SELECT * FROM student WHERE id = {$upId}";
    $result1 = $conn->query($sql);
    $rowno = $result1->rowCount();
    if ($rowno > 0) {
        $i = 0;
        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {

            ?>

            <div class="container mt-3">
                <h2>Submit Your Notes</h2>
                <form action="../update.php" method="post">

                    <div class="row g-3">
                        <div class="col">
                            <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
                            <label class="mx-3" for="name">Name</label>
                            <input type="text" class="m-3 form-control" value="<?php echo $row["name"]; ?>" id="name" name="name" placeholder="Name" aria-label="First name">
                        </div>

                        <div class="col">
                            <label class="mx-3" for="father-name">Father Name</label>
                            <input type="text" class="m-3 form-control" value="<?php echo $row["father_name"]; ?>" id="father-name" name="father-name" placeholder="Father Name" aria-label="Last name">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col">
                            <label class="mx-3" for="email">Email</label>
                            <input type="text" class="m-3 form-control" value="<?php echo $row["email"]; ?>" id="email" name="email" placeholder="Email" aria-label="First name">
                        </div>

                        <div class="col">
                            <label class="mx-3" for="contact">Contact Number</label>
                            <input type="number" class="m-3 form-control" value="<?php echo $row["contact"]; ?>" name="contact" id="contact" placeholder="Contact Number" aria-label="Last name">
                        </div>
                    </div>

                    <button type="submit" style="margin: 20px 0;" class="mx-3 btn btn-primary">Submit</button>
                </form>
            </div>
<?php }
    }
}






//  <!-- -------------------------------------- Form Data Handling--------------------------------------- -->




// Upated Data Saving in Database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upId = $_POST['id'];
    updateRecordDatabase($conn, $upId);
}

// Upateion Form



if (isset($_GET['id'])) {
    $upId = $_GET['id'];
    updationForm($upId, $conn);
}
?>


</body>

</html>