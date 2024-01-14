<div class="main-sidebar disply" style="display: none;">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="" class="logo">@yield('logoText')</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">@yield('logoTextSub')</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
          <li class="active"><a class="nav-link" href="{{route("manager-gudang")}}"><i class="fas fa-home"></i>
            <span>Dashboard</span></a></li>
          <li class="menu-header">Website</li>
          <li><a class="nav-link" href="{{route('stok')}}"><i class="fa-sharp fa-solid fa-eye"></i><span>Lihat Stok Barang</span></a></li>
          <li><a class="nav-link" href="{{route('laporan-manager')}}"><i class="fa-sharp fa-solid fa-print"></i><span>Cetak laporan Barang</span></a></li>
          <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-sharp fa-solid fa-rotate-left"></i><span>Retur Barang</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('acc-retur-barang-manager')}}"><i class="fa-sharp fa-solid fa-check-double"></i><span>Acc Retur Barang </span></a></li>
                  <li><a class="nav-link" href="{{route('riwayat-retur-barang-manager')}}"><i class="fa-sharp fa-solid fa-book-medical"></i><span>Riwayat Retur</span></a></li>
                </ul>
          </li>
      </ul>
    </aside>
  </div>
