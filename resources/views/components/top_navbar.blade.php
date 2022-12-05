{{-- Topbar --}}
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    {{-- Sidebar Toggle (Topbar) --}}
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    {{-- Create User ShortCut --}}
    <div class="d-none d-sm-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
        <div class="text-muted text-capitalize">{{ str_replace('/', ' - ', ucwords(Request::path())) }}</div>
    </div>



    {{-- Topbar Navbar --}}
    <ul class="navbar-nav ml-auto">


        <div class="topbar-divider d-none d-sm-block"></div>

        {{-- Current LoggedIn Admin Info --}}
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session('name') }}</span>
                <img class="img-profile rounded-circle"
                    src="{{ session('profile_pic') == '' ? '/asset/img/default_profile.png' : '/asset/img/' . session('profile_pic') }}">
            </a>



            {{-- Dropdown - User Information --}}
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="text-white dropdown-item" href="javascript:void(0)">
                    <i class="fas fa-server fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span title="Current Network IP Address" class="text-success">{{ request()->ip() }}</span>
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
