function flipEyeImg(obj, flag) {
    if (flag) {
        obj.src = "/images/eye-green.png";
        document.getElementById("password").type = "text";
        document.getElementById("passwordConfirmation").type = "text";
    } else {
        obj.src= "/images/eye-red.png";
        document.getElementById("password").type = "password";
        document.getElementById("passwordConfirmation").type = "password";
    }

}