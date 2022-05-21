<?php
/** @var  $params array */
$screenshots = $params['screenshots'][0];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Shoot</title>
</head>
<body>
<?php require "views/modal.php" ?>
<div class="wrapper">
    <div class="container">
        <?php require "views/header.php" ?>

        <main class="main-content">
            <div class="cards">
                <?php foreach ($screenshots as $screenshot): ?>
                    <div class="card">
                        <a href="/screenshots/screenshot/<?= $screenshot['uuid'] ?>">
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
            <script src="js/load_more.js"></script>
        </main>
    </div>
    <?php require "views/footer.php" ?>
</div>

<script src="js/script.js"></script>
</body>