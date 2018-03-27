<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('description');
            $table->integer('alunos_id')->unsigned();
            $table->foreign('alunos_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->integer('year_class_id')->unsigned()->nullable();
            $table->foreign('year_class_id')->references('id')->on('yearClass');
            $table->integer('notification_type_id')->unsigned();
            $table->foreign('notification_type_id')->references('id')->on('notification_type')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
