<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;
use App\Models\Karyawan\ReturBarang;
use App\Models\PengambilanBarang\PengambilanBarang;

class KaryawanController extends Controller
{
    public function index(){

        $totalpengambilan = PengambilanBarang::where('status', 'disetujui')->count();
        $totalreturBarang = ReturBarang::where('status', 'disetujui')->count();
        $totalBarang = Barang::all()->count();
        return view('Karyawan.KaryawanDashboard.Dashboard',[
            'totalpengambilan' => $totalpengambilan,
            'totalreturBarang' => $totalreturBarang,
            'totalBarang' => $totalBarang

        ]);
    }
}
