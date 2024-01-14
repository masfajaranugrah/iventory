@extends('layouts.app')
@section('title','Cetak Barang')
@section('logoText','Manager Gudang')
@section('logoTextSub','MG')
@include('Manager.ManagerDashboard._side')
@section('main')
    <div class="row">
        <div class="col-md-12">
<div class="card">
    <div class="col-12 col-md-6 col-lg-12">
        <div>
     <form action="{{ route('laporan-manager') }}" method="get" class="form-inline justify-content-end mt-4">
    @csrf
    <div class="form-group mx-sm-3 mb-2 ">
        <label for="filter" class="mr-2">Pilih Filter:</label>
        <select name="filter" id="filter" class="form-control">
            <option value="hariIni" {{ request('filter') == 'hariIni' ? 'selected' : '' }}>Hari Ini</option>
            <option value="bulanIni" {{ request('filter') == 'bulanIni' ? 'selected' : '' }}>Bulan Ini</option>
            <option value="tahunIni" {{ request('filter') == 'tahunIni' ? 'selected' : '' }}>Tahun Ini</option>
        </select>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="jenisBarang" class="mr-2">Pilih Jenis Barang:</label>
        <select name="jenisBarang" id="jenisBarang" class="form-control">
            <option value="BarangMasuk" {{ request('jenisBarang') == 'BarangMasuk' ? 'selected' : '' }}>Masuk</option>
            <option value="BarangKeluar" {{ request('jenisBarang') == 'BarangKeluar' ? 'selected' : '' }}>Keluar</option>
        </select>
    </div>
            <button type="submit" class="btn btn-primary mb-2 mr-2">Filter</button>
            <button type="submit" name="export" value="true" class="btn btn-success mb-2">Export</button>
        </form>


            <table id="data" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="centerText">No</th>
                        <th class="centerText">Nama</th>
                        <th class="centerText">kategori</th>
                        <th class="centerText">Satuan</th>
                        <th class="centerText">Description</th>
                        <th class="centerText">Stok</th>
                        <th class="centerText">Tanggal</th>
                        <th class="centerText">Waktu</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($filterResults as $item )
                        <tr class="centerText">
<td>{{$loop->iteration}}</td>
                        <td>{{ $item->barang->nama }}</td>
                     <td>{{ $item->barang->kategori->nama }}</td>
                        <td>{{ $item->barang->satuan->simbol }}</td>
                        <td>{{ $item->barang->deskripsi }}</td>
                        <td>{{ $item->jumlah}}</td>
                        <td>{{ \Carbon\Carbon::parse($item->crated_at)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection


