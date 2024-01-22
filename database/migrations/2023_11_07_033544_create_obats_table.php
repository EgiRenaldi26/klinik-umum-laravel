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
        Schema::create('obat', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('foto')->nullable();
            $table->string('nama_obat', 30); // Sesuaikan panjang karakter dengan kebutuhan
            $table->string('jenis_obat', 30); // Sesuaikan panjang karakter dengan kebutuhan
            $table->string('dosis', 30); // Sesuaikan panjang karakter dengan kebutuhan
            $table->integer('stok'); 
            $table->string('keterangan', 30); // Sesuaikan panjang karakter dengan kebutuhan
            $table->integer('harga_obat');
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
        Schema::table('obat', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
        Schema::dropIfExists('obat');
    }
};
