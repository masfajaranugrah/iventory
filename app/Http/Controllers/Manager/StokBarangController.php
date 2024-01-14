<?php

namespace App\Http\Controllers\Manager;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;

class StokBarangController extends Controller
{
    public function stok(){
        $lihatStokBarang = Barang::all(); 
    return view('manager.component.lihatstokbarang', compact('lihatStokBarang'));
    }
}
