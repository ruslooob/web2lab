document.addEventListener("DOMContentLoaded", function () {
    var signIn = document.querySelector(".sign-in");
    var signInWrapper = document.querySelector(".sign-in__wrapper")
    var signInBtn = document.querySelector(".header__sign-in-btn");
    var closeSignInBtn = document.querySelector(".sign-in__close");

    signInBtn.onclick = function () {
        signInWrapper.style.display = "block";
    }

    closeSignInBtn.onclick = function () {
        signInWrapper.style.display = "none";
    }

    var signUp = document.querySelector(".sign-up");
    var signUpWrapper = document.querySelector(".sign-up__wrapper");
    var signUnBtn = document.querySelector(".header__sign-up-btn");
    var closeSignUpBtn = document.querySelector(".sign-up__close");

    signUnBtn.onclick = function () {
        signUpWrapper.style.display = "block";
    }

    closeSignUpBtn.onclick = function () {
        signUpWrapper.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == signIn) {
            signInWrapper.style.display = "none";
        } else if (event.target == signUp) {
            signUpWrapper.style.display = "none";
        }

    }
});