<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTelefoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_telefone', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->integer('telefone_id')->unsigned();
            $table->foreign('telefone_id')->references('id')->on('telefones')->onDelete('cascade');
            $table->char('flg_principal', 1)->nullable();
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
        Schema::dropIfExists('aluno_telefone');
    }
}
