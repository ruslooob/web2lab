<header class="header">
    <div class="header__logo"><a href="/">Shoot</a></div>
    <div class="header__buttons">
        <?php if (!isset($_SESSION['userLogin'])): ?>
            <button class="header__sign-in-btn btn">Войти</button>
            <button class="header__sign-up-btn btn">Зарегистрироваться</button>
        <?php else: ?>
            <a class="btn" href="/resources/templates/load_file_form.php">Добавить</a>
            <a class="btn exit-btn" href="/logout.php">Выход</a>
        <?php endif; ?>
    </div>
</header>