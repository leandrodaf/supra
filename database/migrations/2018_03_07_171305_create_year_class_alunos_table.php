<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearClassAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos_year_class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_class_id')->unsigned();
            $table->foreign('year_class_id')->references('id')->on('yearClass')->onDelete('cascade');
            $table->integer('alunos_id')->unsigned();
            $table->foreign('alunos_id')->references('id')->on('alunos')->onDelete('cascade');
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
        Schema::dropIfExists('alunos_year_class');
    }
}
