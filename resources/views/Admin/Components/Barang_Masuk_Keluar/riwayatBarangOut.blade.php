@extends('layouts.app')
@section('title','Riwayat Barang Keluar')
@section('logoText','Admin Gudang')
@section('logoTextSub','AG')
@include('Admin.AdminDashboard._side')
@section('main')
<div class="card pt-3">
                <div class="col-12 col-md-6 col-lg-12">
                <div class="card-body p-0">
                    <table id="data-tables" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="centerText">No</th>
                                <th class="centerText">Nama Barang</th>
                                <th class="centerText">Jenis</th>
                                <th class="centerText">Jumlah Keluar</th>
                                <th class="centerText">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangsOut as $item)
                                <tr class="centerText">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->barang->nama }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->crated_at)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
@endsection
