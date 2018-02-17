<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearClass', function (Blueprint $table) {
            $table->increments('id');
            $table->date('activeTime');
            $table->time('startTime');
            $table->time('endTime');
            $table->integer('classroom_id')->unsigned()->nullable();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('yearClass');
    }
}
