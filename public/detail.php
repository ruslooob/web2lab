<?php /* Детальная страница скриншота */ ?>

<?php
require '../models/ScreenshotModel.php';
$uuid = intval($_GET['uuid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Shoot</title>
</head>
<body>
<?php
$screenshotModel = new ScreenshotModel();
$screenshot = $screenshotModel->getScreenshotByUUID($uuid);
?>
<?php require "../resources/templates/modal.php" ?>

<div class="container">
    <?php require "../resources/templates/header.php" ?>
    <div class="detail-information">
        <img class="detail-information__poster"
             src="data:image/jpeg;base64, <?= base64_encode($screenshot['src']) ?>"
             alt="Нет фото"/>
        <h1 class="detail-information__author">Автор: <?= $screenshot['login'] ?></h1>
        <h1 class="detail-information__header"><?= $screenshot['description'] ?></h1>
        <span class="detail-information__content">Дата загрузки: <?= $screenshot["upload_date"] ?></span>
    </div>

</div>
<?php require "../resources/templates/footer.php" ?>
<script src="/public/js/script.js"></script>
</body>
</html>
