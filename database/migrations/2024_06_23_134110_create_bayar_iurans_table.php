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
        Schema::create('bayar_iurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
            $table->unsignedBigInteger('id_iuran');

            $table->string('nominal');
            $table->integer('selama');
            $table->date('tanggal_bayar');
            $table->date('dari_tanggal');
            $table->date('sampai_tanggal');
            $table->integer('bayar');
            $table->integer('total_nominal');
        //    $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
            $table->foreign('id_iuran')->references('id')->on('iurans')->onDelete('cascade'); 
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
        Schema::dropIfExists('bayar_iurans');
    }
};
