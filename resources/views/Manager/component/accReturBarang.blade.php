@extends('layouts.app')
@section('title','Acc Retur Barang')
@section('logoText','Manager Gudang')
@section('logoTextSub','MG')
@include('manager.ManagerDashboard._side')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="centerText">Nama Pengambil</th>
                                <th class="centerText">Nama Barang</th>
                                <th class="centerText">Jumlah Pengembalan</th>
                                <th class="centerText">Tanggal Pengembalian</th>
                                <th class="centerText">Status</th>
                                <th class="centerText">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($returBarangs as $item)
                                <tr class="centerText">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->pengambilanBarang->barang->nama }}</td>
                                    <td>{{ $item->jumlah_pengembalian }}</td>
                                    <td>{{ $item->tanggal_pengembalian }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        @if ($item->status === 'menunggu disetujui')
                                        <form method="POST" action="{{route('retur-barang-disetujui-manager', $item->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-lg" style="width:150px;">Disetujui</button>
                                        </form>
                                        <form method="POST" action="{{route('retur-barang-ditolak-manager', $item->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-lg" style="width:150;">Ditolak</button>
                                        </form>
                                        @endif
                                    </td>
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
