<?php


namespace app\controllers;

require_once ("core/Controller.php");

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "TheCodeholidc"
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }


    public function handleContact(Request $request)
    {
       $bode = $request->getBody();
        return 'Handling submitted data';
    }
}