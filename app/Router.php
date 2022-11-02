<?php

namespace App;

use Framework\Init\AbstractRouter;

class Router extends AbstractRouter
{

    protected function initRoutes()
    {
        $routes = array(
            'swagger' => array(
                'route' => '/swagger',
                'controller' => 'App\\Controller\\SwaggerController',
                'action' => 'actionSwagger'
            ),
            'listCategory' => array(
                'route' => '/category/list',
                'controller' => 'App\\Controller\\Categories\\CategoryController',
                'model' => 'App\\Model\\Category',
                'action' => 'actionList'
            ),
            'addCategory' => array(
                'route' => '/category/add',
                'controller' => 'App\\Controller\\Categories\\CategoryController',
                'model' => 'App\\Model\\Category',
                'action' => 'actionAdd'
            ),
            'removeCategory' => array(
                'route' => '/category/remove',
                'controller' => 'App\\Controller\\Categories\\CategoryController',
                'model' => 'App\\Model\\Category',
                'action' => 'actionRemove'
            ),
            'updateCategory' => array(
                'route' => '/category/update',
                'controller' => 'App\\Controller\\Categories\\CategoryController',
                'model' => 'App\\Model\\Category',
                'action' => 'actionUpdate'
            ),
            'searchCategory' => array(
                'route' => '/category/search',
                'controller' => 'App\\Controller\\Categories\\CategoryController',
                'model' => 'App\\Model\\Category',
                'action' => 'actionSearch'
            ),
            'listUser' => array(
                'route' => '/user/list',
                'controller' => 'App\\Controller\\UserController',
                'model' => 'App\\Model\\User',
                'action' => 'actionList'
            ),
            'addUser' => array(
                'route' => '/user/add',
                'controller' => 'App\\Controller\\UserController',
                'model' => 'App\\Model\\User',
                'action' => 'actionAdd'
            ),
            'removeUser' => array(
                'route' => '/user/remove',
                'controller' => 'App\\Controller\\UserController',
                'model' => 'App\\Model\\User',
                'action' => 'actionRemove'
            ),
            'updateUser' => array(
                'route' => '/user/update',
                'controller' => 'App\\Controller\\UserController',
                'model' => 'App\\Model\\User',
                'action' => 'actionUpdate'
            ),
            'searchUser' => array(
                'route' => '/user/search',
                'controller' => 'App\\Controller\\UserController',
                'model' => 'App\\Model\\User',
                'action' => 'actionSearch'
            ),
            'ex1' => array(
                'route' => '/ex1',
                'controller' => 'App\\Controller\\Pages\\Ex1Controller',
                'action' => 'actionEx1'
            ),
        );

        $this->setRoutes($routes);
    }
}
