<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('satuan_id')->constrained('satuans')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('deskripsi',255)->nullable();
            $table->integer('stok');
            $table->string('gambar',255)->nullable();
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
        Schema::dropIfExists('barangs');
    }
}
