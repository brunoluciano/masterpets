<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('dono_id');
            $table->date('nascimento');
            $table->char('sexo',1);
            $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('raca_predominante_id');
            $table->unsignedBigInteger('raca_secundaria_id')->nullable();
            $table->unsignedBigInteger('porte_id');
            $table->unsignedBigInteger('cor_predominante_id');
            $table->unsignedBigInteger('cor_secundaria_id')->nullable();
            $table->unsignedBigInteger('pelo_id');
            $table->text('alergias')->nullable();
            $table->text('observacoes')->nullable();
            $table->boolean('vivo')->default(true);
            $table->boolean('agressivo')->default(false);
            $table->boolean('apto_reproduzir')->default(true);
            $table->string('path_img')->nullable();

            $table->foreign('dono_id')->references('id')->on('users');
            $table->foreign('especie_id')->references('id')->on('especies');
            $table->foreign('raca_predominante_id')->references('id')->on('racas');
            $table->foreign('raca_secundaria_id')->references('id')->on('racas');
            $table->foreign('porte_id')->references('id')->on('portes');
            $table->foreign('cor_predominante_id')->references('id')->on('cores');
            $table->foreign('cor_secundaria_id')->references('id')->on('cores');
            $table->foreign('pelo_id')->references('id')->on('pelos');
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
        Schema::dropIfExists('animais');
    }
}
