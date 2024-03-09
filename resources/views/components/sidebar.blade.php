<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Noeni Medika</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>
            <li class="nav-item dropdown">
                {{-- <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                </ul> --}}
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"
                    class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
                </li>
                <li class="{{ Request::is('users') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"
                    class="nav-link"><i class="fas fa-user"></i><span>Users</span></a>
                </li>
                <li class="{{ Request::is('doctors') ? 'active' : '' }}">
                    <a href="{{ route('doctors.index') }}"
                    class="nav-link"><i class="fas fa-user-doctor"></i><span>Doctors</span></a>
                </li>
            </li>

        </ul>


    </aside>
</div>
