<?php
include('../header.php');
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
    <h2>Login</h2>

    <form>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>