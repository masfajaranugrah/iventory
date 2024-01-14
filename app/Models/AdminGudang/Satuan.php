<?php

namespace App\Models\AdminGudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $fillable = ['simbol','deskripsi','created_at','updated_at','deleted_at'];

    public function satuan() {
        return $this->hasOne(Satuan::class);
    }
}
