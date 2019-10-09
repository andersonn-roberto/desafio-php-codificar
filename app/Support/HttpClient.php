<?php
/**
 * Este arquivo faz parte do projeto para atender o desafio de PHP da Codificar Sistemas
 *
 * PHP version 7
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */

 namespace App\Support;

/**
 * Classe auxiliar para requisições HTTP
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class HttpClient
{
    /**
     * Executa uma requisição GET e retorna um JSON object
     *
     * @param string $url
     *
     * @return string
     */
    public function getJson($url)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json",
                'method'  => 'GET'
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }
}
