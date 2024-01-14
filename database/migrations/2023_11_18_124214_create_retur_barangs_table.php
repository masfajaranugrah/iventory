<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('pengambilanBarang_id')->constrained('pengambilan_barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('jumlah_pengembalian');
            $table->string('alasan_pengembalian',50);
            $table->date('tanggal_pengembalian');
            $table->string('gambar',255)->nullable();
            $table->enum('status', ['menunggu disetujui','disetujui', 'ditolak'])->default('menunggu disetujui');
            $table->string('approved_by')->nullable();
            $table->string('rejected_by')->nullable();
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
        Schema::dropIfExists('retur_barangs');
    }
}
