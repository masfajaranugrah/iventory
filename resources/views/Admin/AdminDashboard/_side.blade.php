<div class="main-sidebar" style="display: none;" >
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="" class="logo">@yield('logoText')</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">@yield('logoTextSub')</a>
          </div>
          <ul class="sidebar-menu" >
            <li class="menu-header">Dashboard</li>
              <li class="active"><a class="nav-link" href="{{route('dashboard-gudang')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Website</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown dropdown-toggle dropdown-arrow">
                    <i class="fa-sharp fa-solid fa-boxes-stacked"></i><span>Modul Gudang</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link text-black" href="{{route('barang-gudang')}}"><i class="fa-sharp fa-solid fa-file-import "></i><span>Input Barang</span></a></li>
                  <li><a class="nav-link" href="{{route('riwayat-pengambilan-admin')}}"><i class="fa-sharp fa-solid fa-book-medical "></i><span>Riwayat Pengambilan</span></a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown dropdown-toggle dropdown-arrow">
                    <i class="fa-sharp fa-solid fa-right-left"></i><span>Barang Masuk & Keluar</span>
                </a>

                <ul class="dropdown-menu">

                  <li><a class="nav-link text-black" href="{{route('barang-in-out')}}"><i class="fa-sharp fa-solid fa-file-import "></i><span>Barang Masuk</span></a></li>
                  <li><a class="nav-link" href="{{route('barang-in')}}"><i class="fa-sharp fa-solid fa-book-medical "></i><span>Riwayat Barang Masuk</span></a></li>
                  <li><a class="nav-link" href="{{route('barang-out')}}"><i class="fa-sharp fa-solid fa-book-medical "></i><span>Riwayat Barang Keluar</span></a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown dropdown-toggle dropdown-arrow">
                    <i class="fa-sharp fa-solid fa-people-carry-box"></i><span>Acc Pengambilan</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('acc-pengambilan-barang')}}"><i class="fa-sharp fa-solid fa-people-carry-box"></i><span>Acc Pengambilan</span></a></li>
                  <li><a class="nav-link" href="{{route('riwayat-pengambilan-admin')}}"><i class="fa-sharp fa-solid fa-book-medical "></i><span>Riwayat Pengambilan</span></a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown dropdown-toggle dropdown-arrow">
                    <i class="fa-sharp fa-solid fa-truck-ramp-box"></i><span>Acc Retur</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('acc-retur-barang-admin')}}"><i class="fa-sharp fa-solid fa-right-left"></i><span>Acc Retur Barang</span></a></li>
                  <li><a class="nav-link" href="{{route('riwayat-retur-barang-admin')}}"><i class="fa-sharp fa-solid fa-book-medical "></i><span>Riwayat Retur Barang</span></a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="{{route('laporan-admin')}}"><i class="fa-sharp fa-solid fa-print"></i> <span>Laporan</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown dropdown-toggle dropdown-arrow">
                    <i class="fa-sharp fa-solid fa-database"></i><span>Master Data</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link text-black" href="{{route('kategori-barang')}}"><i class="fa-sharp fa-solid fa-network-wired"></i><span>Kategori</span></a></li>
                  <li><a class="nav-link text-black" href="{{route('satuan-barang')}}"><i class="fa-sharp fa-solid fa-vector-square"></i><span>Satuan</span></a></li>
                </ul>
              </li>
                <li><a class="nav-link" href="/admin-gudang/cerateAccount"><i class="fa-sharp fa-solid fa-id-card"></i><span>Register</span></a></li>
          </ul>
        </aside>
      </div>
</div>
