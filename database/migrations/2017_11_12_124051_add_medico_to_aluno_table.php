<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedicoToAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->integer('dados_medicos_id')->unsigned()->nullable();
            $table->foreign('dados_medicos_id')->references('id')->on('dados_medicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropForeign('alunos_dados_medicos_id_foreign');
            $table->dropColumn(['dados_medicos_id']);
        });
    }
}
