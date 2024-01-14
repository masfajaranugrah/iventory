@extends('layouts.app')
@section('title','Dashboard')
@section('logoText','manager Gudang')
@section('logoTextSub','KG')
@include('Manager.ManagerDashboard._side')
@section('main')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
        <i class="fa-regular fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Stok Barang</h4>
          </div>
          <div class="card-body">
            {{ $totalBarang }}
          </div>
          <div class="lorem">
            <a href="{{ route('stok') }}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
        <i class="fa-regular fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total retur barang</h4>
          </div>
          <div class="card-body">
            {{ $totalPengembalian }}
          </div>
          <div class="lorem">
            <a href="{{ route('riwayat-retur-barang-manager') }}" class="text-decoration-none"><span>view more<i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>






  </div>
</div>
@endsection
