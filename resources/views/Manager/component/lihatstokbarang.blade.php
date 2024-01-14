@extends('layouts.app')
@section('title','Lihat Stok Barang')
@section('logoText','Manager Gudang')
@section('logoTextSub','MG')
@include('Manager.ManagerDashboard._side')
@section('main')
<div class="card mt-12">
                <div class="col-12 col-md-6 col-lg-12">
                <div class="card-body p-0">
                    <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="centerText">No</th>
                                <th class="centerText" >Gambar</th>
                                <th class="centerText">Nama Barang</th>
                                <th class="centerText" >Deskripsi</th>
                                <th class="centerText" >Stok</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($barangs as $item)
                        <tr class="centerText">
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{ asset('storage/post-barang-gambar/' . $item->gambar) }}" alt="{{$item->gambar}}" class="img-fluid chocolat-image" width="100">
                                </td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->deskripsi}}</td>
                            <td>{{ $item->stok}}</td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
@endsection
