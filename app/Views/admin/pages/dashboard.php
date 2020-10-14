<?= $this->extend('admin/index') ?>

<?= $this->section('additionalScript') ?>
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('firstname') ?></h1>
    </div>
  </div>
</div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard-list"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Menu</span>
              <span class="info-box-number"><?= $menu ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="far fa-comments"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Testimoni</span>
              <span class="info-box-number"><?= $testi ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Visitor</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Monthly Visitors Report</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-12">
              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" height="180" style="height: 270px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
          </div>            
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?= $this->endSection() ?>

<?= $this->section('additionalScript') ?>
  <!-- PAGE PLUGINS -->
  <script src="<?= base_url(); ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?= base_url(); ?>/plugins/raphael/raphael.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(); ?>/plugins/chart.js/Chart.min.js"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="<?= base_url(); ?>/plugins/AdminLTE/js/demo.js"></script>
  <script src="<?= base_url(); ?>/plugins/AdminLTE/js/pages/dashboard2.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url(); ?>/plugins/toastr/toastr.min.js"></script>
  <?php if(session()->getFlashdata('authorization')){ ?>
    <script type="text/javascript">
      toastr.warning('<?= session()->getFlashdata('authorization') ?>');
    </script>
  <?php }else if(session()->getFlashdata('success')){ ?>
    <script type="text/javascript">
      toastr.success('<?= session()->getFlashdata('success') ?>');
    </script>
  <?php } ?>
<?= $this->endSection() ?>