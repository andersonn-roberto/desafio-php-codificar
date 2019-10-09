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
use App\DetalheVerbaIndenizatoria;
use App\Support\HttpClient;
use App\VerbaIndenizatoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Alimenta as tabelas: verbas_indenizatorias e seu detalhe
 *
 * @category PHP
 *
 * @author Anderson Roberto de Oliveira <andersonn.roberto@gmail.com>
 */
class VerbaIndenizatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalhes_verbas_indenizatorias')->truncate();
        DB::table('verbas_indenizatorias')->truncate();

        $this->_createVerbasIndenizatoriasEDetalhes();
    }

    /**
     * Insere as verbas indenizatórias e seu detalhe
     *
     * @return void
     */
    private function _createVerbasIndenizatoriasEDetalhes()
    {
        $client = new HttpClient();
        $deputados = Deputado::all();

        foreach ($deputados as $deputado) {
            $deputado_id = $deputado->id;

            for ($mes=1; $mes < 13; $mes++) {
                $requestUrl = "http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/$deputado_id/2017/$mes?formato=json";

                $this->command->info("Processando deputado $deputado_id no ano de 2017 e mes $mes");

                $res = $client->getJson($requestUrl);
                $verbas = json_decode($res, true);

                foreach ($verbas['list'] as $verba) {
                    $modelVerba = new VerbaIndenizatoria();
                    $modelVerba->idDeputado = $verba['idDeputado'];
                    $modelVerba->dataReferencia = $verba['dataReferencia']['$'];
                    $modelVerba->codTipoDespesa = $verba['codTipoDespesa'];
                    $modelVerba->valor = $verba['valor'];
                    $modelVerba->descTipoDespesa = $verba['descTipoDespesa'];
                    $modelVerba->save();

                    foreach ($verba['listaDetalheVerba'] as $detalhe) {
                        $modelDetalhe = new DetalheVerbaIndenizatoria();
                        $modelDetalhe->id = $detalhe['id'];
                        $modelDetalhe->idDeputado = $detalhe['idDeputado'];
                        $modelDetalhe->dataReferencia = $detalhe['dataReferencia']['$'];
                        $modelDetalhe->valorReembolsado = $detalhe['valorReembolsado'];
                        $modelDetalhe->dataEmissao = $detalhe['dataEmissao']['$'];
                        $modelDetalhe->cpfCnpj = $detalhe['cpfCnpj'];
                        $modelDetalhe->valorDespesa = $detalhe['valorDespesa'];
                        $modelDetalhe->nomeEmitente = $detalhe['nomeEmitente'];
                        if (isset($detalhe['descDocumento'])) {
                            $modelDetalhe->descDocumento = $detalhe['descDocumento'];
                        }
                        $modelDetalhe->codTipoDespesa = $detalhe['codTipoDespesa'];
                        $modelDetalhe->descTipoDespesa = $detalhe['descTipoDespesa'];
                        $modelDetalhe->save();
                    }
                }
            }
        }
    }
}
