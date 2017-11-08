<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaudeAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saude_aluno', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('flg_rubeola');
            $table->boolean('flg_sarampo');
            $table->boolean('flg_catapora');
            $table->boolean('flg_escalartina');
            $table->string('flg_outras', 300)->nullable();
            $table->boolean('flg_bronquite');
            $table->boolean('flg_falta_de_ar');
            $table->boolean('flg_diabete');
            $table->boolean('flg_refluxo');
            $table->boolean('flg_convulsao');
            $table->string('medicamentos', 300)->nullable();
            $table->boolean('flg_alergia');
            $table->string('sintomas_alergia', 300)->nullable();
            $table->boolean('flg_visao');
            $table->boolean('flg_fala');
            $table->boolean('flg_audicao');
            $table->boolean('flg_educacao_fisica');
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
        Schema::dropIfExists('saude_aluno');
    }
}
