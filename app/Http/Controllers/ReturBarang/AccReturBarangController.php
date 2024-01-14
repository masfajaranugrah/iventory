<?php

namespace App\Http\Controllers\ReturBarang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan\ReturBarang;
use App\Models\AdminGudang\Barang;
use App\Models\PengambilanBarang\PengambilanBarang;
use App\Models\AdminGudang\BarangInOut;
use Illuminate\Support\Facades\Auth;

class AccReturBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returBarangs = ReturBarang::where('status', 'menunggu disetujui')->get();
        if (Auth::user()->isAdmin()) {
            return view('Admin.Components.Retur.accReturBarang', compact('returBarangs'));
        } elseif (Auth::user()->isManager()) {
            return view('manager.component.accReturBarang', compact('returBarangs'));
        }
        return abort(403);
    }

    public function getRiwayatReturBarang(){
        $returBarangs = ReturBarang::all();

        if (Auth::user()->isAdmin()) {
            return view('Admin.Components.Retur.riwayatReturBarang', compact('returBarangs'));
        } elseif (Auth::user()->isManager()) {
            return view('manager.component.riwayatReturBarang', compact('returBarangs'));
        }

        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, $id)
    {
        $pengajuan = ReturBarang::find($id);

        if ($pengajuan) {
            if ($pengajuan->status === 'menunggu disetujui') {
                $pengajuan->status = 'disetujui';
                $pengajuan->approved_by = Auth::user()->getRole();
                $pengajuan->save();

                $pengambilanBarang = PengambilanBarang::find($pengajuan->pengambilanBarang_id);
                $pengambilanBarang->jumlah_diambil -= $pengajuan->jumlah_pengembalian;
                $pengambilanBarang->save();

                $barang = Barang::find($pengajuan->barang_id);
                $barang->stok += $pengajuan->jumlah_pengembalian;
                $barang->save();

                BarangInOut::create([
                    'barang_id' => $pengajuan->barang_id,
                    'jenis' => 'masuk',
                    'jumlah' => $pengajuan->jumlah_pengembalian,
                    'tanggal' => $pengajuan->tanggal_pengembalian,
                ]);
            } else {
                return redirect($this->getRedirectPath())->with('success', 'Status sudah berubah.');
            }

            return redirect($this->getRedirectPath())->with('success', 'Pengajuan berhasil disetujui.');
        }
    }

        public function reject(Request $request, $id)
        {
            $pengajuan = ReturBarang::find($id);

            if ($pengajuan) {
                if ($pengajuan->status === 'menunggu disetujui') {
                    $pengajuan->status = 'ditolak';
                    $pengajuan->rejected_by = Auth::user()->getRole();
                    $pengajuan->save();

                    $pengambilanBarang = PengambilanBarang::find($pengajuan->pengambilanBarang_id);
                    $pengambilanBarang->jumlah_diambil == $pengajuan->jumlah_pengembalian;
                    $pengambilanBarang->save();
                } else {
                    return redirect($this->getRedirectPath())->with('success', 'Status sudah berubah.');
                }

                return redirect($this->getRedirectPath())->with('success', 'Pengajuan ditolak.');
            }

            return redirect($this->getRedirectPath());
        }

        protected function getRedirectPath()
        {
            return Auth::user()->isAdmin() ? '/admin-gudang/acc-retur-barang-admin' : '/manager-gudang/acc-retur-barang-manager';
        }
}
