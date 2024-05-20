<div class="sidebar-content">
  <ul>
    <li class="{{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
      <a href="{{ route('dashboard.admin') }}" class="link">
        <i class="ti-home"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="menu-category">
      <span class="text-uppercase">Management User</span>
    </li>
    <li class="{{ request()->routeIs(['admin.guru*', 'siswa*']) ? 'active' : '' }}">
      <a href="#" class="main-menu has-dropdown">
        <i class="fa-solid fa-users"></i>
        <span>User</span>
      </a>
      <ul class="sub-menu">
        <li>
          <a href="{{ route('admin.guru.index') }}" class="link"><span>Admin</span></a>
        </li>
        <li>
          <a href="element-tabs-collapse.html" class="link"><span>User</span></a>
        </li>
      </ul>
    </li>
    <li class="{{ request()->routeIs(['admin.kelas*', 'admin.course*']) ? 'active' : '' }}">
      <a href="#" class="main-menu has-dropdown">
        <i class="fa-solid fa-school"></i>
        <span>Management Data</span>
      </a>
      <ul class="sub-menu">
        <li>
          <a href="{{ route('admin.kelas.index') }}" class="link"> <span>Alternatif</span></a>
        </li>
        <li>
          <a href="{{ route('admin.course.index') }}" class="link"> <span>Kriteria</span></a>
        </li>
      </ul>
    </li>
  </ul>
</div>
