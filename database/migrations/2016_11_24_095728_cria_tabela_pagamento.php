<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaPagamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento', function (Blueprint $table){
            $table->increments('id');
            $table->string('descricao');
            $table->float('valor');
            $table->integer('conta_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('conta_id')->references('id')->on('conta');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('pagamento');
    }
}
