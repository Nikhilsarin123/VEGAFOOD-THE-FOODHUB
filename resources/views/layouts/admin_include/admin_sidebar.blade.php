<!-- Main Sidebar Container --><!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nikhil Sarin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL('/adddish') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD DISH</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL('/addblog') }}  " class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD BLOG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{ route('restaurant.create') }} " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD TOP RESTAURANT CUISNES</p>
                </a>
              </li>
               <li class="nav-item">
                <a href=" {{ route('coupon.create') }} " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD Coupon</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('order.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ORDERS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('dish.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                DISH DETAIL
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
            <li class="nav-item has-treeview">
            <a href="{{route('restaurant.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                RESTAURANT DETAIL
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('coupon.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                COUPON DETAIL
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
