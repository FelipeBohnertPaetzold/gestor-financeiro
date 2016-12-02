<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaDeposito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor');
            $table->string('descricao')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('conta_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('conta_id')->references('id')->on('conta');
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
        Schema::drop('deposito');
    }
}
