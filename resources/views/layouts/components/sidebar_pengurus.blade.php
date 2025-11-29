<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('pengurus.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text fw-bolder ms-2">WPWA</span>
        </a>
    </div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('pengurus.dashboard') ? 'active' : '' }}">
            <a href="{{ route('pengurus.dashboard') }}" class="menu-link">
                <i class="menu-icon bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Data</span>
        </li>

        <li class="menu-item">
            <a href="{{ route('pengurus.anggota.index') }}" class="menu-link">
                <i class="menu-icon bx bx-group"></i>
                <div>Anggota</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('pengurus.kegiatan.index') }}" class="menu-link">
                <i class="menu-icon bx bx-calendar"></i>
                <div>Kegiatan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('pengurus.kehadiran.index') }}" class="menu-link">
                <i class="menu-icon bx bx-check-square"></i>
                <div>Kehadiran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('pengurus.iuran.index') }}" class="menu-link">
                <i class="menu-icon bx bx-wallet"></i>
                <div>Iuran</div>
            </a>
        </li>
    </ul>

</aside>


