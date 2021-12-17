<?php
require $_SERVER['DOCUMENT_ROOT'] . '/models/ScreenshotModel.php';
$offset = $_GET['offset'];

$screenshotModel = new ScreenshotModel();
$screenshots = $screenshotModel->getScreenshotsByOffset($offset);
?>

<?php foreach ($screenshots as $screenshot): ?>
    <div class="card">
        <a class="card__link" href="/public/detail.php?uuid=<?= $screenshot['uuid'] ?>">
            <img src="data:image/jpeg;base64, <?= base64_encode($screenshot['src']) ?>"
                 class="img-<?= $screenshot['id'] ?>"
                 alt="Нет фото"/>
            <div class="card__info">
                <div class="card__second-row">
                    <span class="card__upload-date"><?= $screenshot['upload_date'] ?></span>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>


