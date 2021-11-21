<?php

class User
{
    private $id;
    private $login;
    private $password;
    private $email;
    private $phone;

    public function __construct(int $id, string $login, string $password, string $email, string $phone)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
    }
}