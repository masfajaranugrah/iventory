<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Models\AdminGudang\BarangInOut;

class BarangInOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('Admin.Components.Barang_Masuk_keluar.barangInOut',compact('barangs'));
    }


    public function riwayatBarangIn(){
        $barangsIn = BarangInOut::where('jenis', 'masuk')->get();
        return view('Admin.Components.Barang_Masuk_keluar.riwayatBarangIn', compact('barangsIn'));
    }

    public function riwayatBarangOut(){
        $barangsOut = BarangInOut::where('jenis', 'keluar')->get();
        return view('Admin.Components.Barang_Masuk_keluar.riwayatBarangOut', compact('barangsOut'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function barangIn(Request $request) {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);
        
        $barang = Barang::find($request->barang_id);
        
        
        
        BarangInOut::create([
            'barang_id' => $request->barang_id,
            'jenis' => 'masuk',
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ]);
        
        $barang->stok += $request->jumlah;
        
        $barang->save();
        
        return redirect('/admin-gudang/riwayat-barang-in');
    }

}
