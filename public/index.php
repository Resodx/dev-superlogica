<?php

require_once "../vendor/autoload.php";

use App\Router;

// $router = new Router;

try {

    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header("Access-Control-Allow-Headers: *");
    header('Access-Control-Max-Age: 86400');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $router = new Router;
} catch (Exception $e) {
    echo $e->getMessage();
} catch (Error $e) {
    echo $e->getMessage();
}
