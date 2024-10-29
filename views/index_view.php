<?php
include('header.php');
?>
<div class="container mt-3">
    <h2>Submit Your Notes</h2>
    <form action="index.php" method="post">

        <div class="row g-3">
            <div class="col">
                <label class="mx-3" for="name">Name</label>
                <input type="text" class="m-3 form-control" id="name" name="name" placeholder="Name" aria-label="First name">
            </div>

            <div class="col">
                <label class="mx-3" for="father-name">Father Name</label>
                <input type="text" class="m-3 form-control" id="father-name" name="father-name" placeholder="Father Name" aria-label="Last name">
            </div>
        </div>

        <div class="row g-3">
            <div class="col">
                <label class="mx-3" for="email">Email</label>
                <input type="text" class="m-3 form-control" id="email" name="email" placeholder="Email" aria-label="First name">
            </div>

            <div class="col">
                <label class="mx-3" for="contact">Contact Number</label>
                <input type="number" class="m-3 form-control" name="contact" id="contact" placeholder="Contact Number" aria-label="Last name">
            </div>
        </div>
        <button type="submit" style="margin: 20px 0;" class="mx-3 btn btn-primary">Submit</button>
    </form>
</div>

<div class="container">
    <table class="table">
        <h2>All Notes</h2>

        <thead>
            <tr>
                <th scope="col">Sr.</th>
                <th scope="col">Name</th>
                <th scope="col">Father Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Reading From Database 

            if (count($data) > 0) {
                foreach($data as $row) {

            ?>
                    <tr>
                        <th style="padding: 25px 0;" scope="row"> <?php $i ?></th>
                        <td style="padding: 25px 0;"><?php echo $row["name"] ?></td>
                        <td style="padding: 25px 0;"><?php echo $row["father_name"] ?></td>
                        <td style="padding: 25px 0;"><?php echo $row["email"] ?></td>
                        <td style="padding: 25px 0;"><?php echo $row["contact"] ?></td>
                        <td><a style="margin: 20px 0;" class="btn btn-primary" id="update" href="update.php/?id=<?php echo $row["id"] ?>">Update</a>
                        <form action="index.php" method="post">
                            <input type="hidden" value="<?php echo $row["id"] ?>" name="delete">
                            <button type="submit" class="btn btn-primary">Delete</button>
    </form>
                        </form>
                            
                        </td>
                    </tr>
            <?php
                    $upId = $row["id"];
                }
            }


            ?>
        </tbody>
    </table>
</div>
</body>

</html>