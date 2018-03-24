<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassToCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('call', function (Blueprint $table) {
            $table->integer('year_class_id')->unsigned();
            $table->foreign('year_class_id')->references('id')->on('yearClass')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('call', function (Blueprint $table) {
            $table->dropForeign('call_year_class_id_foreign');
            $table->dropColumn('year_class_id');
        });
    }
}
