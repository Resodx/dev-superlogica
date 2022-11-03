<?php

namespace App\Controller\Api;

use Exception;
use App\Model\Usuario;
use Framework\MVC\Controller\AbstractControllerApi;
use OpenApi\Attributes as OAA;

class UsuarioController extends AbstractControllerApi
{
    #[OAA\Get(
        path: '/usuario/list',
        tags: ['Usuarios'],
    )]
    #[OAA\Response(response: 200, description: 'OK', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "nome" => "usuario test",
                        "cpf" => "12345678912",
                        "id" => 1
                    ],
                    [
                        "nome" => "usuario test",
                        "cpf" => "12345678912",
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

        new Usuario();

        return json_encode($this->list());
    }

    #[OAA\Post(
        path: '/usuario/add',
        tags: ['Usuarios'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                "nome" => "usuario test",
                "cpf" => "12345678912",
            ])
        ]
    )]
    #[OAA\Response(response: 201, description: 'Created', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "nome" => "usuario test",
                        "cpf" => "12345678912",
                        "id" => 1
                    ]
                ],
                "message" => "Usuario added successfully",
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
        new Usuario();

        return json_encode($this->add());
    }

    #[OAA\Delete(
        path: '/usuario/remove',
        tags: ['Usuarios'],
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
                "message" => "Usuario deleted successfully",
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
    #[OAA\Parameter(nome: "id", required: true, in: "query", schema: new OAA\Schema(type: 'integer'))]
    public function actionRemove()
    {

        new Usuario();

        return json_encode($this->remove());
    }

    #[OAA\Put(
        path: '/usuario/update',
        tags: ['Usuarios'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                [
                    "nome" => "usuario test",
                    "cpf" => "12345678912",
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
                        "nome" => "usuario test",
                        "cpf" => "12345678912",
                        "id" => 1
                    ]
                ],
                "message" => "Usuario updated successfully",
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
    #[OAA\Parameter(nome: "id", required: true, in: "query", schema: new OAA\Schema(type: 'integer'))]
    public function actionUpdate()
    {

        $this->assertAll();
        new Usuario();

        return json_encode($this->update());
    }

    #[OAA\Get(
        path: '/usuario/search',
        tags: ['Usuarios'],
    )]
    #[OAA\Response(response: 200, description: 'Searched', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "nome" => "usuario test",
                        "cpf" => "12345678912",
                        "id" => 1
                    ]
                ],
                "message" => "Usuario searched successfully",
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
    #[OAA\Parameter(nome: "id", required: true, in: "query", schema: new OAA\Schema(type: 'integer'))]
    public function actionSearch()
    {
        new Usuario();
        return json_encode($this->search());
    }

    protected function assertAll()
    {
        $this->assertNome($this->request['nome']);
        $this->assertCpf($this->request['cpf']);
    }

    private function assertNome($nome)
    {
        if (empty($nome)) {
            throw new Exception("Nome não pode ser vazio");
        }
    }

    private function assertCpf($cpf)
    {
        if (empty($cpf)) {
            throw new Exception("CPF não pode ser vazio");
        }
        if (strlen($cpf) != 11) {
            throw new Exception("CPF deve ter 11 caracteres");
        }
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }

        $resto = $soma % 11;

        if ($cpf[9] != ($resto < 2 ? 0 : 11 - $resto)) {
            throw new Exception("CPF inválido");
        }

        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }

        $resto = $soma % 11;

        if ($cpf[10] != ($resto < 2 ? 0 : 11 - $resto)) {
            throw new Exception("CPF inválido");
        }
    }
}
