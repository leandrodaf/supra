<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoEscolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_escola', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->integer('escola_id')->unsigned();
            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('cascade');
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
        Schema::dropIfExists('aluno_escola');
    }
}
