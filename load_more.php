<?php
require $_SERVER['DOCUMENT_ROOT'] . '/components/DB.php';
$offset = $_GET['offset'];

$bd = new DB();
$sql = <<< EOL
        SELECT s.id, uuid, src, upload_date, description, login
        FROM screenshot s
            LEFT JOIN user u ON s.user_id = u.id
        WHERE s.id < $offset
        ORDER BY s.id DESC
        limit 9;
        EOL;
$screenshots = $bd->fetchAll($sql);
?>

<?php foreach ($screenshots as $screenshot): ?>
    <div class="card">
        <a class="card__link" href="/layouts/detail_screenshot.php?uuid=<?= $screenshot['uuid'] ?>">
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


