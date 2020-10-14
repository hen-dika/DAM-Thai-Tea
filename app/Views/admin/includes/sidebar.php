<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url() ?>/images/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: 0.8">
    <span class="brand-text font-weight-light">Dam<b>| Admin</b></span>
  </a>
  <!-- ($uri->getSegment(1) == 'dashboard' ? 'active' : null) -->
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= site_url('admin/dashboard') ?>" class="nav-link">
              <i class="fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="fas fa-list nav-icon"></i>
              <p>
                Menu 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('admin/menu') ?>" class="nav-link ">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('admin/category') ?>" class="nav-link ">
                  <i class="fas fa-paste nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/testimonial') ?>" class="nav-link ">
              <i class="far fa-comments nav-icon"></i>
              <p>Testimonial</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/about') ?>" class="nav-link ">
              <i class="fas fa-cogs nav-icon"></i>
              <p>Setting</p>
            </a>
          </li>
          <?php if(session()->get('role') == 'manager'): ?>
          <li class="nav-item">
            <a href="<?= site_url('user') ?>" class="nav-link ">
              <i class="fas fa-users nav-icon"></i>
              <p>User</p>
            </a>
          </li>
          <?php endif ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>