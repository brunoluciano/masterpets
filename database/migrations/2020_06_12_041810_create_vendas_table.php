<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendedor_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('tipo_pagamento_id');

            $table->foreign('vendedor_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('users');
            $table->foreign('tipo_pagamento_id')->references('id')->on('tipopagamentos')->nullable();

            $table->dateTime('horario_venda');
            $table->double('total_pago')->nullable();
            $table->double('troco')->default(0)->nullable();
            $table->double('total_venda');
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
        Schema::dropIfExists('vendas');
    }
}
