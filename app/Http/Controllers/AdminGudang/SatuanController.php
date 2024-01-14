<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Satuan;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuans = Satuan::all();
        return view("Admin.Components.Master_data.satuan", compact('satuans'));
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
            'simbol' => 'required',
            'deskripsi' => 'required',
        ]);

        Satuan::create([
            'simbol' => $request->simbol,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('admin-gudang/satuan-barang')->with('success', 'create new satuan success ');
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
        $satuans =  Satuan::find($id)->update($request->all());

        return redirect('admin-gudang/satuan-barang')->with('success', 'update satuan success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Satuan::find($id)->delete();
        return redirect('admin-gudang/satuan-barang')->with('success', 'delete satuan success ');
    }
}
