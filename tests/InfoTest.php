<?php

use App\Model\Info;

test("assert model connection", function () {
    $info = new Info();
    $this->assertInstanceOf(\PDO::class, $info->conn->getConn());
});

test("assert Info table exists", function () {
    $info = new Info();
    $this->assertTrue($info->newQuery()->newQuery()->prepare("select 1 from " . $info->table)->execute());
});


test("assert info/list request", function () {

    $return = json_decode(sendRequest("GET", "info/list"), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert info/add request", function () {
    $postfields = [
        "cpf" => "16798125050",
        "genero" => "M",
        "ano_nascimento" => "1997"
    ];

    $return = json_decode(sendRequest("POST", "info/add", $postfields), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert info/update request", function () {
    $params = [
        "id" => "7"
    ];
    $postfields = [
        "cpf" => "16798125050",
        "genero" => "M",
        "ano_nascimento" => "1997"
    ];
    $return = json_decode(sendRequest("PUT", "info/update", $postfields, $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert info/search request", function () {
    $params = [
        "id" => "7"
    ];
    $return = json_decode(sendRequest("GET", "info/search", array(), $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert info/remove request", function () {
    $params = [
        "id" => "7"
    ];
    $return = json_decode(sendRequest("DELETE", "info/remove", array(), $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});
