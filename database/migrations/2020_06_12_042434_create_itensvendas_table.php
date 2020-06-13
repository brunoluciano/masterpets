<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensvendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itensvendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('venda_id')->default(null)->nullable();
            $table->unsignedBigInteger('vendedor_id');

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('venda_id')->references('id')->on('vendas');
            $table->foreign('vendedor_id')->references('id')->on('users');

            $table->bigInteger('quantidade');
            $table->double('total');
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
        Schema::dropIfExists('itensvendas');
    }
}
