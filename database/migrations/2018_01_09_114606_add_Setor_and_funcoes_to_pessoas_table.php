<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSetorAndFuncoesToPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('pessoas', function (Blueprint $table) {
//            $table->integer('dados_medicos_id')->unsigned()->nullable();
//            $table->foreign('dados_medicos_id')->references('id')->on('dados_medicos')->onDelete('cascade');
//
//            $table->integer('dados_medicos_id')->unsigned()->nullable();
//            $table->foreign('dados_medicos_id')->references('id')->on('dados_medicos')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('pessoas', function (Blueprint $table) {
//            $table->dropForeign('alunos_dados_medicos_id_foreign');
//            $table->dropColumn(['dados_medicos_id']);
//
//            $table->dropForeign('alunos_dados_medicos_id_foreign');
//            $table->dropColumn(['dados_medicos_id']);
//        });
    }
}
