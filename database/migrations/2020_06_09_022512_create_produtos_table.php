<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');

            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('unidade_medida_id');
            $table->double('unidade');
            $table->string('cod_barras')->nullable();
            $table->bigInteger('estoque_minimo')->default(0);
            $table->bigInteger('estoque_maximo')->default(0);;
            $table->bigInteger('estoque_atual')->default(0);;
            $table->double('preco_compra');
            $table->double('preco_venda');
            $table->string('path_img')->default('storage/produto/produtoDefault.jpg')->nullable();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('tipo_id')->references('id')->on('tipoprodutos');
            $table->foreign('unidade_medida_id')->references('id')->on('unidademedidas');
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
        Schema::dropIfExists('produtos');
    }
}
