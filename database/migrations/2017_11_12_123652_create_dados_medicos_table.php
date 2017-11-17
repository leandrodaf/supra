<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('sarampo');
            $table->boolean('rubeola');
            $table->boolean('catapora');
            $table->boolean('escarlatina');
            $table->string('outradoenca')->nullable();
            $table->boolean('bronquite');
            $table->boolean('faltadear');
            $table->boolean('diabete');
            $table->boolean('refluxo');
            $table->boolean('convulsao');
            $table->string('medicamentotomar')->nullable();
            $table->boolean('alergia');
            $table->string('sintomasalergia')->nullable();;
            $table->boolean('visao');
            $table->boolean('fala');
            $table->boolean('audicao');
            $table->boolean('edfisica');
            $table->string('outradeficienciax')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_medicos');
    }
}
