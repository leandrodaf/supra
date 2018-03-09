<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsubjectsYearClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_subject_year_class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_class_id')->unsigned();
            $table->foreign('year_class_id')->references('id')->on('yearClass')->onDelete('cascade');
            $table->integer('school_subject_id')->unsigned();
            $table->foreign('school_subject_id')->references('id')->on('schoolsubjects')->onDelete('cascade');
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
        Schema::dropIfExists('school_subject_year_class');
    }
}
