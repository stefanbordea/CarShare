<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>

<h1>Request password reset</h1>

<form action="/password/request-reset" method="post">
    <div>
        <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" name="email" placeholder="Email address" autofocus required>
    </div>
    <button type="submit">Reset password</button>
</form>
