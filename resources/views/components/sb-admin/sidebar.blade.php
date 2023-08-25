        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1e1e1e">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <img src="img/Petit-logo.png" alt="logo" class="sidebar-brand-icon" height="90px" width="155px">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Caixa -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('fincash.create') }}">
                    <i class="fas fa-solid fa-cash-register"></i>
                    <span>Caixa</span></a>
            </li>

            <!-- Nav Item - Produtos -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">
                    <i class="fas fa-solid fa-tags"></i>
                    <span>Produtos</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('closures.index') }}">
                    <i class="fa-solid fa-paste me-1"></i>
                    <span>Fechamentos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                -------
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
