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
 * Contem os detalhes das verbas indenizatórias
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class DetalheVerbaIndenizatoria extends Model
{
    protected $fillable = [
        'id',
        'idDeputado',
        'dataReferencia',
        'valorReembolsado',
        'dataEmissao',
        'cpfCnpj',
        'valorDespesa',
        'nomeEmitente',
        'descDocumento',
        'codTipoDespesa',
        'descTipoDespesa'
    ];

    protected $table = 'detalhes_verbas_indenizatorias';
}
