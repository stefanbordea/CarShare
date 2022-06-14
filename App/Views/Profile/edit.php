<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

if (!empty($user->errors)) {
    echo "<p class='login-title'>Errors:</p>";
    echo "<ul class='login-title'>";
    foreach ($user->errors as $error) {

        echo "<li class='login-title'>$error</li>";
    }
    echo "</ul>";
}

?>

<h1 class="login-title">Change Password</h1>

<section>
    <div class="container mt-5 pt-5" onsubmit="return validateNewPassword()">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-6 m-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        <form action="/profile/updatePassword" method="post">
                            <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="New Password" title="Minimum 8 chars, at least one letter and one number"/>
                            <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="form-control my-4 py-2" placeholder="Repeat password"  required/>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary" onClick="validateNewPassword()">Save</button>
                                <br>
                                <br>
                                <a href="profile">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require '../App/Views/common/footer.php';
?>
<script src="/js/pwvalidation.js"></script>
</html>