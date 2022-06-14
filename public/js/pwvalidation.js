
function validateNewPassword() {
    let password = document.getElementById("password").value;
    let passwordConfirmation = document.getElementById("passwordConfirmation").value;
    if (password.length < 8) {
        alert("Password should have length 8 or greater");
        return false;
    } else if (!/\d+/.test(password)) {
        alert("Password should have at least one number");
        return false;
    } else if (!/[a-zA-z]/.test(password)) {
        alert("Password should have at least one letter");
        return false;
    } else {
        if(password === passwordConfirmation){
        return true;
        }
    }
}

