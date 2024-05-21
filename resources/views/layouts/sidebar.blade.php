<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="/" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Masters</li>
                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="ti-user"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="ti-ticket"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="waves-effect">
                        <i class="ti-ticket"></i>
                        <span>Products</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
