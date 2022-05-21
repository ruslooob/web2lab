<?php

namespace App\Controller;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @throws Exception if template not found
     */
    protected function renderTemplate(string $view, array $params = []): Response
    {
        $viewDir = $_SERVER['DOCUMENT_ROOT'] . '/views/';
        if (!file_exists($viewDir . $view)) {
            throw new Exception("View '{$view}' not found");
        }

        ob_start();
        require_once $viewDir . $view;
        $content = ob_get_clean();
        return new Response($content);
    }

    protected function getGoodResponse($content): Response
    {
        $response = new Response();
        $response->setContent(json_encode($content))
            ->headers->set('Content-Type', 'application/json');
        return $response;
    }

    protected function getBadResponse($errors): Response
    {
        $response = new Response();
        $response->setContent(
            json_encode([
                    'status' => false,
                    'errors' => $errors]
            )
        )->headers->set('Content-Type', 'application/json');
        return $response;
    }

}