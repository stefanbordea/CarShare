<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

if(!empty($user->errors)){
    echo "<p class='login-title'>Errors:</p>";
    echo "<ul class='login-title'>";
    foreach ($user->errors as $error){

        echo "<li class='login-title'>$error</li>";
    }
    echo "</ul>";
}

?>
<h1 class="login-title">Sign up</h1>
<!--<form action="/signup/create" method="post">-->
<!--    <div>-->
<!--        <label for="email">Email address</label>-->
<!--        <input type="email" id="email" name="email" placeholder="E-mail" autofocus value="--><?php //echo isset($_POST["email"]) ? $_POST["email"] : ''; ?><!--" required>-->
<!--    </div>-->
<!---->
<!--    <div>-->
<!--        <label for="password">Password</label>-->
<!--        <input type="password" id="password" name="password" placeholder="Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Minimum 8 chars, at least one letter and one number">-->
<!--    </div>-->
<!---->
<!--    <div>-->
<!--        <label for="passwordConfirmation">Confirm password</label>-->
<!--        <input type="password" id="passwordConfirmation" name="passwordConfirmation" placeholder="Repeat password" required>-->
<!--    </div>-->
<!---->
<!--    <button type="submit">Sign up</button>-->
<!--</form>-->

<section>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-6 m-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        <form action="/signup/create" method="post">
                            <input type="email" name="email" id="email" class="form-control my-4 py-2" placeholder="E-mail" autofocus value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required/>
                            <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Minimum 8 chars, at least one letter and one number"/>
                            <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="form-control my-4 py-2" placeholder="Repeat password"  required/>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary">Sign up</button>
                                <br>
                                <br>
                                <a href="../Login/login" class="link">Already have an account? Login!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
