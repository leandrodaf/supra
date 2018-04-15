<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('diary', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->char('flg_atention', 1);
            $table->char('flg_discipline', 1);
            $table->char('flg_humor', 1);
            $table->string('description')->nullable();
            $table->integer('alunos_id')->unsigned();
            $table->foreign('alunos_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('Diary');
    }
}
