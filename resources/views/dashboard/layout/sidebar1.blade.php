<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        {{-- <img src="image/PvQJoc4a_400x400.jpg" class="brand-image img-circle elevation-3" style="opacity: 1"> --}}
        {{-- <img src="image\PvQJoc4a_400x400.jpg" alt="PvQJoc4a_400x400.jpg" width="200"
            class="img-thumbnail rounded-circle"> --}}
        <h1> S . I . S . D . A</h1>
        {{-- <span class="brand-text font-weight-light">Sisda</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/item"
                                class="nav-link {{ Request::is('dashboard/item') ? 'active' : '' }}">
                                <span data-feather="layers"></span>
                                <p>Items</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                                <span data-feather="users"></span>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/categories" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">
                                <span data-feather="folder-plus"></span>
                                <p>Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="/dashboard/formlaporan"
                                class="nav-link {{ Request::is('/dashboard/formlaporan') ? 'active' : '' }}">
                                <span data-feather="file-text"></span>
                                <p>Form Pelaporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link px-3 bg-dark border-0">
                            logout <span data-feather="log-out" class="align-text-bottom"></span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>