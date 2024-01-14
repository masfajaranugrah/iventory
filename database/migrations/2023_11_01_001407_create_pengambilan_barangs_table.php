<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengambilanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilan_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('nama_karyawan');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('jumlah_diambil');
            $table->date('tanggal_pengambilan');
            $table->enum('status', ['menunggu disetujui','disetujui', 'ditolak'])->default('menunggu disetujui');
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
        Schema::dropIfExists('pengambilan_barangs');
    }
}
