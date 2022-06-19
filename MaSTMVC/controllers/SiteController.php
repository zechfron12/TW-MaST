<?php


namespace app\controllers;

require_once("core/Controller.php");
require_once("core/Response.php");
require_once("core/Request.php");
require_once("models/ContactForm.php");
require_once("models/CataloguePageModel.php");
require_once("core/Stamp.php");
require_once("models/User.php");


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Stamp;
use app\models\CataloguePageModel;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    public function home()
    {
        $catalogueController = new CataloguePageModel();

        $db = Application::$app->db;

        $result = $db->executeQuery("select * from stamps order by likes limit 5");
        $stampCollection = Stamp::constructCollection($result);
        $popularStampsHTMLcode = $catalogueController->getHTMLcode($stampCollection);

        $result = $db->executeQuery("select * from users order by create_datetime limit 5");
        $usersCollection = User::constructCollection($result);
        $newUsersHTMLcode = User::getCollectionHTMLCode($usersCollection);
    
        $result = $db->executeQuery("select * from users order by stamps_owned limit 5");
        $usersCollection = User::constructCollection($result);
        $activeUsersHTMLcode = User::getCollectionHTMLCode($usersCollection);

        $params = [
            'name' => "Radu",
            'popularStamps' => $popularStampsHTMLcode,
            'newUsers' => $newUsersHTMLcode,
            'activeUsers' => $activeUsersHTMLcode

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
        $stampsHTMLcode = "";
        if(count($request->getBody())>0){

            if ($request->isGet()){
                $catalogueController->loadData($request->getBody());
                $query = $catalogueController->generateQuerry();
                $stampsResult = $catalogueController->generateStamps($query);
                $stampCollection = Stamp::constructCollection($stampsResult);
                $stampsHTMLcode = $catalogueController->getHTMLcode($stampCollection);
            }}else {
            $stampsResult = $catalogueController->generateStamps("SELECT * FROM stamps");
            $stampCollection = Stamp::constructCollection($stampsResult);
            $stampsHTMLcode = $catalogueController->getHTMLcode($stampCollection);

        }

        return $this->render('catalogue', [
            'resultingStamps' => $stampsHTMLcode
        ]);
    }

}
