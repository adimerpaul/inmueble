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
            $table->string('ci');
            $table->string('contribuyente');
            $table->string('numero')->default('');
            $table->string('numtramite')->default('');
            $table->string('numhoja')->default('');
            $table->string('lugar')->default('');
            $table->string('tipo')->default('');//tramite
            $table->date('fecha')->default('');
            $table->time('hora')->nullable();
            $table->string('tipo2')->default('NATURAL'); //natural/juridico
            $table->string('tipo3')->default(''); //activo/baja
            $table->string('gestion')->default('');
            $table->string('detalle')->default('');
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
