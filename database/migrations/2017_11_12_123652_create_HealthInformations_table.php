<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthInformations', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('sarampo')->nullable();
            $table->boolean('rubeola')->nullable();
            $table->boolean('catapora')->nullable();
            $table->boolean('escarlatina')->nullable();
            $table->string('outradoenca')->nullable();
            $table->boolean('bronquite')->nullable();
            $table->boolean('faltadear')->nullable();
            $table->boolean('diabete')->nullable();
            $table->boolean('refluxo')->nullable();
            $table->boolean('convulsao')->nullable();
            $table->string('medicamentotomar')->nullable();
            $table->boolean('alergia')->nullable();
            $table->string('sintomasalergia')->nullable();;
            $table->boolean('visao')->nullable();
            $table->boolean('fala')->nullable();
            $table->boolean('audicao')->nullable();
            $table->boolean('edfisica')->nullable();
            $table->string('outradeficienciax')->nullable();
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
        Schema::dropIfExists('healthInformations');
    }
}
