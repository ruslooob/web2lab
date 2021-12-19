<?php session_start(); ?>


<?php require '../models/DbModel.php';
require "../models/ScreenshotModel.php";
//print_r($_SESSION)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Shoot</title>
</head>
<body>
<?php require "../resources/templates/modal.php" ?>
<div class="wrapper">
    <div class="container">
        <?php require "../resources/templates/header.php" ?>

        <?php $screenshots = (new ScreenshotModel())->getFirstScreenshots(); ?>
        <main class="main-content">
            <div class="cards">
                <?php foreach ($screenshots as $screenshot): ?>
                    <div class="card">
                        <a href="/public/detail.php?uuid=<?php echo $screenshot['uuid'] ?>">
                            <img src="data:image/jpeg;base64, <?php echo base64_encode($screenshot['src']) ?>"
                                 height="300px" width="250px"/>
                            <div class="card__info">
                                <span class="card__upload-date"> <?php echo $screenshot['upload_date'] ?> </span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $lastId = $screenshots[count($screenshots) - 1]['id'] ?>
            <!-- передаем id последнего прогруженного обзора -->
            <a class="btn btn-load-more"
               last-screenshot-id="<?= $lastId ?>">
                Показать еще
            </a>
            <script src="/public/js/load_more.js"></script>
        </main>
    </div>
    <?php require "../resources/templates/footer.php" ?>
</div>

<script src="/public/js/script.js"></script>
</body>