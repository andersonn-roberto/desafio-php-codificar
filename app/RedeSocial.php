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

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Contem os dados das redes sociais
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class RedeSocial extends Model
{
    protected $fillable = [
        'id',
        'nome'
    ];

    protected $table = 'redes_sociais';

    public function getRedesSociaisMaisUtilizadas()
    {
        return json_encode($this->select('nome', \DB::raw('COUNT(1) AS count'))->groupBy('nome')->orderBy('count', 'desc')->get());
    }
}
