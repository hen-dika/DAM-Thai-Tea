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
    <form action="<?= base_url() ?>/admin/user/profile" method="POST" id="menu-form" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label>First Name</label>
                                            <input type="text" name="firstname" id="firstname" class="form-control <?= ($validation->hasError('firstname')) ? 'is-invalid' : '' ?>" value="<?= (old('firstname')) ? old('firstname') : $user['first_name'] ?>">
                                            <div class="invalid-feedback">
                                              <?= $validation->getError('firstname') ?>
                                            </div>                                 
                                        </div>
                                        <div class="col-6">
                                            <label>Last Name</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control <?= ($validation->hasError('lastname')) ? 'is-invalid' : '' ?>" value="<?= (old('lastname')) ? old('lastname') : $user['last_name'] ?>">
                                            <div class="invalid-feedback">
                                              <?= $validation->getError('lastname') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= (old('email')) ? old('email') : $user['email'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" value="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password') ?>
                                            </div>                                        
                                        </div>
                                        <div class="col-6">
                                            <label>Re-Password</label>
                                            <input type="password" name="re-password" id="re-password" class="form-control <?= ($validation->hasError('re-password')) ? 'is-invalid' : '' ?>" value="">
                                            <div class="invalid-feedback">
                                              <?= $validation->getError('re-password') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="<?= base_url() ?>/admin/dashboard" class="btn btn-outline-secondary btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                  <!-- /.card -->
                </div>
            </div>
        </section>
    </form>
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