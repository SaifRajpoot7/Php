<?php
// include('header.php');
?>

<div class="container mt-3">
    <h2>Submit Your Notes</h2>
    <form action="../update.php" method="post">

        <div class="row g-3">
            <div class="col">
                <input type="hidden" value="<?php echo $upId; ?>" name="id">
                <label class="mx-3" for="name">Name</label>
                <input type="text" class="m-3 form-control" value="" id="name" name="name" placeholder="Name" aria-label="First name">

            </div>
            <div class="col">
                <label class="mx-3" for="father-name">Father Name</label>
                <input type="text" class="m-3 form-control" value="" id="father-name" name="father-name" placeholder="Father Name" aria-label="Last name">
            </div>
        </div>

        <div class="row g-3">
            <div class="col">
                <label class="mx-3" for="email">Email</label>
                <input type="text" class="m-3 form-control" value="" id="email" name="email" placeholder="Email" aria-label="First name">
            </div>
            <div class="col">
                <label class="mx-3" for="contact">Contact Number</label>
                <input type="number" class="m-3 form-control" value="" name="contact" id="contact" placeholder="Contact Number" aria-label="Last name">
            </div>
        </div>

        <button type="submit" style="margin: 20px 0;" class="mx-3 btn btn-primary">Submit</button>
    </form>
</div>

<div class="container mt-3">
    <h2>Submit Your Notes</h2>
    <form action="../update.php" method="post">

        <div class="row g-3">
            <div class="col">
                <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
                <label class="mx-3" for="name">Name</label>
                <input type="text" class="m-3 form-control" value="<?php echo $row["name"]; ?>" id="name" name="name" placeholder="Name" aria-label="First name">
                <span><?php if (isset($name_error)) echo $name_error; ?></span>

            </div>
            <div class="col">
                <label class="mx-3" for="father-name">Father Name</label>
                <input type="text" class="m-3 form-control" value="<?php echo $row["father_name"]; ?>" id="father-name" name="father-name" placeholder="Father Name" aria-label="Last name">
                <span><?php if (isset($father_name_error)) echo $father_name_error; ?></span>

            </div>
        </div>

        <div class="row g-3">
            <div class="col">
                <label class="mx-3" for="email">Email</label>
                <input type="text" class="m-3 form-control" value="<?php echo $row["email"]; ?>" id="email" name="email" placeholder="Email" aria-label="First name">
                <span><?php if (isset($email_empty_error)) echo $email_empty_error; ?></span>
                <span><?php if (isset($email_type_error)) echo $email_type_error; ?></span>
            </div>
            <div class="col">
                <label class="mx-3" for="contact">Contact Number</label>
                <input type="number" class="m-3 form-control" value="<?php echo $row["contact"]; ?>" name="contact" id="contact" placeholder="Contact Number" aria-label="Last name">
                <span><?php if (isset($contact_error)) echo $contact_error; ?></span>

            </div>
        </div>

        <button type="submit" style="margin: 20px 0;" class="mx-3 btn btn-primary">Submit</button>
    </form>
</div>
