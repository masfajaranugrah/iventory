<?php

namespace App\Models\Karyawan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PengambilanBarang\PengambilanBarang;
use App\Models\AdminGudang\Barang;


class ReturBarang extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','barang_id','pengambilanBarang_id', 'jumlah_pengembalian','alasan_pengembalian','tanggal_pengembalian','gambar','status','approved_by','rejected_by'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function pengambilanBarang()
    {
        return $this->belongsTo(PengambilanBarang::class, 'pengambilanBarang_id');
    }

}
