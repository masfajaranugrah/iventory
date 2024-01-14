<!-- Modal untuk setiap barang -->
@foreach($barangs as $item)
<div class="modal fade" id="modalPengambilan{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalPengambilanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengambilanLabel">Pengambilan Barang - {{ $item->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <!-- Isi form pengambilan barang di sini -->
                <form method="POST" action="{{route('simpan-pengambilan-barang')}}">
                @csrf
                <!-- Hidden input untuk mengidentifikasi barang yang diambil -->
                    <input type="hidden" name="barang_id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label for="jumlah_diambil">Jumlah Diambil</label>
                            <input type="number" name="jumlah_diambil" id="jumlah_diambil" class="form-control" required min="0" max="{{ $item->stok }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengambilan">Tanggal Pengambilan</label>
                            <input type="date" name="tanggal_pengambilan" id="tanggal_pengambilan" class="form-control" required value="{{ date('Y-m-d') }}" readonly>
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
@section('title','Pengambilan Barang')
@section('logoText','Karyawan Gudang')
@section('logoTextSub','KG')
@include('Karyawan.KaryawanDashboard._side')
@section('main')
<div class="card ">
                <div class="col-12 col-md-6 col-lg-12 mt-3">
                <div class="card-body p-0">
                    <table id="data-tables" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="centerText">No</th>
                                <th class="centerText">Nama Barang</th>
                                <th class="centerText">Gambar</th>
                                <th class="centerText">Stok Tersedia</th>
                                <th class="centerText">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $item)
                            <tr class="centerText">
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <img src="{{ asset('storage/post-barang-gambar/' . $item->gambar) }}" alt="{{$item->gambar}}" width="100">
                                </td>
                                <td>
                                    <span class="{{ $item->stok == 0 ? 'text-muted' : '' }}">{{ $item->stok ?: '0' }}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn {{ $item->stok > 0 ? 'btn-primary' : 'btn-secondary' }}" {{ $item->stok == 0 ? 'disabled' : '' }} data-toggle="modal" data-target="#modalPengambilan{{ $item->id }}">
                                        {{ $item->stok > 0 ? 'Pengambilan' : 'Stok Habis' }}
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
