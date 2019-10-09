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

use App\Deputado;
use App\Support\HttpClient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Alimenta a tabela de deputados
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class DeputadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deputados')->truncate();

        $this->_createDeputados();
    }

    /**
     * Insere os deputados
     *
     * @return void
     */
    private function _createDeputados()
    {
        $client = new HttpClient();
        $res = $client->getJson('http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json');

        $deputados = json_decode($res, true);
        foreach ($deputados['list'] as $deputado) {
            $modelDeputado = new Deputado();
            $modelDeputado->id = $deputado['id'];
            $modelDeputado->nome = $deputado['nome'];
            $modelDeputado->partido = $deputado['partido'];
            $modelDeputado->tagLocalizacao = $deputado['tagLocalizacao'];
            $modelDeputado->save();
        }
    }
}
