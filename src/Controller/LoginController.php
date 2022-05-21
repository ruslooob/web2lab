<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\UserModel;
use App\Service\ValidationService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{
    private array $errors = [];
    private ValidationService $validationService;
    private UserModel $userModel;


    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->userModel = new UserModel();
        $this->validationService = new ValidationService($_POST, $this->userModel);
    }

    public function login(): Response
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $this->validationService->checkLoginUserInput();
        $this->errors = $this->validationService->getErrors();
        if (!$this->userModel->getUserByLogin($login)) {
            $this->errors[] = "Пользователь с таким логином не найден";
        } else {
            if (!$this->userModel->getUserIfPasswordVerify($login, $password)) {
                $this->errors[] = "Пароль не верный";
            }
            return $this->getBadResponse($this->errors);
        }
        $_SESSION["userId"] = $this->userModel->getUserIdByLogin($login);
        $_SESSION["userLogin"] = $login;
        return $this->getGoodResponse(['status' => true]);
    }

    public function logout(): Response
    {
        unset($_SESSION['userId']);
        unset($_SESSION['userLogin']);
        header("Refresh:0; url=/screenshots");
        return new Response("logged out", 302);
    }
}