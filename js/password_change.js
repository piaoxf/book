document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("floatingPassword");
    const passwordConfirm = document.getElementById("floatingConfirmPassword");
    const passwordFeedback = document.getElementById("password-feedback");
    const passwordConfirmFeedback = document.getElementById("passwordConfrim-feedback");

    passwordInput.addEventListener("input", function () {
        const password = passwordInput.value;
        if (password.length >= 8) {
            passwordInput.classList.remove("is-invalid");
            passwordFeedback.style.display = "none";
        } else {
            passwordInput.classList.add("is-invalid");
            passwordFeedback.style.display = "block";
        }
    });
    passwordConfirm.addEventListener("input", function () {
        const password = passwordConfirm.value;
        if (password == passwordInput.value) {
            passwordConfirm.classList.remove("is-invalid");
            passwordConfirmFeedback.style.display = "none";
        } else {
            passwordConfirm.classList.add("is-invalid");
            passwordConfirmFeedback.style.display = "block";
        }
    });
});

