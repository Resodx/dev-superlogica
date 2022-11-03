<?php

namespace App\Controller\Api;

use App\Model\Info;
use Framework\MVC\Controller\AbstractControllerApi;
use OpenApi\Attributes as OAA;

class InfoController extends AbstractControllerApi
{
    #[OAA\Get(
        path: '/info/list',
        tags: ['Infos'],
    )]
    #[OAA\Response(response: 200, description: 'OK', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [
                "success" => true,
                "data" => [
                    [
                        "cpf" => "12345678912",
                        "genero" => "M",
                        "ano_nascimento" => "1997",
                        "id" => 1
                    ],
                    [
                        "cpf" => "12345678912",
                        "genero" => "M",
                        "ano_nascimento" => "1997",
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

        new Info();

        return json_encode($this->list());
    }

    #[OAA\Post(
        path: '/info/add',
        tags: ['Infos'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                "cpf" => "12345678912",
                "genero" => "M",
                "ano_nascimento" => "1997",
            ])
        ]
    )]
    #[OAA\Response(response: 201, description: 'Created', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "cpf" => "12345678912",
                        "genero" => "M",
                        "ano_nascimento" => "1997",
                        "id" => 1
                    ]
                ],
                "message" => "Info added successfully",
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
        new Info();

        return json_encode($this->add());
    }

    #[OAA\Delete(
        path: '/info/remove',
        tags: ['Infos'],
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
                "message" => "Info deleted successfully",
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

        new Info();

        return json_encode($this->remove());
    }

    #[OAA\Put(
        path: '/info/update',
        tags: ['Infos'],
    )]
    #[OAA\RequestBody(
        content: [
            new OAA\JsonContent(example: [
                [
                    "cpf" => "12345678912",
                    "genero" => "M",
                    "ano_nascimento" => "1997",
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

                        "cpf" => "12345678912",
                        "genero" => "M",
                        "ano_nascimento" => "1997",
                        "id" => 1
                    ]
                ],
                "message" => "Info updated successfully",
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
        new Info();

        return json_encode($this->update());
    }

    #[OAA\Get(
        path: '/info/search',
        tags: ['Infos'],
    )]
    #[OAA\Response(response: 200, description: 'Searched', content: [
        new OAA\MediaType(mediaType: 'application/json', example: [
            [

                "success" => true,
                "data" => [
                    [
                        "cpf" => "12345678912",
                        "genero" => "M",
                        "ano_nascimento" => "1997",
                        "id" => 1
                    ]
                ],
                "message" => "Info searched successfully",
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
        new Info();
        return json_encode($this->search());
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

    private function assertGenero($genero)
    {
        if (empty($genero)) {
            throw new Exception("Gênero não pode ser vazio");
        }
        if (strlen($genero) != 1) {
            throw new Exception("Gênero deve ter 1 caracter");
        }
        if ($genero != "M" && $genero != "F") {
            throw new Exception("Gênero deve ser M ou F");
        }
    }

    private function assertAnoNascimento($ano_nascimento)
    {
        if (empty($ano_nascimento)) {
            throw new Exception("Ano de nascimento não pode ser vazio");
        }
        if (strlen($ano_nascimento) != 4) {
            throw new Exception("Ano de nascimento deve ter 4 caracteres");
        }
        if ($ano_nascimento < 1900 || $ano_nascimento > 2022) {
            throw new Exception("Ano de nascimento deve ser entre 1900 e 2022");
        }
    }

    protected function assertAll()
    {
        $this->assertCpf($this->request['cpf']);
        $this->assertGenero($this->request['genero']);
        $this->assertAnoNascimento($this->request['ano_nascimento']);
    }
}
