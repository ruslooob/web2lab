<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Service\ValidationService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends BaseController
{
    private ValidationService $validationService;
    private UserModel $userModel;


    private array $errors = [];

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->userModel = new UserModel();
        $this->validationService = new ValidationService($_POST, $this->userModel);
    }

    public function register(): Response
    {
        $this->validationService->checkRegistrationUserInput();
        $this->errors = $this->validationService->getErrors();
        if (count($this->errors) !== 0) {
            $response = new Response();
            $response->setContent(
                json_encode([
                        'status' => false,
                        'errors' => $this->errors]
                )
            )->headers->set('Content-Type', 'application/json');
            return $response;
        }

        $login = $_POST['login'];
        $email = $_POST['email'];

        $saveResult = $this->userModel->save($login, $email, $_POST['phone'], $_POST['password']);
        if ($saveResult) {
            $_SESSION['userId'] = $this->userModel->getUserIdByLogin($login);
            $_SESSION['userLogin'] = $login;
            return new Response(json_encode(['success' => true]));
        } else {
            return new Response(json_encode(['success' => false], 400));
        }

    }


}