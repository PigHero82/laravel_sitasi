<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="@yield('indexactive') nav-item"><a href="{{ route('index') }}"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a></li>
        <li class=" nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title">Usulan</span></a>
            <ul class="menu-content">
                <li class="@yield('tambahactive')"><a href="{{ route('usulan.index') }}"><i></i><span class="menu-item">Tambah Usulan</span></a></li>
                <li class="@yield('tanggunganactive')"><a href="{{ route('tanggungan') }}"><i></i><span class="menu-item">Tanggungan</span></a></li>
                <li class="@yield('riwayatactive')"><a href="#"><i></i><span class="menu-item">Riwayat Usulan</span></a></li>
            </ul>
        </li>
        <li class="@yield('pelaksanaanactive') nav-item"><a href="#"><i class="feather icon-calendar"></i><span class="menu-title">Pelaksanaan</span></a></li>
        <li class="@yield('persetujuanactive') nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title">Persetujuan Personil</span></a></li>
    </ul>
</div>