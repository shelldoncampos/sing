<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->text("nome");
            $table->string("cpf");
            $table->string("rg");
            $table->string("cep");
            $table->string("cidade");
            $table->string("estado");
            $table->string("rua");
            $table->string("bairro");
            $table->string("numero");
            $table->text("complemento");
            $table->string("email");
            $table->string("celular");
            $table->string("qtdequips");
            $table->string("modelo");
            $table->string("imei");
            $table->text("observ");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
