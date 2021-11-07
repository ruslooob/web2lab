document.addEventListener("DOMContentLoaded", function () {
    var signIn = document.querySelector(".sign-in");
    var signInBtn = document.querySelector(".header__sign-in-btn");
    var closeSignInBtn = document.querySelector(".sign-in__close");

    signInBtn.onclick = function () {
        signIn.style.display = "block";
    }

    closeSignInBtn.onclick = function () {
        signIn.style.display = "none";
    }

    var signUp = document.querySelector(".sign-up");
    var signUnBtn = document.querySelector(".header__sign-up-btn");
    var closeSignUpBtn = document.querySelector(".sign-up__close");

    signUnBtn.onclick = function () {
        signUp.style.display = "block";
    }

    closeSignUpBtn.onclick = function () {
        signUp.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == signIn) {
            signIn.style.display = "none";
        } else if (event.target == signUp) {
            signUp.style.display = "none";
        }

    }
});