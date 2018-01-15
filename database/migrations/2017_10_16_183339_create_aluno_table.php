<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_aluno');
            $table->string('foto_aluno')->nullable()->default("avatarPadrao.jpg");
            $table->string('rg_aluno', 13)->unique();
            $table->boolean('flg_certidao_nascimento_aluno');
            $table->boolean('flg_carteira_vacinacao_aluno');
            $table->boolean('flg_frequentou_escola_aluno');
            $table->boolean('flg_irmaos_aluno');
            $table->boolean('flg_juntos_aos_pais_aluno');
            $table->integer('qtd_irmaos_aluno')->nullable();
            $table->date('data_nascimento_aluno');
            $table->integer('sexo_aluno')->unsigned();
            $table->integer('tipo_pessoas_id')->unsigned();
            $table->foreign('tipo_pessoas_id')->references('id')->on('tipo_pessoas')->onDelete('cascade');
            $table->foreign('sexo_aluno')->references('id')->on('gender')->onDelete('cascade');
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
        Schema::drop('alunos');
    }
}
