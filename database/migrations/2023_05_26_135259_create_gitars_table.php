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
        Schema::create('gitars', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Gitar',100);
            $table->bigInteger('Stok');
            $table->bigInteger('id_Jenis')->unsigned();
            $table->foreign('id_Jenis')->references('id')->on('jenis__gitars');
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
        Schema::dropIfExists('gitars');
    }
};
