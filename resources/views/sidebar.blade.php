<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        @if (request()->is('admin*'))
            <li class="{{ (request()->is('admin')) ? 'active' : '' }} nav-item"><a href="{{ route('admin.index') }}" title="Dashboard"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a></li>
            <li class="nav-item"><a href="#" title="Data Master"><i class="feather icon-mail"></i><span class="menu-title">Data Master</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/master/dosen*')) ? 'active' : '' }}"><a href="{{ route('admin.master.dosen') }}" title="Dosen"><i></i><span class="menu-item">Dosen</span></a></li>
                    <li class="{{ (request()->is('admin/master/user*')) ? 'active' : '' }}"><a href="{{ route('admin.master.user') }}" title="User"><i></i><span class="menu-item">User</span></a></li>
                    <li class="{{ (request()->is('admin/master/skema*')) ? 'active' : '' }}"><a href="{{ route('admin.master.skema') }}" title="Skema"><i></i><span class="menu-item">Skema</span></a></li>
                    <li class="{{ (request()->is('admin/master/rumpun-ilmu*')) ? 'active' : '' }}"><a href="{{ route('admin.master.rumpun-ilmu') }}" title="Rumpun Ilmu"><i></i><span class="menu-item">Rumpun Ilmu</span></a></li>
                    <li class="{{ (request()->is('admin/master/prodi*')) ? 'active' : '' }}"><a href="{{ route('admin.master.prodi') }}" title="Program Studi"><i></i><span class="menu-item">Program Studi</span></a></li>
                    {{-- <li class="@yield('tanggunganactive')"><a href="{{ route('dosen.tanggungan') }}"><i></i><span class="menu-item">Tanggungan</span></a></li>
                    <li class="@yield('riwayatactive')"><a href="#"><i></i><span class="menu-item">Riwayat Usulan</span></a></li> --}}
                </ul>
            </li>
            <li class="{{ (request()->is('admin/skema')) ? 'active' : '' }} nav-item"><a href="{{ route('admin.skema') }}" title="Skema Usulan"><i class="feather icon-calendar"></i><span class="menu-title">Skema Usulan</span></a></li>
            <li class="{{ (request()->is('admin/pimpinan*')) ? 'active' : '' }} nav-item"><a href="{{ route('admin.pimpinan') }}" title="Pimpinan & Koordinator"><i class="feather icon-calendar"></i><span class="menu-item">Pimpinan & Koordinator</span></a></li>
            {{-- <li class="@yield('persetujuanactive') nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title">Persetujuan Personil</span></a></li> --}}
        @elseif (request()->is('dosen*'))
            <li class="{{ (request()->is('dosen')) ? 'active' : '' }} nav-item"><a href="{{ route('dosen.index') }}"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a></li>
            <li class="nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title">Usulan</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('dosen/usulan*')) ? 'active' : '' }}"><a href="{{ route('dosen.usulan.index') }}"><i></i><span class="menu-item">Tambah Usulan</span></a></li>
                    <li class="{{ (request()->is('dosen/tanggungan')) ? 'active' : '' }}"><a href="{{ route('dosen.tanggungan') }}"><i></i><span class="menu-item">Tanggungan</span></a></li>
                    <li class="@yield('riwayatactive')"><a href="#"><i></i><span class="menu-item">Riwayat Usulan</span></a></li>
                </ul>
            </li>
            <li class="@yield('pelaksanaanactive') nav-item"><a href="#"><i class="feather icon-calendar"></i><span class="menu-title">Pelaksanaan</span></a></li>
            <li class="@yield('persetujuanactive') nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title">Persetujuan Personil</span></a></li>
        @endif
    </ul>
</div>