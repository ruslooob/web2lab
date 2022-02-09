<?php
require "models/UserModel.php";

header('Content-Type: application/json');

$login = $_POST['login'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$isAgreeWithPrivatePolicy = $_POST['isAgreeWithPrivatePolicy'];

echo "$login $password $repeatPassword $email $phone $isAgreeWithPrivatePolicy";

$userModel = new UserModel();

if (strlen($login) < 5 || strlen($login) > 15) {
    $errors[] = "Длина логина должна быть больше 4 и меньше 16 символов";
}

if ($userModel->getUserByLogin($login) != false) {
    $errors[] = "Пользователь с таким логином уже существует";
}

if (strlen($password) < 5 || strlen($password) > 15) {
    $errors[] = "Длина пароля должна быть больше 4 и меньше 16 символов.";
}

if (!strcmp($password, $repeatPassword) == 0) {
    $errors[] = "Пароли не совпадают!";
}

if ($isAgreeWithPrivatePolicy != 'on') {
    $errors[] = "Соглашение обязательно к принятию";
}

if (!empty($errors)) {
    echo json_encode(['errors' => $errors]);
    die();
}

$userId = $userModel->save($login, $email, $phone, $password);

if ($userId == false) {
    echo "Пользователь не сохранен!";
    die();
}

session_start();
$_SESSION["userId"] = $userModel->getUserIdByLogin($login);
$_SESSION["userLogin"] = $login;

echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);