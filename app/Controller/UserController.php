<?php

namespace App\Controller;

use App\Model\User;
use Framework\MVC\Controller\AbstractControllerApi;
use OpenApi\Attributes as OAA;

class UserController extends AbstractControllerApi
{
    #[OAA\Get(
        path: '/user/list',
        tags: ['Users'],
    )]
    #[OAA\Response(response: 200, description: 'OK', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "name" => "user test",
                        "userName" => "user name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 1
                    ],
                    [
                        "name" => "user test",
                        "userName" => "user name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 2
                    ]
                ]
            ]
        ])
    ])]
    #[OAA\Response(response: 500, description: 'Internal Server Error', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [
                "success" => false,
                "code" => 500,
                "message" => "Server Error 500"
            ]
        ])
    ])]
    public function actionList()
    {

        new User();

        return json_encode($this->list());
    }

    #[OAA\Post(
        path: '/user/add',
        tags: ['Users'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                "name" => "user test",
                "userName" => "user name",
                "zipCode" => "37810000",
                "email" => "teste@teste.com",
                "password" => "1batata",
            ])
        ]
    )]
    #[OAA\Response(response: 201, description: 'Created', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "name" => "user test",
                        "userName" => "user name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 1
                    ]
                ],
                "message" => "User added successfully",
            ]
        ])
    ])]
    #[OAA\Response(response: 500, description: 'Internal Server Error', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [
                "success" => false,
                "code" => 500,
                "message" => "Server Error 500"
            ]
        ])
    ])]
    public function actionAdd()
    {

        new User();

        return json_encode($this->add());
    }

    #[OAA\Delete(
        path: '/user/remove',
        tags: ['Users'],
    )]
    #[OAA\PathParameter(
        content: [
            new OAA\JsonContent(example: [
                'id' => 1
            ])
        ]
    )]
    #[OAA\Response(response: 200, description: 'Deleted', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "message" => "User deleted successfully",
            ]
        ])
    ])]
    #[OAA\Response(response: 500, description: 'Internal Server Error', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [
                "success" => false,
                "code" => 500,
                "message" => "Server Error 500"
            ]
        ])
    ])]
    #[OAA\Parameter(name: "id", required: true, in: "query", schema: new OAA\Schema(type: 'integer'))]
    public function actionRemove()
    {

        new User();

        return json_encode($this->remove());
    }

    #[OAA\Put(
        path: '/user/update',
        tags: ['Users'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                [
                    "name" => "user test",
                    "userName" => "user name",
                    "zipCode" => "37810000",
                    "email" => "teste@teste.com",
                    "password" => "1batata",
                ]
            ])
        ]
    )]
    #[OAA\Response(response: 200, description: 'Updated', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "name" => "user test",
                        "userName" => "user name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 1
                    ]
                ],
                "message" => "User updated successfully",
            ]
        ])
    ])]
    #[OAA\Response(response: 500, description: 'Internal Server Error', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [
                "success" => false,
                "code" => 500,
                "message" => "Server Error 500"
            ]
        ])
    ])]
    #[OAA\Parameter(name: "id", required: true, in: "query", schema: new OAA\Schema(type: 'integer'))]
    public function actionUpdate()
    {

        new User();

        return json_encode($this->update());
    }

    #[OAA\Get(
        path: '/user/search',
        tags: ['Users'],
    )]
    #[OAA\Response(response: 200, description: 'Searched', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "name" => "User 1",
                        "sku" => "1234",
                        "description" => "first user",
                        "quantity" => 4,
                        "price" => "1.00",
                        "id" => 1,
                        "categories_id" => 10
                    ]
                ],
                "message" => "User searched successfully",
            ]
        ])
    ])]
    #[OAA\Response(response: 500, description: 'Internal Server Error', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [
                "success" => false,
                "code" => 500,
                "message" => "Server Error 500"
            ]
        ])
    ])]
    #[OAA\Parameter(name: "id", required: true, in: "query", schema: new OAA\Schema(type: 'integer'))]
    public function actionSearch()
    {
        new User();
        return json_encode($this->search());
    }
}
