    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a id="navDashboard" href="{{ route('dashboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a id="navAdminPanel" href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Admin Panel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a id="navUser" href="{{ route('userfilter.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a id="navUserLevel" href="{{ route('userlevel.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Level</p>
                </a>
              </li>
              <li class="nav-item">
                <a id="navLogout" href="{{ route('logout') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
    </nav>