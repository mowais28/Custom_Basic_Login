@if (session('user_role') == 'admin' && Request::is("admin/*"))
    <ul class="navbar-nav bg-royal sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin/dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>

        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin/dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Users
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin/users/all-users') }}">All User</a>
                    <a class="collapse-item" href="{{ route('admin/users/add') }}">Create User</a>
                </div>
            </div>
        </li>



    </ul>
@elseif(session('user_role') == 'user' && Request::is("user/*"))
    <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user/dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3">User Panel</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('user/dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
    </ul>
@endif
