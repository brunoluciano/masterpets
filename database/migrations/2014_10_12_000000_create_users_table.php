<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('sexo',1);
            $table->string('endereco');
            $table->integer('numero');
            $table->string('complemento');
            $table->string('cidade');
            $table->unsignedBigInteger('estado_id');
            $table->string('bairro');
            $table->char('cep',10);
            $table->char('telefone',15);
            $table->date('nascimento');
            $table->char('cpf',14)->unique();
            $table->unsignedBigInteger('tipo_usuario_id')->default(1);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
