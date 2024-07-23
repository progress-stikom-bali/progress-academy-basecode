<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('admin.dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}"
                    href="{{ route('admin.admin.index') }}">
                    <span data-feather="file"></span>
                    Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}"
                    href="{{ route('admin.user.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('roomtype*') ? 'active' : '' }}"
                    href="{{ route('admin.roomType.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Room Type
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('rooms*') ? 'active' : '' }}"
                    href="{{ route('admin.rooms.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Room
                </a>
            </li>
        </ul>
    </div>
</nav>
