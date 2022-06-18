<?php


namespace app\controllers;

require_once("core/Controller.php");
require_once("core/Response.php");
require_once("core/Request.php");
require_once("models/ContactForm.php");
require_once("models/CataloguePageModel.php");

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\CataloguePageModel;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Radu"
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect("/" . basename(Application::$ROOT_DIR) . "/index.php/");
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
    public function catalogue(Request $request, Response $response)
    {
        $catalogueController = new CataloguePageModel();
        if ($request->isPost()){
            $catalogueController->loadData($request->getBody());

        }
        $resultingStamps = 'Am sa te schimb mai incolo';
        return $this->render('catalogue', [
                'resultingStamps' => $resultingStamps
        ]);
    }

}
