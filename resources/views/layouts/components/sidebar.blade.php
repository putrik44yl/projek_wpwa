<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text fw-bolder ms-2">WPWA</span>
        </a>
    </div>
<ul class="menu-inner py-1">
    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon bx bx-home-circle"></i>
            <div>Dashboard</div>
        </a>
    </li>

        <li class="menu-item {{ request()->is('admin/galeri*') ? 'active open' : '' }}">
            <a href="{{ route('admin.galeri.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div>Galeri</div>
            </a>
        </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Manajemen Data</span>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}" class="menu-link">
            <i class="menu-icon bx bx-user"></i>
            <div>User</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}">
        <a href="{{ route('admin.anggota.index') }}" class="menu-link">
            <i class="menu-icon bx bx-group"></i>
            <div>Anggota</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.pengurus.*') ? 'active' : '' }}">
        <a href="{{ route('admin.pengurus.index') }}" class="menu-link">
            <i class="menu-icon bx bx-user-check"></i>
            <div>Pengurus</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}">
        <a href="{{ route('admin.kegiatan.index') }}" class="menu-link">
            <i class="menu-icon bx bx-calendar"></i>
            <div>Kegiatan</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.kehadiran.*') ? 'active' : '' }}">
        <a href="{{ route('admin.kehadiran.index') }}" class="menu-link">
            <i class="menu-icon bx bx-check-square"></i>
            <div>Kehadiran</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('admin.iuran.*') ? 'active' : '' }}">
        <a href="{{ route('admin.iuran.index') }}" class="menu-link">
            <i class="menu-icon bx bx-wallet"></i>
            <div>Iuran</div>
        </a>
    </li>
</ul>

</aside>

