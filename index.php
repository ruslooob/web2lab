<?php
require 'components/DB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<!--    <link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Shoot</title>
</head>

<body>
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
<div class="sign-up__wrapper modal__wrapper">
    <div class="sign-up modal">
        <span class="sign-up__close modal__close">&times;</span>
        <div class="sign-up__content">
            <div class="title">Регистрация</div>
            <form class="sign-up__form" action="#" method="POST">
                <input class="sign-up__login" type="text" placeholder="Логин" name="login"
                       minlength="5" maxlength="15" pattern="[a-zA-Z]{5,15}" required>
                <input class="sign-up__password" type="password" placeholder="Пароль" name="password"
                       minlength="5" maxlength="15" pattern="[a-zA-Z0-9_]{5,15}" required>
                <input class="sign-up__repeat-password" type="password" placeholder="Повторите пароль"
                       name="repeatPassword"
                       minlength="5" maxlength="15" pattern="[a-zA-Z]{5,15}" required>
                <input class="sign-up__email" type="email" placeholder="Email" name="email"
                       minlength="4" maxlength="15" pattern="[a-zA-Z_.]{2,10}@[a-zA-Z_.]{2,10}.[a-zA-Z]{2,5}" required>
                <input class="sign-up__phone" type="tel" placeholder="Телефон" name="phone"
                       minlength="11" maxlength="11" pattern="[0-9]{11}">
                <div class="checkbox__wrapper">
                    <input class="sign-up-agree" type="checkbox" name="isAgreeWithPrivatePolicy" required>
                    <span>Согласие на обработку</span>
                </div>
                <button class="sign-up-btn btn" type="submit">Зарегистрироваться</button>
            </form>

        </div>
    </div>
</div>
<div class="container">
    <?php require "layouts/header.php" ?>

    <main class="main-content">
        <?php
        $db = new DB();
        $screenshots = $db->query("SELECT * FROM screenshot");
        $base64Image = base64_encode($screenshots[0]['src']);
        ?>

                <?php foreach ($screenshots as $screenshot): ?>
                    <div class="card">
                        <a href="/screenshot/<?php echo $screenshot['uuid'] ?>">
                            <img src="data:image/jpeg;base64, <?php echo base64_encode($screenshot['src']) ?>" height="300px" width="250px" />
                            <div class="card__info" style="color: white;">
                                <span class="card__name">Photo #1</span>
                                <span class="card__upload-date"> <?php echo $screenshot['upload_date'] ?> </span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

    </main>
</div>

<?php include "layouts/footer.php" ?>

<script src="js/script.js"></script>
</body>