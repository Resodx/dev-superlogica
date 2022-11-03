<?php

use App\Model\Account;

test("assert model connection", function () {
    $account = new Account();
    $this->assertInstanceOf(\PDO::class, $account->conn->getConn());
});

test("assert Account table exists", function () {
    $account = new Account();
    $this->assertTrue($account->newQuery()->newQuery()->prepare("select 1 from " . $account->table)->execute());
});


test("assert account/list request", function () {

    $return = json_decode(sendRequest("GET", "account/list"), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert account/add request", function () {
    $postfields = [
        "name" => "Helyederson Naves",
        "userName" => "Helyederson",
        "zipCode" => "37810000",
        "email" => "helyedersonnaves@hotmail.com",
        "password" => "1batata1"
    ];

    $return = json_decode(sendRequest("POST", "account/add", $postfields), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert account/update request", function () {
    $params = [
        "id" => "1"
    ];
    $postfields = [
        "name" => "Helyederson Naves",
        "userName" => "Derso",
        "zipCode" => "37810000",
        "email" => "helyedersonnaves@hotmail.com",
        "password" => "1batata1"
    ];
    $return = json_decode(sendRequest("PUT", "account/update", $postfields, $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert account/search request", function () {
    $params = [
        "id" => "1"
    ];
    $return = json_decode(sendRequest("GET", "account/search", array(), $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});

test("assert account/remove request", function () {
    $params = [
        "id" => "1"
    ];
    $return = json_decode(sendRequest("DELETE", "account/remove", array(), $params), true);

    expect($return)->toBeArray();
    expect($return["success"])->toBeTrue();
});
