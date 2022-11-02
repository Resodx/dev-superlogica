<?php

namespace App;

use Framework\Database\AbstractConnection;

class Connection extends AbstractConnection
{

    protected function loadConfig()
    {
        return [
            'host' => 'mariadb',
            'port' => '3306',
            'driver' => 'mysql',
            'database' => 'superlogica',
            'username' => 'superlogica',
            'password' => 'superlogica',
        ];
    }
}
