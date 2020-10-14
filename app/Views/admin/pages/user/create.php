<?= $this->extend('admin/index') ?>

<?= $this->section('additionalStyle') ?>
<!-- Toastr -->
<link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>New User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin/user">User</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="<?= base_url() ?>/admin/user/insert" method="POST" id="menu-form" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
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
                                <div class="form-group row">
                                    <div class="col-6">
                                       <label>First Name</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control <?= ($validation->hasError('firstname')) ? 'is-invalid' : '' ?>" value="<?= old('firstname'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('firstname') ?>
                                        </div>                                 
                                    </div>
                                    <div class="col-6">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control <?= ($validation->hasError('lastname')) ? 'is-invalid' : '' ?>" value="<?= old('lastname'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lastname') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= old('email'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="role" value="admin"> Admin
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="role" value="manager"> Manager
                                    </label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('role') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" value="<?= old('password'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password') ?>
                                        </div>                                        
                                    </div>
                                    <div class="col-6">
                                        <label>Re-Password</label>
                                        <input type="password" name="re-password" id="re-password" class="form-control <?= ($validation->hasError('re-password')) ? 'is-invalid' : '' ?>" value="<?= old('re-password'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('re-password') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="<?= base_url() ?>/admin/user" class="btn btn-outline-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </form>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>
<?= $this->section('additionalScript') ?>
<?php if(session()->getFlashdata('warning')){ ?>
    <!-- Toastr -->
    <script src="<?= base_url(); ?>/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
      toastr.warning('<?= session()->getFlashdata('warning') ?>');
    </script>
<?php } ?>
<?= $this->endSection() ?>
