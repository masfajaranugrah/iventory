@extends('layouts.app')
@section('title','Dashboard')
@section('logoText','Admin Gudang')
@section('logoTextSub','AG')
@include('Admin.AdminDashboard._side')
@section('main')
<div class="container">
  <div class="row">


    <div class="col-lg-4 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
        <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Barang Masuk</h4>
          </div>
          <div class="card-body">
            {{ $totalBarangMasuk }}

          </div>
          <div class="lorem">
            <a href="{{route('barang-in')}}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
        <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Barang Keluar</h4>
          </div>
          <div class="card-body">
            {{ $totalBarangKeluar }}
          </div>
          <div class="lorem">
            <a href="{{route('barang-out')}}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>


    <div class="col-lg-4 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total pengambilan</h4>
          </div>
          <div class="card-body">
            {{ $totalpengambilan }}
          </div>
          <div class="lorem">
            <a href="{{ route('riwayat-pengambilan-admin') }}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>


    <div class="col-lg-4 col-md-6">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total retur barang</h4>
            </div>
            <div class="card-body">
              {{ $totalreturBarang }}
            </div>
            <div class="lorem">
              <a href="{{ route('riwayat-retur-barang-admin') }}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
