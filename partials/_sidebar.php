    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets/avatar/<?= isset($_SESSION['avatar']) == '' ? 'default.png' : $_SESSION['avatar'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['name']; ?></a>
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
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link <?= !empty($_GET['page']) ? '' : 'active' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=categories" class="nav-link <?= $_GET['page'] == 'categories' ? 'active' : '' ?> ">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                  Categories
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=products" class="nav-link <?= $_GET['page'] == 'products' ? 'active' : '' ?> ">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                  Products
                </p>
              </a>
            </li>
            <li class="nav-header">USERS</li>
            <li class="nav-item">
              <a href="index.php?page=register" class="nav-link <?= $_GET['page'] == 'register' ? 'active' : '' ?> ">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                  Register
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>