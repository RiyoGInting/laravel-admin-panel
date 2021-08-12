<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>Mini</b>-CRM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('') }}assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Menu
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/companies') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('multilingual.company_list')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/employees') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('multilingual.employee_list')}}</p>
              </a>
            </li>
          </ul>
        </li>
        @guest
        @if (Route::has('login'))
        @endif
        @else
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Forms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/addCompanies" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Company</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/addEmployees" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Employee</p>
              </a>
            </li>
          </ul>
        </li>

        @endguest
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>