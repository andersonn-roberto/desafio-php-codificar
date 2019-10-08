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
 * Contem os dados dos deputados
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class Deputado extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'partido',
        'tagLocalizacao'
    ];
}
