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

use App\RedeSocial;
use App\Support\HttpClient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Alimenta a tabela de redes sociais
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */

class RedeSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('redes_sociais')->truncate();

        $this->_createRedesSociais();
    }

    /**
     * Insere as redes sociais
     *
     * @return void
     */
    private function _createRedesSociais()
    {
        $client = new HttpClient();
        $res = $client->getJson('http://dadosabertos.almg.gov.br/ws/deputados/lista_telefonica?formato=json');

        $redesSociais = json_decode($res, true);
        foreach ($redesSociais['list'] as $redeSocial) {
            foreach ($redeSocial['redesSociais'] as $rede) {
                $modelRedeSocial = new RedeSocial();
                $modelRedeSocial->id = $rede['redeSocial']['id'];
                $modelRedeSocial->nome = $rede['redeSocial']['nome'];
                $modelRedeSocial->save();
            }
        }
    }
}
