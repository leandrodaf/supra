<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlunosToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('alunos_id')->unsigned()->nullable();
            $table->foreign('alunos_id')->references('id')->on('alunos')->onDelete('cascade');
        });

        Schema::table('alunos', function (Blueprint $table) {
            $table->boolean('status_user')->unsigned()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_alunos_id_foreign');
            $table->dropColumn(['alunos_id']);
        });

        Schema::table('alunos', function (Blueprint $table) {
            $table->dropColumn(['status_user']);
        });
    }
}
