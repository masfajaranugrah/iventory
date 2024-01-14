@foreach($barangs as $item)
<!-- barang masuk -->
<div class="modal fade" id="barang-masuk-modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalPengambilanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengambilanLabel">Barang Masuk - {{ $item->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('simpan-barang-masuk')}}" id="myForm">
                @csrf
                    <input type="hidden" name="barang_id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label for="jumlah">Jumlah Masuk</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" min="0" required >
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Masuk</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearFormFields()">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
            </div>
    </div>
</div>


@endforeach

@extends('layouts.app')
@section('title','Barang Masuk')
@section('logoText','Admin Gudang')
@section('logoTextSub','AG')
@include('Admin.AdminDashboard._side')
@section('main')

<div class="card">
 <div class="col-12 col-md-6 col-lg-12 mt-3">
    <div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                       <th class="centerText">No</th>
                    <th class="centerText">Nama Barang</th>
                    <th class="centerText">Deskripsi</th>
                    <th class="centerText">Stok</th>
                    <th class="centerText">Gambar</th>
                    <th class="centerText">Aksi</th>
                    </tr>

                  </thead>
                  @foreach($barangs as $item)
                  <tr  class="centerText">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>{{ $item->stok === 0 ? 'Stok Habis' : max(0, $item->stok) }}</td>
                  <td>
                  <img src="{{ asset('storage/post-barang-gambar/' . $item->gambar) }}" alt="{{$item->gambar}}" class="img-fluid chocolat-image" width="100">
                  </td>
                    <td style="text-align:center">
                            <button type="submit" class="btn btn-success btn-lg" style="width:150px;">
                              <a href="" class='text-white' data-toggle="modal" data-target="#barang-masuk-modal{{$item->id}}">Masuk</a>
                            </button>
                    </td>
                  </tr>
                  @endforeach
                </table>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

