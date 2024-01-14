<!-- Modal untuk setiap barang -->
@foreach($pengambilanBarangs as $item)
<div class="modal fade" id="modalPengembalian{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalPengembalianLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengembalianLabel">Retur Barang - {{ $item->barang->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('simpan-retur-barang')}}" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="pengambilanBarang_id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label for="jumlah_pengembalian">Jumlah Dikembalikan</label>
                            <input type="number" name="jumlah_pengembalian" id="jumlah_pengembalian" class="form-control" required min="0" max="{{ $item->jumlah_diambil }}" placeholder="Masukkan jumlah dikembalikan">
                        </div>
                        <div class="form-group">
                            <label for="alasan_pengembalian">Alasan Dikembalikan</label>
                            <input type="text" name="alasan_pengembalian" id="alasan_pengembalian" class="form-control" placeholder="Masukkan alasan">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengembalian">Tanggal Dikembalikan</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" required value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
            </div>
    </div>
</div>
@endforeach
@extends('layouts.app')
@section('title','Retur Barang')
@section('logoText','Karyawan Gudang')
@section('logoTextSub','KG')
@include('Karyawan.KaryawanDashboard._side')
@section('main')
<div class="card mt-12">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card-body p-0">
            <table id="data-tables" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                    <th class="centerText">No</th>
                    <th class="centerText">Nama Pengambil</th>
                    <th class="centerText">Nama Barang</th>
                    <th class="centerText">Jumlah Diambil</th>
                    <th class="centerText">Tanggal Pengambilan</th>
                    <th class="centerText">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengambilanBarangs as $item)
                        <tr class="centerText">
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->barang->nama }}</td>
                            <td>{{ $item->jumlah_diambil }}</td>
                            <td>{{ $item->tanggal_pengambilan }}</td>
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPengembalian{{ $item->id }}">
                                        Kembalikan
                            </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
