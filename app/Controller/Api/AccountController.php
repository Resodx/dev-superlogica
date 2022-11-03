<?php

namespace App\Controller\Api;

use Exception;
use App\Model\Account;
use Framework\MVC\Controller\AbstractControllerApi;
use OpenApi\Attributes as OAA;

class AccountController extends AbstractControllerApi
{
    #[OAA\Get(
        path: '/account/list',
        tags: ['Accounts'],
    )]
    #[OAA\Response(response: 200, description: 'OK', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "name" => "account test",
                        "userName" => "account name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 1
                    ],
                    [
                        "name" => "account test",
                        "userName" => "account name",
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

        new Account();

        return json_encode($this->list());
    }

    #[OAA\Post(
        path: '/account/add',
        tags: ['Accounts'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                "name" => "account test",
                "userName" => "account name",
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
                        "name" => "account test",
                        "userName" => "account name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 1
                    ]
                ],
                "message" => "Account added successfully",
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
        $this->assertAll();
        new Account();

        return json_encode($this->add());
    }

    #[OAA\Delete(
        path: '/account/remove',
        tags: ['Accounts'],
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
                "message" => "Account deleted successfully",
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

        new Account();

        return json_encode($this->remove());
    }

    #[OAA\Put(
        path: '/account/update',
        tags: ['Accounts'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                [
                    "name" => "account test",
                    "userName" => "account name",
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
                        "name" => "account test",
                        "userName" => "account name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 1
                    ]
                ],
                "message" => "Account updated successfully",
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

        $this->assertAll();
        new Account();

        return json_encode($this->update());
    }

    #[OAA\Get(
        path: '/account/search',
        tags: ['Accounts'],
    )]
    #[OAA\Response(response: 200, description: 'Searched', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "name" => "account test",
                        "userName" => "account name",
                        "zipCode" => "37810000",
                        "email" => "teste@teste.com",
                        "password" => "1batata",
                        "id" => 1
                    ]
                ],
                "message" => "Account searched successfully",
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
        new Account();
        return json_encode($this->search());
    }

    protected function assertAll()
    {
        $this->assertName($this->request['name']);
        $this->assertUserName($this->request['userName']);
        $this->assertZipCode($this->request['zipCode']);
        $this->assertEmail($this->request['email']);
        $this->assertPassword($this->request['password']);
    }

    private function assertName($name)
    {
        if (empty($name)) {
            throw new Exception("Name is required");
        }
    }

    private function assertUserName($userName)
    {
        if (empty($userName)) {
            throw new Exception("User name is required");
        }
    }

    private function assertZipCode($zipCode)
    {
        if (empty($zipCode)) {
            throw new Exception("Zip code is required");
        }
    }

    private function assertEmail($email)
    {
        if (empty($email)) {
            throw new Exception("Email is required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
    }

    private function assertPassword($password)
    {
        if (empty($password)) {
            throw new Exception("Password is required");
        }
        if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/")))) {
            throw new Exception("Invalid password format");
        }
    }
}
