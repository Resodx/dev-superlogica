<?php

namespace App\Controller\Pages;

use Framework\MVC\Controller\AbstractControllerPage;

class Ex1Controller extends AbstractControllerPage
{
    public function actionEx1()
    {
        try {
            $this->render('../app/View/ex1.phtml', '../app/View/layout_default.phtml');
        } catch (\Exception $e) {
            $this->view->message = $e->getMessage();
            $this->render('', '../app/View/layout_default.phtml');
        }
    }
}
