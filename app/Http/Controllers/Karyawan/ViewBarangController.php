<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;

use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;

class ViewBarangController extends Controller
{
    public function viewall(){
        $viewbarangs = Barang::paginate(5); // menampilkan berapa item saja
        return view('Karyawan.Components.LihatSemuaBarang.viewBarang', compact("viewbarangs"));
    }
}
