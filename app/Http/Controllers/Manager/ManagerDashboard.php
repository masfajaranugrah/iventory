<?php

namespace App\Http\Controllers\manager;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;
use App\Models\Karyawan\ReturBarang;

class ManagerDashboard extends Controller
{
    public function dashboard(){
        $totalBarang = Barang::all()->count();
        $totalPengembalian = ReturBarang::all()->count();
        return view('Manager.ManagerDashboard.Dashboard',
        [
            'totalBarang' => $totalBarang,
            'totalPengembalian' => $totalPengembalian
        ]);
    }
}
