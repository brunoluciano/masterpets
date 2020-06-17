<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('evento_id');

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('pet_id')->references('id')->on('animais');
            $table->foreign('evento_id')->references('id')->on('servicos');

            $table->date('data_evento');
            $table->time('hora_inicio');
            $table->time('hora_termino')->nullable();
            $table->text('observacoes')->nullable();
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
        Schema::dropIfExists('agendamentos');
    }
}
