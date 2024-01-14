<?php

namespace App\Http\Controllers\Manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ExportLaporan;
use App\Models\AdminGudang\Barang;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AdminGudang\BarangInOut;

class LaporanBarangController extends Controller
    {
        public function index(Request $request)
        {
            $filter = BarangInOut::query();

            if ($request->has('filter')) {
                if ($request->filter == 'hariIni') {
                    $filter->whereDate('created_at', Carbon::today());
                } elseif ($request->filter == 'bulanIni') {
                    $filter->whereMonth('created_at', Carbon::now()->month);
                } elseif ($request->filter == 'tahunIni') {
                    $filter->whereYear('created_at', Carbon::now()->year);
                }
            }


            if ($request->jenisBarang == 'BarangMasuk') {
                $filter->where('jenis', 'masuk');
                $judulLaporan = 'Laporan Barang Masuk';
            } elseif ($request->jenisBarang == 'BarangKeluar') {
                $filter->where('jenis', 'keluar');
                $judulLaporan = 'Laporan Barang Keluar';
            }else {
                // Jika jenis barang tidak valid, berikan judul default atau tangani kasus lainnya
                $judulLaporan = 'Laporan Barang';
            }


            $filterResults = $filter->get();
            $noDataMessage = $filterResults->isEmpty() ? 'Tidak ada data ditemukan' : 'Data ditemukan sesuai filter yang dipilih.';

            if ($request->has('export') && $request->export == 'true') {
                return Excel::download(new ExportLaporan($filter,  $judulLaporan), 'laporan_barang.xlsx');
            }
            return view('manager.component.cetaklaporanstok', [
                'filterResults' => $filterResults,
                'noDataMessage' => $noDataMessage,
            ]);
        }
    }
