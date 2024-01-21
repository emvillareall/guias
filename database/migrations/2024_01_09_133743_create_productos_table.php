<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto');
            $table->string('descripcion_producto');
            $table->string('cantidad_compra_producto');
            $table->string('stock_venta_producto')->default(0);
            $table->float('precio_pesos_producto')->default(0);
            $table->float('precio_dolares_producto')->default(0);
            $table->float('precio_venta_producto')->default(0);
            $table->foreignId('compras_id');
            $table->string('estado_producto')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
