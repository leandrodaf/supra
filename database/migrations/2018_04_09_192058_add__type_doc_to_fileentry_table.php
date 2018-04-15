<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeDocToFileentryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fileentrys', function (Blueprint $table) {
            $table->integer('type_doc_id')->unsigned()->nullable();
            $table->foreign('type_doc_id')->references('id')->on('type_doc')->onDelete('cascade');
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
            $table->dropForeign('fileentrys_alunos_id_foreign');
            $table->dropColumn('type_doc_id');
        });
    }
}
