<?php

namespace App\Models\AdminGudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangInOut extends Model
{
    use HasFactory;
    protected $fillable = [
        'barang_id','jenis', 'jumlah', 'tanggal'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function barangOut()
    {
        return $this->morphTo();
    }
}
