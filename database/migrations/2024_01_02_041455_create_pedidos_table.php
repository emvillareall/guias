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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->foreignId('clientes_id')->default('1');
            $table->foreignId('tienda_id');
            $table->Float('subtotal_pedido')->nullable()->default(0);
            $table->Float('iva_pedido')->nullable()->default(0);
            $table->Float('descuentos_pedido')->nullable()->default(0);
            $table->Float('total_pedido')->nullable()->default(0);
            $table->string('estado_url')->default('EN ESPERA');
            $table->string('estado_pedidos')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
