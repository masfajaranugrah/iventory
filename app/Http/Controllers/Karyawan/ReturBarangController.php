<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengambilanBarang\PengambilanBarang;
use App\Models\Karyawan\ReturBarang;
use App\Models\AdminGudang\Barang;
use App\User;
use Illuminate\Support\Facades\Auth;
class ReturBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $pengambilanBarangs = PengambilanBarang::where('user_id', $user)->where('status', '!=', 'menunggu disetujui')->where('jumlah_diambil', '>','0')->get();
        return view('Karyawan.Components.Pengembalian.returBarang', compact('pengambilanBarangs'));
    }

    public function getRiwayatReturBarang()
{
    $user = Auth::id();
    $returBarangs = ReturBarang::where('user_id', $user)->with('PengambilanBarang.barang')->get();
    return view('Karyawan.Components.Pengembalian.riwayatReturBarang', compact('returBarangs'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengambilanBarang_id' => 'required',
            'jumlah_pengembalian' => 'required',
            'alasan_pengembalian' => 'required',
            'tanggal_pengembalian' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar');
    
        $user = auth()->user();
        $pengambilan = PengambilanBarang::find($request->pengambilanBarang_id);

        if ($gambar) {
            $file_name = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/post-retur-gambar', $file_name);

            ReturBarang::create([
                'user_id' => $user->id,
                'barang_id' => $pengambilan->barang_id,
                'pengambilanBarang_id' => $request->pengambilanBarang_id,
                'jumlah_pengembalian' => $request->jumlah_pengembalian,
                'alasan_pengembalian' => $request->alasan_pengembalian,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'gambar' => $file_name,
                'status' => 'menunggu disetujui',
            ]);
            
        }

    
        return redirect('karyawan-gudang/riwayat-retur-barang')->with('success', 'Retur barang berhasil diajukan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
