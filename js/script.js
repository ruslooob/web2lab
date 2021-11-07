document.addEventListener("DOMContentLoaded", function () {
    var signInWrapper = document.querySelector(".sign-in__wrapper")
    var signInBtn = document.querySelector(".header__sign-in-btn");
    var closeSignInBtn = document.querySelector(".sign-in__close");


    signInBtn.onclick = () => signInWrapper.style.display = "block";
    closeSignInBtn.onclick = () => signInWrapper.style.display = "none";

    var signUpWrapper = document.querySelector(".sign-up__wrapper");
    var signUpBtn = document.querySelector(".header__sign-up-btn");
    var closeSignUpBtn = document.querySelector(".sign-up__close");


    signUpBtn.onclick = () => signUpWrapper.style.display = "block";
    closeSignUpBtn.onclick = () => signUpWrapper.style.display = "none";


    const ACCENT_COLOR = "#f8e596";
    

    for (let card of document.querySelectorAll(".card")) {
        card.addEventListener("mouseover", () => card.querySelector(".card__info").style.color = ACCENT_COLOR);
    }

    for (let card of document.querySelectorAll(".card")) {
        card.addEventListener("mouseout", () => card.querySelector(".card__info").style.color = "white");
    }
});