<?php

namespace App\Model;

use Framework\MVC\Model\AbstractModel;
use App\Connection;

class User extends AbstractModel
{

    protected function populate()
    {

        if (!$this->conn) {
            $this->conn = new Connection();
        }

        $this->table = "user";
        $this->primary_key = "id";
        $this->columns = [
            "name",
            "userName",
            "zipCode",
            "email",
            "password",
            "id"
        ];
    }
}
