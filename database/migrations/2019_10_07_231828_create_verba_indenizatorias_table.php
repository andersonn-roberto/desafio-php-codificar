<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbaIndenizatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbas_indenizatorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idDeputado');
            $table->date('dataReferencia');
            $table->integer('codTipoDespesa');
            $table->decimal('valor');
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
        Schema::dropIfExists('verbas_indenizatorias');
    }
}
