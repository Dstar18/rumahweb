  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Brand Logo -->
    <a href="<?= base_url('Dashboard')?>" class="brand-link">
      <span class="brand-text font-weight-light"><b>RumahWeb</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              
                <!-- Menu Dashboard -->
                <!-- <li class="nav-item">
                    <a href="<?= base_url('Dashboard')?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li> -->

                <!-- Menu Proses -->
                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="<?= base_url('User/viewUser')?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>