<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/item*') ? 'active' : '' }}" href="/dashboard/item">
            <span data-feather="file" class="align-text-bottom"></span>
            Inventarisasi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/categories*') ? 'active' : '' }}" href="/categories">
            <span data-feather="file" class="align-text-bottom"></span>
            Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="/users">
            <span data-feather="users" class="align-text-bottom"></span>
            Users
          </a>
        </li>
      </ul>
    </div>
  </nav>