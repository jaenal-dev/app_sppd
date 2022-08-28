<nav class="main-sidebar ps-menu">
    <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div>
    <div class="sidebar-header">
        <div class="text mx-5 p-3 text-center"><img src="{{ asset('assets/images/logo_kabupatentangerang_perda.png') }}" class="img" width="80" height="85"></div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="link">
                    <i class="ti-user"></i>
                    <span>Data Pegawai</span>
                </a>
            </li>
            <li class="{{ Request::is('nppd*', 'sppd*') ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-envelope"></i>
                    <span>Data</span>
                </a>
                <ul class="sub-menu {{ Request::is('nppd*', 'sppd*') ? 'expand' : '' }}">
                    <li class="{{ Request::is('sppd*') ? 'active' : '' }}"><a href="{{ route('sppd.index') }}" class="link"><span>Data SPPD</span></a></li>
                    <li class="{{ Request::is('nppd*') ? 'active' : '' }}"><a href="{{ route('nppd.index') }}" class="link"><span>Data NPPD</span></a></li>
                </ul>
            </li>
            <li class="{{ Request::is('report*') ? 'active' : '' }}">
                <a href="{{ route('report.index') }}" class="link"><i class="ti-archive"></i>
                    <span>Hasil Laporan</span>
                </a>
            </li>
            <li class="{{ Request::is('location*', 'transport*') ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-settings"></i>
                    <span>Settings</span>
                </a>
                <ul class="sub-menu {{ Request::is('location*', 'transport*') ? 'expand' : '' }}">
                    <li class="{{ Request::is('location*') ? 'active' : '' }}"><a href="{{ route('location.index') }}" class="link"><span> Data Lokasi</span></a></li>
                    <li class="{{ Request::is('transport*') ? 'active' : '' }}"><a href="{{ route('transport.index') }}" class="link"><span> Data Transport</span></a></li>
                    <li class="{{ Request::is('*') ? 'active' : '' }}"><a href="#" class="link"><span> Data Anggaran</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
