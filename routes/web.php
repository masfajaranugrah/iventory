<?php

use App\Http\Middleware\Admin;
use App\Http\Controllers\ProfileUser;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\manager\ViewStokController;
use App\Http\Controllers\ForgetPassContoller;
use App\Http\Controllers\err\Err403Controller;
use App\Http\Controllers\AdminGudang\LaporanController;
use App\Http\Controllers\AdminGudang\AccPengambilanBarangController;
use App\Http\Controllers\AdminGudang\BarangController;
use App\Http\Controllers\AdminGudang\BarangInOutController;
use App\Http\Controllers\AdminGudang\AdminController;
use App\Http\Controllers\AdminGudang\SatuanController;
use App\Http\Controllers\AdminGudang\KategoriController;
use App\Http\Controllers\AdminGudang\CreateAccountController;
use App\Http\Controllers\Manager\StokBarangController;
use App\Http\Controllers\Manager\LaporanBarangController;
use App\Http\Controllers\Manager\ManagerDashboard;
use App\Http\Controllers\Karyawan\ViewBarangController;
use App\Http\Controllers\Karyawan\PengambilanBarangController;
use App\Http\Controllers\Karyawan\ReturBarangController;
use App\Http\Controllers\Karyawan\KaryawanController;
use App\Http\Controllers\ReturBarang\AccReturBarangController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// auth
    Route::get('/', function () {
        return redirect('/login');
    });

    Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest') ;
    Route::post('/login', [LoginController::class, 'loginuser']) ;

   //403
    Route::get('/403', [Err403Controller::class, 'index'])->name('err403');

    Route::post('/logout',  [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['auth','Role:admin'])->group(function () {
        // gudang
        Route::get('/admin-gudang', [AdminController::class, 'index'])->name('dashboard-gudang');
        // barang
        Route::get('/admin-gudang/barang-gudang', [BarangController::class, 'index'])->name('barang-gudang');
        Route::post('simpan-barang', [BarangController::class, 'store'])->name('simpan-barang');
        Route::patch('/admin-gudang/barang/{id}/update', [BarangController::class, 'update'])->name('edit-barang');
        Route::get('/admin-gudang/barang/{id}/destroy',[BarangController::class,'destroy'])->name('hapus-barang');
        Route::get('/admin-gudang/barang-in-out', [BarangInOutController::class, 'index'])->name('barang-in-out');
        // Kategori
        Route::get('/admin-gudang/kategori-barang', [KategoriController::class, 'index'])->name('kategori-barang');
        Route::post('simpan-kategori',[KategoriController::class,'store'])->name('simpan-kategori');
        Route::get('/admin-gudang/kategori-barang/{id}/destroy',[KategoriController::class,'destroy'])->name('hapus-kategori');
        Route::patch('/admin-gudang/kategori-barang/{id}/update',[KategoriController::class,'update'])->name('edit-kategori');
        // satuan
        Route::get('/admin-gudang/satuan-barang', [SatuanController::class, 'index'])->name('satuan-barang');
        Route::post('simpan-satuan',[SatuanController::class,'store'])->name('simpan-satuan');
        Route::get('/admin-gudang/satuan-barang/{id}/destroy',[SatuanController::class,'destroy'])->name('hapus-satuan');
        Route::patch('/admin-gudang/satuan-barang/{id}/update',[SatuanController::class,'update'])->name('edit-satuan');
        // create user
        Route::get('/admin-gudang/cerateAccount',[CreateAccountController::class,'create'])->name('create');
        Route::post('/admin-gudang/cerateAccount',[CreateAccountController::class,'register'])->name('register');
        Route::patch('/admin-gudang/cerateAccount/{id}/update',[CreateAccountController::class,'update'])->name('edit-user');
        Route::get('/admin-gudang/cerateAccount/{id}/destroy',[CreateAccountController::class,'destroy'])->name('hapus-user');
        // acc pengambilan
        Route::get('/admin-gudang/acc-pengambilan-barang', [AccPengambilanBarangController::class, 'index'])->name('acc-pengambilan-barang');
        Route::post('/admin-gudang/pengambilan-approve/{id}',[AccPengambilanBarangController::class, 'approve'])->name('pengambilan-barang-disetujui');
        Route::post('/admin-gudang/pengambilan-reject/{id}',[AccPengambilanBarangController::class, 'reject'])->name('pengambilan-barang-ditolak');
        Route::get('/admin-gudang/riwayat-pengambilan', [AccPengambilanBarangController::class, 'getRiwayatPengambilanBarang'])->name('riwayat-pengambilan-admin');
        // barang in out
        Route::get('/admin-gudang/barang-in-out', [BarangInOutController::class, 'index'])->name('barang-in-out');
        Route::post('simpan-barang-masuk',[BarangInOutController::class, 'barangIn'])->name('simpan-barang-masuk');
        Route::post('simpan-barang-keluar',[BarangInOutController::class, 'barangOut'])->name('simpan-barang-keluar');
        Route::get('/admin-gudang/riwayat-barang-in', [BarangInOutController::class, 'riwayatBarangIn'])->name('barang-in');
        Route::get('/admin-gudang/riwayat-barang-out', [BarangInOutController::class, 'riwayatBarangOut'])->name('barang-out');
        // acc retur barang
        Route::get('/admin-gudang/acc-retur-barang-admin', [AccReturBarangController::class, 'index'])->name('acc-retur-barang-admin');
        Route::post('/admin-gudang/retur-approve/{id}', [AccReturBarangController::class, 'approve'])->name('retur-barang-disetujui-admin');
        Route::post('/admin-gudang/retur-reject/{id}', [AccReturBarangController::class, 'reject'])->name('retur-barang-ditolak-admin');
        Route::get('/admin-gudang/riwayat-retur-barang', [AccReturBarangController::class, 'getRiwayatReturBarang'])->name('riwayat-retur-barang-admin');
        // laporan
        Route::get('/admin-gudang/laporan',[LaporanController::class,'index'])->name('laporan-admin');

    });



// Karyawan
    Route::middleware(['auth','Role:karyawan'])->group(function () {
    // dashboard
        Route::get('/karyawan-gudang', [KaryawanController::class, 'index'])->name('karyawan-gudang');
        Route::get('/karyawan-gudang/view-all-barang', [ViewBarangController::class, 'viewall'])->name('view-all-barang');
    // Peminjaman Barang
        Route::get('/karyawan-gudang/pengambilan-barang', [PengambilanBarangController::class, 'index'])->name('pengambilan-barang');
        Route::get('/karyawan-gudang/riwayat-pengambilan-barang', [PengambilanBarangController::class, 'getRiwayatPengambilanBarang'])->name('riwayat-pengambilan-barang');
        Route::post('simpan-pengambilan-barang',[PengambilanBarangController::class,'store'])->name('simpan-pengambilan-barang');
    // Return Barang
        Route::get('/karyawan-gudang/retur-barang', [ReturBarangController::class, 'index'])->name('retur-barang');
        Route::post('simpan-retur-barang', [ReturBarangController::class, 'store'])->name('simpan-retur-barang');
        Route::get('/karyawan-gudang/riwayat-retur-barang', [ReturBarangController::class, 'getRiwayatReturBarang'])->name('riwayat-retur-barang-karyawan');
    });

    //manager
        Route::middleware(['auth', 'Role:manager'])->group(function () {
    // dashboard
        Route::get('/manager-gudang', [ManagerDashboard::class, 'dashboard'])->name('manager-gudang');
    // lihat stok barang
        Route::get('/manager-gudang/lihat-stok-barang', [ViewStokController::class, 'index'])->name('stok');
    // cetak laporan
        Route::get('/manager-gudang/cetak-laporan-barang', [LaporanBarangController::class, 'index'])->name('laporan-manager');
    //acc pengembalian
        Route::get('/manager-gudang/retur-barang', [AccReturController::class, 'retur'])->name('retur');
   //retur barang
        Route::get('/manager-gudang/acc-retur-barang-manager', [AccReturBarangController::class, 'index'])->name('acc-retur-barang-manager');
        Route::post('/manager-gudang/approve/{id}', [AccReturBarangController::class, 'approve'])->name('retur-barang-disetujui-manager');
        Route::post('/manager-gudang/reject/{id}', [AccReturBarangController::class, 'reject'])->name('retur-barang-ditolak-manager');
        Route::get('/manager-gudang/riwayat-retur-barang', [AccReturBarangController::class, 'getRiwayatReturBarang'])->name('riwayat-retur-barang-manager');
    // export
        Route::get('/manager-gudang/exporttoExcel', [LaporanBarangController::class, 'exportDataLaporan'])->name('export');

    });


