
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ url('/') }}">

        <div class="sidebar-brand-icon">
            <i class="fas fa-layer-group"></i>
        </div>

        <div class="sidebar-brand-text mx-2">
            SISTEM MONITORING RONDA
        </div>
    </a>

    <hr class="sidebar-divider">

    <!-- Menu berdasarkan halaman -->
    @yield('sidebar-menu')

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
