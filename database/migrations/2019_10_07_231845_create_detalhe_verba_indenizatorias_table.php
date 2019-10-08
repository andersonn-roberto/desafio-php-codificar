<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalheVerbaIndenizatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes_verbas_indenizatorias', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('idDeputado');
            $table->date('dataReferencia');
            $table->decimal('valorReembolsado');
            $table->date('dataEmissao');
            $table->string('cpfCnpj');
            $table->decimal('valorDespesa');
            $table->string('nomeEmitente');
            $table->string('descDocumento')->nullable();
            $table->integer('codTipoDespesa');
            $table->string('descTipoDespesa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhes_verbas_indenizatorias');
    }
}
