<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Custom Your View -->
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
        class="fas fa-th-large"></i>
      </a>
    </li>
    <!-- Profile -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?= session()->get('firstname').'  '.session()->get('lastname') ?></span>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url() ?>/admin/profile" class="dropdown-item">
          <i class="fas fa-user-cog mr-2"></i>Setting
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url() ?>/admin/logout" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
  <!-- /.navbar