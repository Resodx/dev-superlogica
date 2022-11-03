<?php

namespace App\Controller\Pages;

use Framework\MVC\Controller\AbstractControllerPage;

class HomeController extends AbstractControllerPage
{
    public function actionHome()
    {
        try {
            $this->render('../app/View/home.phtml', '../app/View/layout_default.phtml');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
