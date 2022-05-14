<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

if(!empty($user->errors)){
    echo "<p>Errors:</p>";
    echo "<ul>";
    foreach ($user->errors as $error){

        echo "<li>$error</li>";
    }
    echo "</ul>";
}

?>
<h1>Sign up</h1>
<form action="/signup/create" method="post">
    <div>
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" placeholder="E-mail" autofocus value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Minimum 8 chars, at least one letter and one number">
    </div>

    <div>
        <label for="passwordConfirmation">Confirm password</label>
        <input type="password" id="passwordConfirmation" name="passwordConfirmation" placeholder="Repeat password" required>
    </div>

    <button type="submit">Sign up</button>
</form>