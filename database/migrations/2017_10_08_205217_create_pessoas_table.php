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
            $table->string('nome')->nullable();;
            $table->string('cpf_cnpj', 18)->nullable();;
            $table->boolean('sexo')->nullable();;
            $table->string('rg', 13)->nullable();
            $table->date('dataNascimento')->nullable();;
            $table->string('razaoSocial')->nullable();
            $table->string('inscricaoEstadual')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('citizenship')->unsigned()->nullable();
            $table->foreign('citizenship')->references('id')->on('citizenships')->onDelete('cascade');

            $table->integer('familySituation')->unsigned()->nullable();
            $table->foreign('familySituation')->references('id')->on('familySituations')->onDelete('cascade');

            $table->integer('tipo_pessoas_id')->unsigned();
            $table->foreign('tipo_pessoas_id')->references('id')->on('tipo_pessoas')->onDelete('cascade');

            $table->unique(['cpf_cnpj', 'rg']);
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
