@extends('layouts.app')
@section('title','Riwayat Pengambilan Barang')
@section('logoText','Karyawan Gudang')
@section('logoTextSub','KG')
@include('Karyawan.KaryawanDashboard._side')
@section('main')
<div class="card pt-3">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card-body p-0">
            <table id="data-tables" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Nama Pengambil</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Diambil</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengambilanBarangs as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->barang->nama }}</td>
                            <td>
                                @if($item->jumlah_diambil > 0)
                                    {{ $item->jumlah_diambil }}
                                @else
                                    <span style="color: red;">Sudah Dikembalikan Semua</span>
                                @endif
                            </td>
                            <td>{{ $item->tanggal_pengambilan }}</td>
                            <td>
                                @php
                                $statusClass = [
                                    'menunggu disetujui' => 'btn-warning',
                                    'disetujui' => 'btn-success',
                                    'ditolak' => 'btn-danger',
                                ][$item->status];
                            @endphp

                            <span class="btn {{ $statusClass }} m-2 p-2" style="width:150px;">{{ $item->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
