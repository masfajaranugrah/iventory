<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cetak extends Model
{
    public function hari_ini()
    {
        return DB::select("SELECT b.nama AS nama_barang, b.stok, k.nama AS nama_kategori FROM barangs b JOIN kategoris k ON b.kategori_id = k.id WHERE SUBSTR(b.created_at, 1, 10) = DATE(NOW())");
    }

    public function bulan_ini()
    {
        return DB::select("SELECT b.nama AS nama_barang, b.stok, k.nama AS nama_kategori FROM barangs b JOIN kategoris k ON b.kategori_id = k.id WHERE MONTH(b.created_at) = MONTH(NOW())");
    }

    public function tahun_ini()
    {
        return DB::select("SELECT b.nama AS nama_barang, b.stok, k.nama AS nama_kategori FROM barangs b JOIN kategoris k ON b.kategori_id = k.id WHERE SUBSTR(b.created_at, 1, 10) = YEAR(NOW())");
    }
}
