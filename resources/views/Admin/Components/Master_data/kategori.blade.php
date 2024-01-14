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
                        <h5 class="modal-title" id="judulModal">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('simpan-kategori')}}" method="POST" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" placeholder="Contoh : Kebersihan" id="nama" name="nama" value="">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" placeholder="Contoh : Kebersihan Kamar" id="deskripsi" name="deskripsi" value="">
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearFormFields()">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                    </div>
                    </div>
                </div>
</div>

<!-- modal edit kategori -->
@foreach($kategoris as $kategori)
<div class="modal fade" id="edit-modal-{{$kategori->id}}" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('edit-kategori', $kategori->id)}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" placeholder="Contoh : Kebersihan" id="nama" name="nama" value="{{$kategori->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" placeholder="Contoh : Kebersihan Kamar" id="deskripsi" name="deskripsi" value="{{$kategori->deskripsi}}">
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id='closePopup' data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                    </div>
                    </div>
                </div>
</div>
@endforeach
@extends('layouts.app')
@section('title','Kategori')
@section('logoText','Admin Gudang')
@section('logoTextSub','AG')
@include('Admin.AdminDashboard._side')
@section('main')

@section('main')
<div class="card">
  <div class="col-12 col-md-6 col-lg-12">
    <div >
      <div class="card-header justify-content-end">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
        Tambah Kategori
    </button>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <th class="centerText">No</th>
              <th class="centerText">Nama Kategori</th>
              <th class="centerText">Deskripsi</th>
              <th class="centerText">Aksi</th>
            </thead>
            @foreach($kategoris as $kategori)
            <tr class="centerText">
              <td>{{$loop->iteration}}</td>
              <td>{{$kategori->nama}}</td>
              <td>{{$kategori->deskripsi}}</td>
              <td style="text-align:center">
                <button href="#" class="btn btn-warning" style="width:100px" data-toggle="modal" data-target="#edit-modal-{{ $kategori->id }}"><i class="far fa-edit mr-3"></i>Edit</button>
                <button  class="btn btn-danger" style="width:100px"> <a href="{{route('hapus-kategori',+ $kategori->id)}}" class='text-white confirm-delete'>
                <i class="far fa-trash-alt mr-2"></i>Hapus</a></button>
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

