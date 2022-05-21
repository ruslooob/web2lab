<?php

namespace App\Controller;

use App\Model\ScreenshotModel;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ScreenshotController extends BaseController
{
    private ScreenshotModel $screenshotModel;


    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->screenshotModel = new ScreenshotModel();
    }


    /**
     * @throws Exception if template not found
     */
    public function index(): Response
    {
        $firstScreenshots = $this->screenshotModel->getFirstScreenshots();
        return $this->renderTemplate("screenshots.php", ['screenshots' => [$firstScreenshots]]);
    }

    /**
     * @throws Exception if template not found
     */
    public function show($data): Response
    {
        $screenshot = $this->screenshotModel->getScreenshotByUUID($data['uuid']);
        return $this->renderTemplate("detail.php", ['screenshot' => [$screenshot]]);
    }

    /**d
     * @throws Exception if template not found
     */
    public function showAddForm(): Response
    {
        return $this->renderTemplate("add_screenshot_form.php", []);
    }

    public function add(): Response
    {
        $description = $_POST['description'];
        $userId = $_SESSION['userId'];
        $src = file_get_contents($_FILES['image']['tmp_name']);

        $fileName = $_FILES['image']['name'];
        $ext = explode('.', $fileName)[1];

        $this->screenshotModel->saveScreenshot($src, $ext, $userId, $description);

        return new Response(json_encode(['success' => true]));
    }
}