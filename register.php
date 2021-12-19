<?php
echo $_POST['login'] . ' ' . $_POST['password'];

function redirectIfUserLogged($user_var = 'user_id', $redirect_to = '/')
{
    session_start();

    if ($_SESSION[$user_var]) {
        header("Location: " . $redirect_to);
    }
}

function getUserIfUserLogged()
{
    session_start();

    if ($_SESSION['user_id']) {
        $user_id = (int)$_SESSION['user_id'];

        require_once "models/UserModel.php";

        $user_obj = new UserModel();
        return $user_obj->getUserById($user_id);
    }

    return false;
}

function redirectIfUserNotLogged($user_var = 'user_id', $redirect_to = '/')
{
    session_start();

    if (!$_SESSION[$user_var]) {
        header("Location: " . $redirect_to);
    }
}