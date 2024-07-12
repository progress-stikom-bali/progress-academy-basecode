<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'dashboard' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('admin.dashboard') }}">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'admin' ? 'active' : '' }}"
                        href="{{ route('admin.admin.index') }}">
                        <span data-feather="file"></span>
                        Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'user' ? 'active' : '' }}"
                        href="{{ route('admin.user.index') }}">
                        <span data-feather="shopping-cart"></span>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'room-type' ? 'active' : '' }}"
                        href="{{ route('admin.roomType.index') }}">
                        <span data-feather="shopping-cart"></span>
                        Room Type
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'room' ? 'active' : '' }}"
                        href="{{ route('admin.rooms.index') }}">
                        <span data-feather="shopping-cart"></span>
                        Room
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="layers"></span>
                        Booking
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'dashboard' ? 'active' : '' }}"
                        href="{{ route('user.dashboard') }}">
                        <span data-feather="shopping-cart"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'transactions' ? 'active' : '' }}"
                        href="{{ route('user.dashboard') }}">
                        <span data-feather="shopping-cart"></span>
                        Transactions
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
