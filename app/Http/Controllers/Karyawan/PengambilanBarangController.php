<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Models\PengambilanBarang\PengambilanBarang;
use App\User;
use Illuminate\Support\Facades\Auth;

class PengambilanBarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('Karyawan.Components.Pengambilan.pengambilanBarang', compact('barangs'));
    }

    public function getRiwayatPengambilanBarang()
    {
        $user = Auth::id();
        $pengambilanBarangs = PengambilanBarang::where('user_id', $user)->get();
        return view('karyawan.components.Pengambilan.riwayatPengambilanBarang', compact('pengambilanBarangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah_diambil' => 'required',
            'tanggal_pengambilan' => 'required',
        ]);

        $user = auth()->user();
        $barang = Barang::find($request->barang_id);


        PengambilanBarang::create([
                'user_id' => $user->id,
                'nama_karyawan' => $user->name,
                'barang_id' => $request->barang_id,
                'jumlah_diambil' => $request->jumlah_diambil,
                'tanggal_pengambilan' => $request->tanggal_pengambilan,
                'status' => 'menunggu disetujui',
        ]);

        return redirect('karyawan-gudang/riwayat-pengambilan-barang')->with('success', 'Pengambilan barang berhasil diajukan.');

    }

}
