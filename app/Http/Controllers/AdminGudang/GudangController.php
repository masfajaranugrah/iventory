<?php

namespace App\Http\Controllers\AdminGudang;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
    $totalAdmin = User::where('role', 'admin')->count();
    $totalKaryawan = User::where('role', 'karyawan')->count();
    $totalBarang = Barang::all()->count();
    return view("gudang.dashboardGudang",
    [
    'totaladmin' => $totalAdmin,
    'totalkaryawan' => $totalKaryawan, 
    'total' => $totalBarang,
]);
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
        //
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
