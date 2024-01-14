@extends('layouts.app')
@section('title','Acc Pengambilan Barang')
@section('logoText','Admin Gudang')
@section('logoTextSub','AG')
@include('Admin.AdminDashboard._side')
@section('main')
            <div class="card mt-3">
                <div class="card-body">
                    <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="centerText">Nama Pengambil</th>
                                <th class="centerText">Nama Barang</th>
                                <th class="centerText">Jumlah Diambil</th>
                                <th class="centerText">Tanggal Pengambilan</th>
                                <th class="centerText">Status</th>
                                <th class="centerText">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengambilanBarangs as $item)
                                <tr class="centerText">
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->barang->nama }}</td>
                                    <td>{{ $item->jumlah_diambil }}</td>
                                    <td>{{ $item->tanggal_pengambilan }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                    @if ($item->status === 'menunggu disetujui')
                                        <form method="POST" action="{{route('pengambilan-barang-disetujui', $item->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-lg" style="width:150px;">Disetujui</button>
                                        </form>
                                        <form method="POST" action="{{route('pengambilan-barang-ditolak', $item->id)}}">
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

@endsection

