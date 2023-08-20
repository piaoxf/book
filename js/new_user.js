document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const emailFeedback = document.getElementById("email-feedback");
    const passwordFeedback = document.getElementById("password-feedback");

    // emailInput.addEventListener("onsubmit", function () {
    //     const email = emailInput.value;
    //     if (validateEmail(email)) {
    //         emailInput.classList.remove("is-invalid");
    //         emailFeedback.style.display = "none";
    //     } else {
    //         emailInput.classList.add("is-invalid");
    //         emailFeedback.style.display = "block";
    //     }
    // });
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
});

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}