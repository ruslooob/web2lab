document.addEventListener("DOMContentLoaded", function () {
    // навешивание событий на модальные окна
    const signInWrapper = document.querySelector(".sign-in__wrapper");
    const signInBtn = document.querySelector(".header__sign-in-btn");
    const closeSignInBtn = document.querySelector(".sign-in__close");


    signInBtn.onclick = () => signInWrapper.style.display = "block";
    closeSignInBtn.onclick = () => signInWrapper.style.display = "none";

    const signUpWrapper = document.querySelector(".sign-up__wrapper");
    const signUpBtn = document.querySelector(".header__sign-up-btn");
    const closeSignUpBtn = document.querySelector(".sign-up__close");


    signUpBtn.onclick = () => signUpWrapper.style.display = "block";
    closeSignUpBtn.onclick = () => signUpWrapper.style.display = "none";

    // добавление эффектов, при наведеении на карточку
    const ACCENT_COLOR = "#f8e596";


    for (let card of document.querySelectorAll(".card")) {
        card.addEventListener("mouseover", () => card.querySelector(".card__info").style.color = ACCENT_COLOR);
    }

    for (let card of document.querySelectorAll(".card")) {
        card.addEventListener("mouseout", () => card.querySelector(".card__info").style.color = "white");
    }

    const signUpLogin = docGet(".sign-up__login");
    const signUpPassword = docGet(".sign-up__password");
    const signUpRepeatPassword = docGet(".sign-up__repeat-password");
    const signUpEmail = docGet(".sign-up__email");
    const signUpPhone = docGet(".sign-up__phone");


    signUpLogin.addEventListener("input", function (e) {
        const _this = e.target;
        const validity = _this.validity;

        if (validity.valueMissing) {
            _this.setCustomValidity("Поле обязательно для заполнения");
        } else if (validity.tooLong) {
            _this.setCustomValidity("Введенное значение должно содержать меньше 15 символов");
        } else if (validity.tooShort) {
            _this.setCustomValidity("Введенной значение должно содержать минимум 5 символов");
        } else if (validity.patternMismatch) {
            _this.setCustomValidity("Неверный формат ввода. Доступны только английские буквы.")
        } else {
            _this.setCustomValidity("");
        }

    });

    signUpPassword.addEventListener("input", function (e) {
        const _this = e.target;
        const validity = _this.validity;

        if (validity.valueMissing) {
            _this.setCustomValidity("Поле обязательно для заполнения");
        } else if (validity.tooLong) {
            _this.setCustomValidity("Введенное значение должно содержать меньше 15 символов");
        } else if (validity.tooShort) {
            _this.setCustomValidity("Введенной значение должно содержать минимум 5 символов");
        } else if (validity.patternMismatch) {
            _this.setCustomValidity("Неверный формат ввода. Доступны только английские буквы, цифры и знак _")
            // на случай, если второй пароль был введен раньше, чем первый
        } /*else if ((signUpRepeatPassword.value !== undefined || signUpPassword.value !== null) && _this.value !== signUpRepeatPassword.value) {
             _this.setCustomValidity("Пароли не совпадают");
         } */
        else {
            _this.setCustomValidity("");
        }
    });

    signUpRepeatPassword.addEventListener("input", function (e) {
        const _this = e.target;
        const validity = _this.validity;

        if (validity.valueMissing) {
            _this.setCustomValidity("Поле обязательно для заполнения");
        } else if (validity.tooLong) {
            _this.setCustomValidity("Введенное значение должно содержать меньше 15 символов");
        } else if (validity.tooShort) {
            _this.setCustomValidity("Введенной значение должно содержать минимум 5 символов");
        } else if (_this.value !== signUpPassword.value) {
            _this.setCustomValidity("Пароли не совпадают")
        } else if (validity.patternMismatch) {
            _this.setCustomValidity("Неверный формат ввода. Доступны только английские буквы, цифры и знак _")
        } else {
            _this.setCustomValidity("");
        }
    });

    signUpEmail.addEventListener("input", function (e) {
        const _this = e.target;
        const validity = _this.validity;
        console.log(validity);

        if (validity.valueMissing) {
            _this.setCustomValidity("Поле обязательно для заполнения");
        } else if (validity.tooLong) {
            _this.setCustomValidity("Введенное значение должно содержать меньше 15 символов");
        } else if (validity.tooShort) {
            _this.setCustomValidity("Введенной значение должно содержать минимум 4 символов");
        } else if (validity.typeMismatch) {
            _this.setCustomValidity("Введен некорректный email-адрес")
        } else {
            _this.setCustomValidity("");
        }
    });


    signUpPhone.addEventListener("input", function (e) {
        const _this = e.target;
        const validity = _this.validity;

        if (validity.valueMissing) {
            _this.setCustomValidity("Поле обязательно для заполнения");
        } else if (validity.tooLong) {
            _this.setCustomValidity("Введенное значение должно содержать меньше 11 символов");
        } else if (validity.tooShort) {
            _this.setCustomValidity("Введенной значение должно содержать минимум 3 символов");
        } else if (validity.typeMismatch) {
            _this.setCustomValidity("Введен некорректный телефон")
        } else if (validity.patternMismatch) {
            _this.setCustomValidity("Неверный формат ввода. Доступны только цифры.")
        } else {
            _this.setCustomValidity("");
        }
    });

    //

    const signInLogin = docGet(".sign-in__login");

    signInLogin.addEventListener("input", function (e) {
        const _this = e.target;
        const validity = _this.validity;

        if (validity.valueMissing) {
            _this.setCustomValidity("Поле обязательно для заполнения");
        } else if (validity.tooLong) {
            _this.setCustomValidity("Введенное значение должно содержать меньше 15 символов");
        } else if (validity.tooShort) {
            _this.setCustomValidity("Введенной значение должно содержать минимум 5 символов");
        } else if (validity.patternMismatch) {
            _this.setCustomValidity("Неверный формат ввода. Доступны только английские буквы.")
        } else {
            _this.setCustomValidity("");
        }
    });

    const signInPassword = docGet(".sign-up__password");

    signInPassword.addEventListener("input", function (e) {
        const _this = e.target;
        const validity = _this.validity;

        if (validity.valueMissing) {
            _this.setCustomValidity("Поле обязательно для заполнения");
        } else if (validity.tooLong) {
            _this.setCustomValidity("Введенное значение должно содержать меньше 15 символов");
        } else if (validity.tooShort) {
            _this.setCustomValidity("Введенной значение должно содержать минимум 5 символов");
        } else if (validity.patternMismatch) {
            _this.setCustomValidity("Неверный формат ввода. Доступны только английские буквы, цифры и знак _")
        } else {
            _this.setCustomValidity("");
        }
    });


    const signInForm = docGet(".sign-in__form");

    signInForm.addEventListener("submit", function (e) {
        console.log(signInLogin.value);
        // пароль не выводится
        console.log(signInPassword.value);
        e.preventDefault();
    })

    const signUpForm = docGet(".sign-up__form");

    signUpForm.addEventListener("submit", function (e) {
        console.log(signUpLogin.value);
        console.log(signUpPassword.value);
        console.log(signUpRepeatPassword.value);
        console.log(signUpEmail.value);
        console.log(signUpPhone.value);
        e.preventDefault();
    });

    function docGet(selector) {
        return document.querySelector(selector);
    }

});


