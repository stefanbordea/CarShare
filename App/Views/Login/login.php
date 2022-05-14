<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>
<h1>Log in</h1>
<form action="/login/create" method="post">
    <div>
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" placeholder="E-mail" autofocus value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
    </div>

    <button type="submit">Log in</button>
</form>
