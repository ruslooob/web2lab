<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Shoot</title>
</head>
<body>

<div class="wrapper">
    <div class="container">
        <?php require_once "../templates/header.php" ?>
        <div class="container">
            <form class="create-screenshot" enctype="multipart/form-data" action="/resources/scripts/add_screenshot.php" method="POST">
                <label>
                    Введите описание
                    <input type="text" name="description">
                </label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1300000" />
                <input name="image" type="file">
                <input type="submit" name="submit">
            </form>
        </div>
    </div>
</div>

</body>
</html>
