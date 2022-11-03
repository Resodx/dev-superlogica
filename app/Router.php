<?php

namespace App;

use Framework\Init\AbstractRouter;

class Router extends AbstractRouter
{

    protected function initRoutes()
    {
        $routes = array(
            'home' => array(
                'route' => '/',
                'controller' => 'App\\Controller\\Pages\\HomeController',
                'action' => 'actionHome'
            ),
            'ex1' => array(
                'route' => '/ex1',
                'controller' => 'App\\Controller\\Pages\\Ex1Controller',
                'action' => 'actionEx1'
            ),
            'ex2' => array(
                'route' => '/ex2',
                'controller' => 'App\\Controller\\Pages\\Ex2Controller',
                'action' => 'actionEx2'
            ),
            'ex3' => array(
                'route' => '/ex3',
                'controller' => 'App\\Controller\\Pages\\Ex3Controller',
                'action' => 'actionEx3'
            ),
            'swagger' => array(
                'route' => '/swagger',
                'controller' => 'App\\Controller\\SwaggerController',
                'action' => 'actionSwagger'
            ),
            'listAccount' => array(
                'route' => '/account/list',
                'controller' => 'App\\Controller\\Api\\AccountController',
                'model' => 'App\\Model\\Account',
                'action' => 'actionList'
            ),
            'addAccount' => array(
                'route' => '/account/add',
                'controller' => 'App\\Controller\\Api\\AccountController',
                'model' => 'App\\Model\\Account',
                'action' => 'actionAdd'
            ),
            'removeAccount' => array(
                'route' => '/account/remove',
                'controller' => 'App\\Controller\\Api\\AccountController',
                'model' => 'App\\Model\\Account',
                'action' => 'actionRemove'
            ),
            'updateAccount' => array(
                'route' => '/account/update',
                'controller' => 'App\\Controller\\Api\\AccountController',
                'model' => 'App\\Model\\Account',
                'action' => 'actionUpdate'
            ),
            'searchAccount' => array(
                'route' => '/account/search',
                'controller' => 'App\\Controller\\Api\\AccountController',
                'model' => 'App\\Model\\Account',
                'action' => 'actionSearch'
            ),
            'listUsuario' => array(
                'route' => '/usuario/list',
                'controller' => 'App\\Controller\\Api\\UsuarioController',
                'model' => 'App\\Model\\Usuario',
                'action' => 'actionList'
            ),
            'addUsuario' => array(
                'route' => '/usuario/add',
                'controller' => 'App\\Controller\\Api\\UsuarioController',
                'model' => 'App\\Model\\Usuario',
                'action' => 'actionAdd'
            ),
            'removeUsuario' => array(
                'route' => '/usuario/remove',
                'controller' => 'App\\Controller\\Api\\UsuarioController',
                'model' => 'App\\Model\\Usuario',
                'action' => 'actionRemove'
            ),
            'updateUsuario' => array(
                'route' => '/usuario/update',
                'controller' => 'App\\Controller\\Api\\UsuarioController',
                'model' => 'App\\Model\\Usuario',
                'action' => 'actionUpdate'
            ),
            'searchUsuario' => array(
                'route' => '/usuario/search',
                'controller' => 'App\\Controller\\Api\\UsuarioController',
                'model' => 'App\\Model\\Usuario',
                'action' => 'actionSearch'
            ),
            'listInfo' => array(
                'route' => '/info/list',
                'controller' => 'App\\Controller\\Api\\InfoController',
                'model' => 'App\\Model\\Info',
                'action' => 'actionList'
            ),
            'addInfo' => array(
                'route' => '/info/add',
                'controller' => 'App\\Controller\\Api\\InfoController',
                'model' => 'App\\Model\\Info',
                'action' => 'actionAdd'
            ),
            'removeInfo' => array(
                'route' => '/info/remove',
                'controller' => 'App\\Controller\\Api\\InfoController',
                'model' => 'App\\Model\\Info',
                'action' => 'actionRemove'
            ),
            'updateInfo' => array(
                'route' => '/info/update',
                'controller' => 'App\\Controller\\Api\\InfoController',
                'model' => 'App\\Model\\Info',
                'action' => 'actionUpdate'
            ),
            'searchInfo' => array(
                'route' => '/info/search',
                'controller' => 'App\\Controller\\Api\\InfoController',
                'model' => 'App\\Model\\Info',
                'action' => 'actionSearch'
            ),
        );

        $this->setRoutes($routes);
    }
}
