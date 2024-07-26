<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_salida')->nullable();
            $table->time('hora_salida')->nullable();
            $table->double('costo')->nullable();
            $table->unsignedBigInteger('destino_id')->nullable();
            $table->unsignedBigInteger('buses_id')->nullable();
            $table->unsignedBigInteger('chofer_id')->nullable();
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
        Schema::dropIfExists('rutas');
    }
};
