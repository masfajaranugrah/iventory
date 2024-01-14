<?php

namespace App\Models\AdminGudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Barang extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama','kategori_id','satuan_id','deskripsi','stok','gambar','created_at','updated_at','deleted_at'];

    public function kategori() {
        return $this->belongsTo(kategori::class);
    }

    public function satuan() {
        return $this->belongsTo(Satuan::class);
    }

    public function barang() {
        return $this->hasMany(Barang::class);
    }

    public function pengambilanBarang()
    {
        return $this->hasMany(PengambilanBarang::class, 'barang_id');
    }

}
