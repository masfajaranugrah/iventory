@if(session('success'))
<div class="alert z-3 " role="alert" id="alert">
  <div  class="setmolder alert-success">
    {{toastr()->success('success')}}
  </div>
</div>
@endif
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('simpan-barang')}}" method="POST" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Contoh : Sapu" id="nama" name="nama" value="">
                            </div>
                            <div class="form-group">
                            <label for="kategori">Kategori Barang</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <option value="">Masukan Kategori Barang</option>
                                @foreach($kategoris as $kategori)
                                <option value="{{$kategori->id}}"   {{old('kategori') == $kategori->id ? 'selected' : null}}>{{$kategori->nama}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="satuan">Satuan Barang</label>
                            <select class="form-control" name="satuan" id="satuan">
                                <option value="">Masukan satuan Barang</option>
                                @foreach($satuans as $satuan)
                                <option value="{{$satuan->id}}"   {{old('satuan') == $satuan->id ? 'selected' : null}}>{{$satuan->simbol}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" placeholder="Contoh : Sapu ijuk" id="deskripsi" name="deskripsi" value="">
                            </div>
                            <div class="form-group">
                                <label for="stok">Jumlah:</label>
                                <input type="number" class="form-control" id="stok" name="stok" min="0">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearFormFields()">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit -->
@foreach($barangs as $barang)
<div class="modal fade" id="edit-modal-{{ $barang->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('edit-barang', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori Barang</label>
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == $barang->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan_id">Satuan Barang</label>
                        <select class="form-control" id="satuan_id" name="satuan_id">
                            @foreach($satuans as $satuan)
                                <option value="{{ $satuan->id }}" {{ $satuan->id == $barang->satuan_id ? 'selected' : '' }}>{{ $satuan->simbol }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $barang->deskripsi }}">
                    </div>
                    <div class="form-group">
                                <label for="stok">Jumlah:</label>
                                <input type="number" class="form-control" id="stok" name="stok" min="0" value="{{$barang->stok}}">
                            </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        @if ($barang->gambar)
                            <div class="mt-2">
                                <strong>Gambar Sebelumnya:</strong>
                                <br>
                                <img src="{{ asset('storage/post-barang-gambar/' . $barang->gambar) }}" alt="Gambar Barang" width="100">
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
@extends('layouts.app')
@section('title','Input Barang')
@section('logoText','Admin Gudang')
@section('logoTextSub','AG')
@include('Admin.AdminDashboard._side')
@section('main')

<div class="card">
 <div class="col-12 col-md-6 col-lg-12">
    <div>
        <div class="card-header justify-content-end">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah Barang</button>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th class="centerText">No</th>
                    <th class="centerText">Nama Barang</th>
                    <th class="centerText">Kategori Barang</th>
                    <th class="centerText">Satuan Barang</th>
                    <th class="centerText">Deskripsi</th>
                    <th class="centerText">Stok</th>
                    <th class="centerText">Gambar</th>
                    <th class="centerText">Aksi</th>
                    </tr>

                  </thead>
                  @foreach($barangs as $barang)
                  <tr class="centerText">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$barang->nama}}</td>
                    <td>{{$barang->kategori->nama}}</td>
                    <td>{{$barang->satuan->simbol}}</td>
                    <td>{{$barang->deskripsi}}</td>
                    <td>{{ $barang->stok === 0 ? 'Stok Habis' : max(0, $barang->stok) }}</td>
                    <td>
                    <img src="{{ asset('storage/post-barang-gambar/' . $barang->gambar) }}" alt="{{$barang->gambar}}" class="img-fluid chocolat-image" width="100">
                    </td>
                    <td style="text-align:center">
                      <button href="#" class="btn btn-warning" style="width:100px">
                          <a href="" class='text-white' data-toggle="modal" data-target="#edit-modal-{{ $barang->id }}"><i class="far fa-edit mr-3"></i>Edit</a>
                      </button>
                      <button  class="btn btn-danger" style="width:100px">
                          <a href="{{route('hapus-barang',+ $barang->id)}}" class='text-white confirm-delete'><i class="far fa-trash-alt mr-2"></i>Hapus</a>
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
