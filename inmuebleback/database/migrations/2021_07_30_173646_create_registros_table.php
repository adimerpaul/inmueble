<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('num');
            $table->string('contribuyente');
            $table->string('ci');
            $table->string('numero')->default('')->nullable();
            $table->string('numtramite')->default('')->nullable();
            $table->string('numhoja')->default('')->nullable();
            $table->string('lugar')->default('')->nullable();
            $table->string('tipo')->default('');//tramite
            $table->date('fecha')->default(null);
            $table->time('hora')->nullable();
            $table->string('tipo2')->default('NATURAL'); //natural/juridico
            $table->string('tipo3')->default('ACTIVO'); //activo/baja
            $table->string('gestion')->default('');
            $table->string('detalle')->default('')->nullable();
            $table->unsignedBigInteger('user_id')->default('1');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('contribuyente_id')->default('1');
            $table->foreign('contribuyente_id')->references('id')->on('contribuyentes');
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
        Schema::dropIfExists('registros');
    }
}
