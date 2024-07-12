<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $activePage == 'dashboard' ? 'active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activePage == 'admin' ? 'active' : '' }}">
                    <span data-feather="file"></span>
                    Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activePage == 'user' ? 'active' : '' }}">
                    <span data-feather="shopping-cart"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Room Type
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Rooms
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Booking
                </a>
            </li>
        </ul>
    </div>
</nav>
