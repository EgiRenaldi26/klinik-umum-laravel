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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi'); // Change to string
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('pasien_id');
            $table->string('keluhan');
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('rawat_id');
            $table->integer('total_biaya');
            $table->integer('uang_bayar');
            $table->integer('uang_kembali');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasien');
            $table->foreign('obat_id')->references('id')->on('obat');
            $table->foreign('rawat_id')->references('id')->on('rawat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
