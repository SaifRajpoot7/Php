<?php
include('header.php');
?>
<style>
    .container {
        height: 80vh;
        width: 30vw;
        justify-content: center;
        align-content: center;
    }

    input,
    label,
    button {
        margin: 5px;
    }

    .container form {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
</style>
<div class="container">
    <h2>Sign up</h2>

    <form method="post">
    <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>