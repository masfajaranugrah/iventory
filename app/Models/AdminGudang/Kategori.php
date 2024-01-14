<?php

namespace App\Models\AdminGudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['nama','deskripsi','created_at','updated_at','deleted_at'];

    public function kategori() {
        return $this->hasOne(Kategori::class);
    }

}
