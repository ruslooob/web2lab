<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Shoot</title>
</head>
<body>

<div class="wrapper">
    <div class="container">
        <?php require_once "views/header.php" ?>
        <div class="container">
            <form class="create-screenshot-form" enctype="multipart/form-data" action="/screenshots/add" method="POST">
                <label>
                    Введите описание
                    <input type="text" name="description">
                </label>
                <input type="hidden" name="MAX_FILE_SIZE" value="13000000" />
                <input name="image" type="file">
                <input type="submit" name="submit" class="btn btn-create-screenshot">
            </form>
        </div>
    </div>
</div>
<script src="../js/add_screenshot.js"></script>
</body>
</html>
