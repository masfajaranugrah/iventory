<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Models\AdminGudang\Kategori;
use App\Models\AdminGudang\Satuan;
use Illuminate\Support\Facades\Storage;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        return view('Admin.Components.Barang.InputBarang', compact('barangs','kategoris','satuans'));
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
            'nama' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar');

        if ($gambar) {
            $file_name = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/post-barang-gambar', $file_name);

            Barang::create([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori,
                'satuan_id' => $request->satuan,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
                'gambar' => $file_name,
            ]);
        }

        return redirect('admin-gudang/barang-gudang')->with('success', 'create new barang success ');
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
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'satuan_id' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::find($id);

        if (!$barang) {
            return redirect('admin-gudang/barang-gudang');
        }

        $gambarSebelumnya = $barang->gambar;

        $barang->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'satuan_id' => $request->satuan_id,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);

        if ($request->hasFile('gambar')) {
            if ($gambarSebelumnya) {    
                Storage::delete('public/post-barang-gambar/' . $gambarSebelumnya);
            }

            $gambar = $request->file('gambar');
            $file_name = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/post-barang-gambar', $file_name);

            $barang->update(['gambar' => $file_name]);
        }

        return redirect('admin-gudang/barang-gudang')->with('success', 'update barang success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect('admin-gudang/barang-gudang');
        }

        if ($barang->gambar) {
            Storage::delete('public/post-barang-gambar/' . $barang->gambar);
        }

        $barang->delete();

        return redirect('admin-gudang/barang-gudang')->with('success', 'delete barang success ');
    }
}