<div class="sign-in__wrapper modal__wrapper">
    <div class="sign-in modal">
        <span class="sign-in__close modal__close">&times;</span>
        <div class="sign-in__content">
            <div class="title">Вход</div>
            <form class="sign-in__form" action="#" method="POST">
                <input class="sign-in__login" type="text" placeholder="Логин"
                       minlength="5" maxlength="15" pattern="[a-zA-Z]{5,15}" required>
                <input class="sign-in__password" type="password" placeholder="Пароль"
                       minlength="5" maxlength="15" pattern="[a-zA-Z0-9_]{5,15}" required>
                <button class="sign-in-btn btn" type="submit">Войти</button>
            </form>
        </div>
    </div>
</div>