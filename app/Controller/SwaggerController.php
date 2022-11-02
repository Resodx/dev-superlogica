<?php

namespace App\Controller;

use OpenApi\Attributes as OAA;

#[OAA\Info(
    version: '1.0.0',
    title: 'SuperlogicaTest API',
    attachables: [new OAA\Attachable()]
)]
#[OAA\License(name: 'MIT')]
#[OAA\Server(url: 'http://localhost')]

class SwaggerController
{
    public function actionSwagger()
    {
        try {

            $openapi = \OpenApi\Generator::scan(["../app/Controller"]);
            header('Content-Type: application/json');
            exit($openapi->toJson());
            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


}
