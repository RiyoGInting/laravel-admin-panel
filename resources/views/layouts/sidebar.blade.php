<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">mini-crm</span>
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
        <li class="nav-header">MENU</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              {{trans('multilingual.forms')}}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/addCompanies" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('multilingual.add_company')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/addEmployees" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('multilingual.add_employee')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/addItems" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Item</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/addSells" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Sell</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              {{trans('multilingual.datatables')}}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="companies" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('multilingual.company')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="employees" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('multilingual.employee')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="items" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="sells" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sell</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="sellsummary" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sell Summary</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>