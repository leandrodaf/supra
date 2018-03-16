<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosActivitieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitie_alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activitie_id')->unsigned();
            $table->foreign('activitie_id')->references('id')->on('activities')->onDelete('cascade');
            $table->integer('alunos_id')->unsigned();
            $table->foreign('alunos_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->float('media');
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
        Schema::dropIfExists('activitie_alunos');
    }
}
