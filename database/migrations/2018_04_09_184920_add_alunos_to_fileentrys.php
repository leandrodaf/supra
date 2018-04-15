<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlunosToFileentrys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fileentrys', function (Blueprint $table) {
            $table->integer('alunos_id')->unsigned()->nullable();
            $table->integer('pessoa_id')->unsigned()->nullable();
            $table->foreign('alunos_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fileentrys', function (Blueprint $table) {
            $table->dropForeign('fileentrys_activitie_id_foreign');
            $table->dropColumn('alunos_id');
            $table->dropColumn('pessoa_id');
        });
    }
}
