<?php


use App\Model\ScreenshotModel;

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/ScreenshotModel.php";

$screenshotModel = new ScreenshotModel();

$description = $_POST['description'];
$src = $_FILES['image'];
$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];
$src =  file_get_contents($_FILES['image']['tmp_name']);


$fileName = $_FILES['image']['name'];
$ext = explode('.',  $fileName)[1];

$screenshotModel->saveScreenshot($src, $ext, $userId, $description);

header("Refresh:0; url=/");