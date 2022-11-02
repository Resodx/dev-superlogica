<?php

namespace App\Model;

use Framework\MVC\Model\AbstractModel;
use App\Connection;

class Category extends AbstractModel
{

    protected function populate()
    {

        if (!$this->conn) {
            $this->conn = new Connection();
        }

        $this->table = "categories";
        $this->primary_key = "id";
        $this->columns = [
            "id",
            "name"
        ];
    }
}
