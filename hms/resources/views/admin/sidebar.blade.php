<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ahsan Alam</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Departments
    </div>

    <!-- Hotel Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapseHotel"
            aria-expanded="true" aria-controls="collapseHotel">
            <i class="fas fa-hotel"></i>
            <span>Hotel Management</span>
        </a>
        <div id="collapseHotel" class="collapse" aria-labelledby="headingHotel" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Hotel Management:</h6>
                <a class="collapse-item" href="{{ route('hotel.rooms.all') }}">
                    <i class="fas fa-home"></i> All Rooms
                </a>
                <a class="collapse-item" href="{{ route('hotel.rooms.add') }}">
                    <i class="fas fa-plus"></i> Add Rooms
                </a>
                <a class="collapse-item" href="{{ route('hotel.bookings.index') }}">
                    <i class="fas fa-calendar-check"></i> Manage Bookings
                </a>
                <a class="collapse-item" href="{{ route('hotel.guest.assign') }}">
                    <i class="fas fa-users"></i> Assign Guests
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-clipboard-list"></i> View Reservations
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-chart-bar"></i> Reports & Analytics
                </a>
            </div>
        </div>
    </li>

    <!-- Restaurant Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapseRestaurant"
            aria-expanded="true" aria-controls="collapseRestaurant">
            <i class="fas fa-utensils"></i>
            <span>Restaurant</span>
        </a>
        <div id="collapseRestaurant" class="collapse" aria-labelledby="headingRestaurant"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Restaurant Management:</h6>
                <a class="collapse-item" href="#">
                    <i class="fas fa-plus"></i> Add Food Items
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-paperclip"></i> Make an Order
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-list"></i> View Orders
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-calendar-check"></i> Manage Reservations
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
            </div>
        </div>
    </li>

    <!-- Spa Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#collapseSpa"
            aria-expanded="true" aria-controls="collapseSpa">
            <i class="fas fa-spa"></i>
            <span>Spa Management</span>
        </a>
        <div id="collapseSpa" class="collapse" aria-labelledby="headingSpa" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Spa Services:</h6>
                <a class="collapse-item" href="#">
                    <i class="fas fa-plus"></i> Add Spa Services
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-calendar-check"></i> Manage Bookings
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-users"></i> Assign Staff
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-chart-line"></i> View Reports
                </a>
            </div>
        </div>
    </li>

    <!-- Account (Financial) Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse"
            data-target="#collapseAccount" aria-expanded="true" aria-controls="collapseAccount">
            <i class="fas fa-money-check-alt"></i>
            <span>Account Management</span>
        </a>
        <div id="collapseAccount" class="collapse" aria-labelledby="headingAccount" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Finances:</h6>
                <a class="collapse-item" href="#">
                    <i class="fas fa-plus"></i> Add Transactions
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-file-invoice"></i> View Invoices
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-chart-pie"></i> Financial Reports
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-wallet"></i> Manage Expenses
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin Management
    </div>

    <!-- User Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse"
            data-target="#collapseUserManagement" aria-expanded="true" aria-controls="collapseUserManagement">
            <i class="fas fa-users-cog"></i>
            <span>User Management</span>
        </a>
        <div id="collapseUserManagement" class="collapse" aria-labelledby="headingUserManagement"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Users:</h6>
                <a class="collapse-item" href="#">
                    <i class="fas fa-user-plus"></i> Add Users
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-users"></i> View All Users
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-user-edit"></i> Edit User Roles
                </a>
            </div>
        </div>
    </li>

    <!-- Role Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse"
            data-target="#collapseRoleManagement" aria-expanded="true" aria-controls="collapseRoleManagement">
            <i class="fas fa-shield-alt"></i>
            <span>Role Management</span>
        </a>
        <div id="collapseRoleManagement" class="collapse" aria-labelledby="headingRoleManagement"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Roles:</h6>
                <a class="collapse-item" href="#">
                    <i class="fas fa-user-tag"></i> Add Roles
                </a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-users-cog"></i> Assign Roles to Users
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Site Settings</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-cogs"></i>
            <span>Seo Settings</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
