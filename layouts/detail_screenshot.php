<?php
require $_SERVER['DOCUMENT_ROOT'] . '/components/DB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/components/util.php';
$uuid = intval($_GET['uuid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Shoot</title>
</head>
<body>
<?php
$db = new DB();
$sql = <<< END
            SELECT description, upload_date, src, login, uuid
            FROM screenshot s
            LEFT JOIN user ON s.user_id = user.id
            WHERE uuid = $uuid
            
        END;
$screenshot = $db->fetch($sql);
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/layouts/sign-in-modal.php" ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/layouts/sign-up-modal.php" ?>
<div class="container">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/layouts/header.php" ?>
    <div class="detail-information">
        <img class="detail-information__poster"
             src="data:image/jpeg;base64, <?= base64_encode($screenshot['src']) ?>"
             alt="Нет фото"/>
        <h1 class="detail-information__author">Автор: <?= $screenshot['login'] ?></h1>
        <h1 class="detail-information__header"><?= $screenshot['description'] ?></h1>
        <h1><?= $screenshot['uuid'] ?></h1>
        <span class="detail-information__content">Дата загрузки: <?= $screenshot["upload_date"] ?></span>
    </div>

</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/layouts/footer.php" ?>
</body>
</html>