<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// uses(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function sendRequest($method, $endpoint, $post_fields = null, $params = null) {

    
    if ($params) {
        $params = array_merge(
            [],
            $params
        );
    } else {
        $params = [];
    }
    
    $ch = curl_init();
    
    $url = "http://webserver/" . $endpoint . "?" . http_build_query($params);

    $httpheader = [
        "Content-Type: application/json",
    ];

    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL            => $url,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_HTTPHEADER => $httpheader,
            CURLOPT_POSTFIELDS => json_encode($post_fields) ? json_encode($post_fields) : null,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        )
    );

    $retorno = curl_exec($ch);

    if (curl_errno($ch) !== 0) {
        throw new Exception(curl_error($ch));
    }

    if (json_last_error() !== 0) {
        throw new Exception("Erro ao decodificar resposta.");
    }

    curl_close($ch);

    return $retorno;
}
