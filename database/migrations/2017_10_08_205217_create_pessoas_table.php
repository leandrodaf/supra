<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf_cnpj', 18)->nullable();
            $table->boolean('sexo')->nullable();
            $table->string('rg', 12)->nullable();
            $table->date('dataNascimento')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->string('razaoSocial')->nullable();
            $table->string('nomeFantasia')->nullable();
            $table->string('inscricaoEstadual')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->boolean('status');
            $table->integer('tipo_pessoas_id')->unsigned();
            $table->unique(['tipo_pessoas_id']);
            $table->foreign('tipo_pessoas_id')->references('id')->on('tipo_pessoas')->onDelete('cascade');
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
        Schema::dropIfExists('pessoas');
    }
}
