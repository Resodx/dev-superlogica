<?php

use App\Connection;

test('assert .env file exist and is filled out', function () {
    $this->assertFileExists(".env", "please create a .env file in root directory");
});

test('expect PDO errorInfo be empty', function () {
    $conn = new Connection();
    expect($conn->getConn()->errorInfo())->each->toBeEmpty();
});

test('assert Connection $conn is PDO::Object', function () {
    $conn = new Connection();
    $this->assertInstanceOf(\PDO::class, $conn->getConn());
});

test('assert PDO driver is MySQL', function () {
    $conn = new Connection();
    $this->assertStringContainsStringIgnoringCase('MySQL', $conn->getDsn());
});
