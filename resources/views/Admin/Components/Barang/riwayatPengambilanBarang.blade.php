@extends('layouts.app')
@section('title','Riwayat Pengambilan Barang')
@section('logoText','Admin gudang')
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
                    <th  class="centerText">No</th>
                    <th  class="centerText">Nama Pengambil</th>
                    <th class="centerText">Nama Barang</th>
                    <th class="centerText">Jumlah Diambil</th>
                    <th class="centerText">Tanggal Pengambilan</th>
                    <th class="centerText">Status</th>
                    </tr>

                  </thead>
                  @foreach($pengambilanBarangs as $item)
                  <tr class="centerText">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->barang->nama }}</td>
                    <td>{{ $item->jumlah_diambil }}</td>
                    <td>{{ $item->tanggal_pengambilan }}</td>
                    <td>
                        @php
                        $statusClass = [
                            'menunggu disetujui' => 'btn-warning',
                            'disetujui' => 'btn-success',
                            'ditolak' => 'btn-danger',
                        ][$item->status];
                    @endphp

                    <span class="btn {{ $statusClass }} m-2 p-2" style="width:150px;">{{ $item->status }}</span>
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
