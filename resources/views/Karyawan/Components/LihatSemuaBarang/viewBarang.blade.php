@extends('layouts.app')
@section('title','Lihat Stok Barang')
@section('logoText','Karyawan Gudang')
@section('logoTextSub','KG')
@include('Karyawan.KaryawanDashboard._side')
@section('main')
<div class="card mt-3">
    <div class="col-12 col-md-6 col-lg-12 mt-3">
       <div>
           <div class="card-body p-0">
             <div class="table-responsive">
               <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                       <tr>
                        <th class="centerText">No</th>
                        <th class="centerText">Images</th>
                        <th class="centerText">nama barang</th>
                        <th class="centerText">kategory</th>
                        <th class="centerText">satuan</th>
                        <th class="centerText">description</th>
                       </tr>

                     </thead>
                     @foreach ($viewbarangs as $view)
                     <tr class="centerText">
                        <td>{{$loop->iteration}}</td>
                            <td class="marg border">
                                <img src="{{ asset('storage/post-barang-gambar/' . $view->gambar) }}"
                                    alt="{{ $view->gambar }}" width="100">
                            </td>
                            <td class="border">{{ $view->nama }}</td>
                            <td class="border">{{ $view->kategori->nama }}</td>
                            <td class="border">{{ $view->satuan->simbol }}</td>
                            <td class="border">{{ $view->deskripsi }}</td>
                     </tr>
                     @endforeach
                   </table>
             </div>
           </div>
         </div>
       </div>
   </div>
   @endsection
