<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDadosFinanceirosToPessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->string('data_admissao')->nullable();
            $table->string('numero_ctps', '30')->nullable();
            $table->string('ctps_serie', '30')->nullable();
            $table->string('pis', '30')->nullable();
            $table->double('salario_base', 8, 2)->nullable();
            $table->double('vale_refeicao', 8, 2)->nullable();
            $table->string('plano_saude')->nullable();
            $table->double('vale_transporte', 8, 2)->nullable();
            $table->string('contato_emergencial', 18)->nullable();
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
            $table->dropColumn(['data_admissao', 'numero_ctps', 'pis', 'salario_base', 'vale_refeicao', 'plano_saude', 'vale_transporte', 'contato_emergencial']);
        });
    }
}
