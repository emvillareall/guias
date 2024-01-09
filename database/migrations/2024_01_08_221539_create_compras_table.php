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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto_compra');
            $table->string('descripcion_compra');
            $table->string('cantidad_compra')->default(0);
            $table->float('precio_pesos_compra',)->default(0);
            $table->float('precio_dolares_compra',)->default(0);
            $table->float('precio_venta')->default(0);
            $table->foreignId('proveedor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
