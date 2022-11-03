<?php

namespace App\Controller\Pages;

use Exception;
use Framework\MVC\Controller\AbstractControllerPage;
use App\Model\Usuario;
use App\Model\Info;

class Ex3Controller extends AbstractControllerPage
{
    public function actionEx3()
    {
        try {

            $usuario = new Usuario();
            $info = new Info();

            $usuarios = $usuario->all();
            $this->view->allUsuarios = $usuarios;

            $infos = $info->all();
            $this->view->allInfos = $infos;

            $usuarios = $usuario->customQuery(
                "SELECT 
                    CONCAT({$usuario->table}.nome, ' - ', {$info->table}.genero) AS usuario,
                    IF(YEAR(CURDATE()) - {$info->table}.ano_nascimento > 50, 'SIM', 'NÃO') AS maior_50_anos
                FROM {$usuario->table}
                INNER JOIN {$info->table} ON {$usuario->table}.cpf = {$info->table}.cpf
                WHERE {$info->table}.genero = 'M'
                    AND {$usuario->table}.id IN (1, 4, 6)
                ORDER BY {$usuario->table}.nome DESC"
            );
            $this->view->selectedUsuarios = $usuarios;

            $this->render('../app/View/ex3.phtml', '../app/View/layout_default.phtml');
        } catch (Exception $e) {
            $this->view->message = $e->getMessage();
            $this->render('', '../app/View/layout_default.phtml');
        }
    }
}
