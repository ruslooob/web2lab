<header class="header">
    <div class="header__logo"><a href="/screenshots">Shoot</a></div>
    <div class="header__buttons">
        <?php if (!isset($_SESSION['userLogin'])): ?>
            <a class="header__sign-in-btn btn" href="#">Войти</a>
            <a class="header__sign-up-btn btn" href="#">Зарегистрироваться</a>
        <?php else: ?>
            <a class="btn" href="/screenshots/show-add-form">Добавить</a>
            <a class="btn exit-btn" href="/logout">Выход</a>
        <?php endif; ?>
    </div>
</header>