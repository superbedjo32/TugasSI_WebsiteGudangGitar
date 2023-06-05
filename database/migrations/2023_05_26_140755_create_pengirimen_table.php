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
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->bigInteger('id_Gitar')->unsigned();
            $table->foreign('id_Gitar')->references('id')->on('gitars');
            $table->bigInteger('Jumlah');
            $table->string('Waktu_Pengiriman',100);
            $table->bigInteger('id_Supir')->unsigned();
            $table->foreign('id_Supir')->references('id')->on('supirs');
            $table->bigInteger('id_Rute')->unsigned();
            $table->foreign('id_Rute')->references('id')->on('rutes');
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
        Schema::dropIfExists('pengirimen');
    }
};
