<div class="main-sidebar" style="display: none">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="" class="logo">@yield('logoText')</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">@yield('logoTextSub')</a>
          </div>
          <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
              <li class="active"><a class="nav-link" href="{{route("karyawan-gudang")}}"><i class="fas fa-home"></i>
                <span>Dashboard</span></a></li>
              <li class="menu-header">Website</li>
              <li><a class="nav-link" href="{{route('view-all-barang')}}"><i class="fa-sharp fa-solid fa-eye"></i><span>Lihat Barang</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown dropdown-toggle dropdown-arrow">
                    <i class="fa-solid fa-truck-ramp-box"></i><span>Pengambilan Barang</span>
                </a>
                <ul class="dropdown-menu " aria-haspopup="true" aria-expanded="false">
                  <li><a class="nav-link" href="{{route('pengambilan-barang')}}">   <i class="fa-solid fa-truck-ramp-box"></i><span>Pengambilan Barang</span></a></li>
                  <li><a class="nav-link" href="{{route('riwayat-pengambilan-barang')}}"><i class="fa-sharp fa-solid fa-book-medical"></i><span> Riwayat Pengambilan</span></a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown dropdown-toggle dropdown-arrow">
                    <i class="fa-sharp fa-solid fa-rotate-left"></i><span>Retur Barang</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('retur-barang') }}"><i class="fa-sharp fa-solid fa-rotate-left"></i><span>Retur Barang</span></a></li>
                    <li><a class="nav-link" href="{{ route('riwayat-retur-barang-karyawan') }}"><i class="fa-sharp fa-solid fa-book-medical"></i><span>Riwayat Retur</span></a></li>
                </ul>
            </li>

          </ul>
        </aside>
      </div>
