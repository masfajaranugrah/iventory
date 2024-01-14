@extends('layouts.app')
@section('title','Dashboard')
@section('logoText','Karyawan Gudang')
@section('logoTextSub','KG')
@include('Karyawan.KaryawanDashboard._side')
@section('main')
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
        <i class="fa-regular fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Barang</h4>
          </div>
          <div class="card-body">
            {{ $totalBarang }}
          </div>
          <div class="lorem">
            <a href="{{ route('view-all-barang') }}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
        <i class="fa-regular fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pengajuan Pengembalian</h4>
          </div>
          <div class="card-body">
            {{ $totalpengambilan }}
          </div>
          <div class="lorem">
            <a href="{{ route('riwayat-pengambilan-barang') }}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
        <i class="fa-regular fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Retur Barang</h4>
          </div>
          <div class="card-body">
           {{$totalreturBarang}}
          </div>
          <div class="lorem">
            <a href="{{ route('riwayat-retur-barang-karyawan') }}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>




  </div>
</div>
@endsection
