<?php

namespace App\Http\Controllers\Manager;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;


class ViewStokController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view('Manager.component.lihatStokBarang', compact('barangs'));
    }
}
