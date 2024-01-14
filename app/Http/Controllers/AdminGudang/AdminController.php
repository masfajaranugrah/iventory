<?php

namespace App\Http\Controllers\AdminGudang;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;
use App\Models\Karyawan\ReturBarang;
use App\Models\AdminGudang\BarangInOut;
use App\Models\PengambilanBarang\PengambilanBarang;

class AdminController extends Controller
{
    public function index()
    {
    $totalBarangMasuk = BarangInOut::where('jenis', 'masuk')->count();
    $totalBarangKeluar = BarangInOut::where('jenis', 'keluar')->count();
    $totalpengambilan = PengambilanBarang::where('status', 'disetujui')->count();
    $totalreturBarang = ReturBarang::where('status', 'disetujui')->count();
    return view("Admin.AdminDashboard.Dashboard",
    [
    'totalBarangMasuk' => $totalBarangMasuk,
    'totalBarangKeluar' => $totalBarangKeluar,
    'totalpengambilan' => $totalpengambilan,
    'totalreturBarang' => $totalreturBarang,
]);
    }
}
