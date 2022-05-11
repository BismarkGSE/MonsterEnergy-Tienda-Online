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
        Schema::create('detalles_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPedido')->unsigned()->references('id')->constrained('pedidos')->on('pedidos');
            $table->foreignId('idProducto')->unsigned()->references('id')->constrained('productos')->on('productos');
            $table->float('precio',8,2);
            $table->integer('cantidad');
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
        Schema::dropIfExists('detalles_productos');
    }
};
