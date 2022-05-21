<?php

use Model\ScreenshotModel;

require $_SERVER['DOCUMENT_ROOT'] . '/Model/ScreenshotModel.php';
$offset = $_GET['offset'];

$screenshots = (new ScreenshotModel())->getScreenshotsByOffset($offset);
?>

<?php foreach ($screenshots as $screenshot): ?>
    <div class="card">
        <a class="card__link" href="/src/php_scriptstail.php?uuid=<?= $screenshot['uuid'] ?>">
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


