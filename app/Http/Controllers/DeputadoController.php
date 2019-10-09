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

namespace App\Http\Controllers;

use App\RedeSocial;
use App\VerbaIndenizatoria;

/**
 * Responde às solicitações de dados por parte dos usuários
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class DeputadoController extends Controller
{
    /**
     * Retorna o ranking das redes sociais mais utilizadas
     *
     * @return mixed
     */
    public function getRedesSociaisMaisUtilizadas()
    {
        return (new RedeSocial())->getRedesSociaisMaisUtilizadas();
    }

    /**
     * Retorna os deputados que solicitaram mais pedidos de reembolso de verbas indenizatórias
     *
     * @return mixed
     */
    public function getDeputadosMaioresReembolsos()
    {
        return (new VerbaIndenizatoria())->getDeputadosMaioresReembolsos();
    }
}
