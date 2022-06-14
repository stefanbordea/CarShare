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

<head>
    <script src="/js/showHidePassword.js"></script>
    
</head>

<h1>Reset password</h1>
<form method="post" id="formPassword" action="/password/reset-password" onsubmit="return validateNewPassword()">

    <input type="hidden" name="token" value="<?php $token ?>">

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" title="Minimum 8 chars, at least one letter and one number">
        <img src="/images/eye-red.png" height="20" id="eyeimg1"onmousedown="flipEyeImg(this, true)" onmouseup="flipEyeImg(this, false)">
    </div>

<!--    <div>-->
<!--        <label for="passwordConfirmation">Confirm password</label>-->
<!--        <input type="password" id="passwordConfirmation" name="passwordConfirmation" placeholder="Repeat password" required>-->
<!--    </div>-->

    <button type="submit"  onClick="validateNewPassword()">Reset password</button>
</form>

<script src="/js/pwvalidation.js"></script>