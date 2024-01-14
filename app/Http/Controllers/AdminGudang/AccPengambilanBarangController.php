<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Models\AdminGudang\BarangInOut;
use App\Models\PengambilanBarang\PengambilanBarang;

class AccPengambilanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengambilanBarangs = PengambilanBarang::where('status', 'menunggu disetujui')->get();
        $barangs = Barang::all();
        return view('Admin.Components.Barang_Masuk_Keluar.accPengambilanBarang', compact('pengambilanBarangs','barangs'));
    }

    public function getRiwayatPengambilanBarang()
    {
        $pengambilanBarangs = PengambilanBarang::all();
        return view('Admin.Components.Barang.riwayatPengambilanBarang', compact('pengambilanBarangs'));
    }

    public function approve(Request $request, $id)
    {
        $pengajuan = PengambilanBarang::find($id);

        if ($pengajuan) {
            if ($pengajuan->status === 'menunggu disetujui') {
                $pengajuan->status = 'disetujui';
                $pengajuan->save();

                $barang = Barang::find($pengajuan->barang_id);
                $barang->stok -= $pengajuan->jumlah_diambil;
                $barang->save();

                BarangInOut::create([
                    'barang_id' => $pengajuan->barang_id,
                    'jenis' => 'keluar',
                    'jumlah' => $pengajuan->jumlah_diambil,
                    'tanggal' => $pengajuan->tanggal_pengambilan,
                ]);

            } else {
                return redirect('/admin-gudang/acc-pengambilan-barang')->with('message', 'Status sudah berubah.');
            }

            return redirect('/admin-gudang/acc-pengambilan-barang')->with('success', 'Pengajuan berhasil disetujui.');
        }

        return redirect('/admin-gudang/acc-pengambilan-barang');
    }

    public function reject(Request $request, $id)
    {
        $pengajuan = PengambilanBarang::find($id);
    if ($pengajuan) {
        if ($pengajuan->status === 'menunggu disetujui') {
            $barang = Barang::find($pengajuan->barang_id);
            $barang->stok == $barang->stok;
            $barang->save();
        }

        $pengajuan->status = 'ditolak';
        $pengajuan->save();

        return redirect('/manager-gudang/acc-pengambilan-barang')->with('warning', 'Pengajuan ditolak.');
    }

    return redirect('/manager-gudang/acc-pengambilan-barang');
    }





}
