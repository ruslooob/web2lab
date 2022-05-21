<?php

namespace App\Service;

use App\Model\UserModel;

class ValidationService
{
    private array $errors = [];
    private string $loginPattern = "[a-zA-Z0-9]{5,15}";
    private string $passwordPattern = "[a-zA-Z0-9_]{5,15}";
    private string $emailPattern = "/^([a-z\d+_\-]+)(\.[a-z\d+_\-]+)*@([a-z\d\-]+\.)+[a-z]{2,6}$/ix";

    private array $userInput;
    private UserModel $userModel;


    public function __construct(array $userInput, UserModel $userModel)
    {
        $this->userInput = $userInput;
        $this->userModel = $userModel;
    }

    public function checkRegistrationUserInput(): void
    {
        $this->checkLogin($this->userInput['login']);
        $this->checkPassword($this->userInput['password']);
        $this->checkSecondPassword($this->userInput['password'], $this->userInput['repeatPassword']);
        $this->checkEmail($this->userInput['email']);
        $this->checkPhone($this->userInput['phone']);
        $this->checkAgreeWithPolicy($this->userInput['isAgreeWithPrivatePolicy']);
    }

    public function checkLoginUserInput() : void
    {
        $this->checkLogin($this->userInput['login']);
        $this->checkPassword($this->userInput['password']);
    }

    private function checkLogin(string $login): void
    {
        if (strlen($login) < 5 || strlen($login) > 15) {
            $this->errors[] = "Длина логина должна быть больше 4 и меньше 16 символов";
        }

        if (!$this->userModel->isLoginFree($login)) {
            $this->errors[] = "Этот логин уже занят, попробуйте выполнить вход";
        }

//        if (!preg_match($this->loginPattern, $login)) {
//            $this->errors[] = "Введен невалидный логин!";
//        }
    }

    private function checkPassword(string $password): void
    {
        if (strlen($password) < 5 || strlen($password) > 15) {
            $this->errors[] = "Длина пароля должна быть больше 4 и меньше 16 символов";
        }
//        if (!preg_match($this->passwordPattern, $password)) {
//            $this->errors[] = "Введен невалидный пароль!";
//        }
    }

    private function checkSecondPassword(string $firstPassword, string $secondPassword): void
    {
        if (strcmp($firstPassword, $secondPassword) !== 0) {
            $this->errors[] = "Пароли не совпадают";
        }
        if (strlen($secondPassword) < 5 || strlen($secondPassword) > 15) {
            $this->errors[] = "Длина пароля должна быть больше 4 и меньше 16 символов";
        }
    }

    private function checkEmail(string $email): void
    {
        if (strlen($email) < 4 || strlen($email) > 25) {
            $this->errors[] = "Длина емейл-адреса должна быть в пределах от 4 до 25 символов!";
        }
        if (!$this->userModel->isEmailFree($email)) {
            $this->errors[] = "Этот адрес почты уже занят, попробуйте выполнить вход";
        }
//        if (!preg_match($this->emailPattern, $email)) {
//            $this->errors[] = "Введен невалидный емейл!";
//        }
    }

    private function checkPhone(string $phone): void
    {
        if (strlen($phone) !== 0 && strlen($phone) !== 6 && strlen($phone) !== 11) {
            $this->errors[] = "Телефонный номер может состоять только из 11 символов!";
        }
        if (!$this->userModel->isPhoneFree($phone)) {
            $this->errors[] = "Пользователь с этим номером телефона уже зарегистрирован";
        }

    }

    private function checkAgreeWithPolicy(string $agreeWithPrivatePolicy): void
    {
        if ($agreeWithPrivatePolicy != 'on') {
            $this->errors[] = "Соглашение обязательно к принятию";
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}