
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

    <!-- Mobile Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">

        <!-- User Dropdown -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">

                <span class="mr-2 d-none d-lg-inline text-gray-600">
                    {{ Auth::user()->nama ?? 'Pengguna' }}
                </span>

                <img class="img-profile rounded-circle"
                     src="{{ asset('img/undraw_profile.svg') }}">

            </a>

            <div class="dropdown-menu dropdown-menu-right shadow">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>

            </div>

        </li>

    </ul>

</nav>
