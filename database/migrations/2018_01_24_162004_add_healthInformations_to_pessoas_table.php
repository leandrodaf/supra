<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHealthInformationsToPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->integer('healthInformations_id')->unsigned()->nullable();
            $table->foreign('healthInformations_id')->references('id')->on('healthInformations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->dropForeign('alunos_healthInformations_id_foreign');
            $table->dropColumn(['healthInformations_id']);
        });
    }
}
