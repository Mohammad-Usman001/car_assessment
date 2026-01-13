<aside class="sidebar" id="adminSidebar">
    <div class="sidebar-brand">
        <div class="logo">CD</div>
        <div class="brand-text">
            <div class="title">CarsDekho</div>
            <div class="tagline">Admin Panel</div>
        </div>
    </div>

    <div class="sidebar-menu">
        <div class="menu-title">Main</div>

        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            <span class="menu-text">Dashboard</span>
        </a>

        <div class="menu-title">Website Manage</div>

        <a href="{{ route('admin.settings.edit') }}"
           class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="bi bi-gear"></i>
            <span class="menu-text">Site Settings</span>
        </a>

        <a href="{{ route('banners.index') }}"
           class="{{ request()->routeIs('banners.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i>
            <span class="menu-text">Banners</span>
        </a>

        <a href="{{ route('cars.index') }}"
           class="{{ request()->routeIs('cars.*') ? 'active' : '' }}">
            <i class="bi bi-car-front"></i>
            <span class="menu-text">Cars</span>
        </a>

        <hr class="border-white border-opacity-10">

        {{-- <a href="{{ route('home') }}" target="_blank">
            <i class="bi bi-box-arrow-up-right"></i>
            <span class="menu-text">View Website</span>
        </a> --}}
    </div>
</aside>
