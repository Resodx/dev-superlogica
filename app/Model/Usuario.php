<?php

namespace App\Model;

use Framework\MVC\Model\AbstractModel;
use App\Connection;

class Usuario extends AbstractModel
{

    protected function populate()
    {

        if (!$this->conn) {
            $this->conn = new Connection();
        }

        $this->table = "usuario";
        $this->primary_key = "id";
        $this->columns = [
            "nome",
            "cpf",
            "id"
        ];
    }
}
