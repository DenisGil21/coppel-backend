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
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('sku');
            $table->string('articulo',15);
            $table->string('marca',15);
            $table->string('modelo',15);
            $table->date('fecha_alta');
            $table->mediumInteger('stock');
            $table->mediumInteger('cantidad');
            $table->boolean('descontinuado');
            $table->date('fecha_baja');
            $table->foreignId('familia_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
};
