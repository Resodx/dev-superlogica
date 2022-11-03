<?php

use App\Model\Usuario;

test("assert model connection", function () {
    $usuario = new Usuario();
    $this->assertInstanceOf(\PDO::class, $usuario->conn->getConn());
});

test("assert Usuario table exists", function () {
    $usuario = new Usuario();
    $this->assertTrue($usuario->newQuery()->newQuery()->prepare("select 1 from " . $usuario->table)->execute());
});


test("assert usuario/list request", function () {

    $return = json_decode(sendRequest("GET", "usuario/list"), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert usuario/add request", function () {
    $postfields = [
        "nome" => "usertest",
        "cpf" => "16798125050"
    ];

    $return = json_decode(sendRequest("POST", "usuario/add", $postfields), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert usuario/update request", function () {
    $params = [
        "id" => "7"
    ];
    $postfields = [
        "nome" => " new usertest",
        "cpf" => "16798125050"
    ];
    $return = json_decode(sendRequest("PUT", "usuario/update", $postfields, $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert usuario/search request", function () {
    $params = [
        "id" => "7"
    ];
    $return = json_decode(sendRequest("GET", "usuario/search", array(), $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert usuario/remove request", function () {
    $params = [
        "id" => "7"
    ];
    $return = json_decode(sendRequest("DELETE", "usuario/remove", array(), $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});
