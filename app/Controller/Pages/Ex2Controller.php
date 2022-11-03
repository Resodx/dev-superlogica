<?php

namespace App\Controller\Pages;

use Framework\MVC\Controller\AbstractControllerPage;

class Ex2Controller extends AbstractControllerPage
{
    public function actionEx2()
    {
        try {
            //1. Crie um array
            $array = array();

            $this->view->q1 = print_r($array, true);

            //2. Popule este array com 7 números
            $array = array_map(
                function () {
                    return rand(0, 100);
                },
                array_fill(0, 7, null)
            );

            $this->view->q2 = print_r($array, true);
            //3. Imprima o número da posição 3 do array
            $this->view->q3 = print_r("Número na posição 3: " . $array[3], true);
            //4. Crie uma variável com todas as posições do array no formato de string separado por vírgula
            $number_string = implode(", ", $array);
            $this->view->q4 = "Array to string: " . $number_string;
            //5. Crie um novo array a partir da variável no formato de string que foi criada e destrua o array anterior
            $new_array = explode(", ", $number_string);
            unset($array);
            $this->view->q5 = "";
            if (!isset($array)) {
                $this->view->q5 = "Array antigo foi destruído <br>";
            }
            $this->view->q5 .= "Array novo: " . print_r($new_array, true);
            //6. Crie uma condição para verificar se existe o valor 14 no array
            if (in_array(14, $new_array)) {
                $this->view->q6 = "O número 14 existe no array";
            } else {
                $this->view->q6 = "O número 14 não existe no array";
            }
            //7. Faça uma busca em cada posição. Se o número da posição atual for menor que o da posição anterior (valor anterior que não foi excluído do array ainda), exclua esta posição
            $this->view->q7 = $this->removeLowerNumbers($new_array);
            //8. Remova a última posição deste array
            array_pop($new_array);
            $this->view->q8 = print_r($new_array, true);
            //9. Conte quantos elementos tem neste array
            $this->view->q9 = "O array tem " . count($new_array) . " elementos";
            //10. Inverta as posições deste array
            $this->view->q10 = print_r(array_reverse($new_array), true);

            $this->render('../app/View/ex2.phtml', '../app/View/layout_default.phtml');
        } catch (\Exception $e) {
            $this->view->message = $e->getMessage();
            $this->render('', '../app/View/layout_default.phtml');
        }
    }

    private static function removeLowerNumbers(&$array)
    {
        $resposta = "";
        $count_array = count($array);
        for ($index1 = 0; $index1 < $count_array; $index1++) {
            $index2 = $index1;
            for ($index2 = $index1 + 1; $index2 < $count_array; $index2++) {
                $resposta .= "Comparando " . $array[$index1] . " com " . $array[$index2] . "<br>";
                if ($array[$index1] < $array[$index2]) {
                    $resposta .= "Removendo o número " . $array[$index1] . " por ser ser menor que o número " . $array[$index2] . "<br>";
                    unset($array[$index1]);
                    $array = array_values($array);
                    $count_array = count($array);
                    $index2 = $index1;
                }
            }
        }
        return $resposta . print_r($array, true);
    }
}
