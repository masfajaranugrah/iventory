<?php

namespace App\Models\PengambilanBarang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdminGudang\Barang;
use App\Models\User;

class PengambilanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id','nama_karyawan','barang_id', 'jumlah_diambil', 'tanggal_pengambilan','status'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function barangOut()
    {
        return $this->morphOne(BarangInOut::class, 'barangOut');
    }

    public function user(){
        return $this->belongsTo(User::class,'nama_karyawan', 'name');
    }

}
