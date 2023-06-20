  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #007bff;">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/template/admin/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="font-size: 20px; font-weight: bold;">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- Category --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                CATEGORY
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/menus/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/menus/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Category</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Product --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p> PRODUCTS
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/productts/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/productts/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Products</p>
                    </a>
                </li>

            </ul>
          </li>
          {{-- Slider --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-link" aria-hidden="true"></i>
                <p> SLIDERS
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/sliders/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/sliders/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Slider</p>
                    </a>
                </li>

            </ul>
          </li>

          {{-- ShoppingCart --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <p> SHOPPING CART
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/customers" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Order</p>
                    </a>
                </li>
            </ul>
          </li>

          {{-- Manager User--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <p> USER MANAGER
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/customermanagers" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List User</p>
                    </a>
                </li>
            </ul>
          </li>
          {{-- Manager User Login--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <p> USER MANAGER LOGIN
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/customermanagers" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List User_Lg</p>
                    </a>
                </li>
            </ul>
          </li>

          {{-- Manager Size--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-link" aria-hidden="true"></i>
                <p> Size
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/size/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Size</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/size/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Size</p>
                    </a>
                </li>

            </ul>
          </li>

          {{-- Manager Mau--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-link" aria-hidden="true"></i>
                <p> Mau
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/mau/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Colors</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/mau/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Colors</p>
                    </a>
                </li>

            </ul>
          </li>


           {{-- Manager CTSP--}}
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-link" aria-hidden="true"></i>
                <p> DETAIL PRODUCTS
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/ctsp/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Detail Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/ctsp/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Detail Products</p>
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