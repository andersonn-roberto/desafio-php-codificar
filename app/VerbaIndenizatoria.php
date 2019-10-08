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
 * Contem os dados das verbas indenizatórias
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class VerbaIndenizatoria extends Model
{
    protected $fillable = [
        'idDeputado',
        'dataReferencia',
        'codTipoDespesa',
        'valor',
        'descTipoDespesa'
    ];

    protected $table = 'verbas_indenizatorias';
}
