<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_email', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->integer('email_id')->unsigned();
            $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
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
        Schema::dropIfExists('aluno_email');
    }
}
