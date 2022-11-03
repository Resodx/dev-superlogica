<?php

namespace App\Model;

use Framework\MVC\Model\AbstractModel;
use App\Connection;

class Info extends AbstractModel
{

    protected function populate()
    {

        if (!$this->conn) {
            $this->conn = new Connection();
        }

        $this->table = "info";
        $this->primary_key = "id";
        $this->columns = [
            "cpf",
            "genero",
            "ano_nascimento",
            "id",
        ];
    }
}
