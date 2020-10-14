<?= $this->extend('admin/index') ?>

<?= $this->section('additionalStyle') ?>
<link rel="stylesheet" href="<?= base_url() ?>/plugins/summernote/summernote-bs4.css">
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
                    <h3>About Us</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin/about">About</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="<?= base_url() ?>/admin/about" method="POST" id="menu-form" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
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
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= (old('phone')) ? old('phone') : $about['phone'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('phone') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= (old('email')) ? old('email') : $about['email'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control <?= ($validation->hasError('meta_title')) ? 'is-invalid' : '' ?>" value="<?= (old('meta_title')) ? old('meta_title') : $about['meta_title'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('meta_title') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control <?= ($validation->hasError('meta_keyword')) ? 'is-invalid' : ''; ?>" value="<?= (old('meta_keyword')) ? old('meta_keyword') : $about['meta_keyword'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('meta_keyword') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="textarea" name="meta_description" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= (old('meta_description')) ? old('meta_description') : $about['meta_description'] ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- Right form -->
                    <div class="col-4">
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
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control <?= ($validation->hasError('facebook')) ? 'is-invalid' : '' ?>" value="<?= (old('facebook')) ? old('facebook') : $about['facebook'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('facebook') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control <?= ($validation->hasError('twitter')) ? 'is-invalid' : '' ?>" value="<?= (old('twitter')) ? old('twitter') : $about['twitter'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('twitter') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control <?= ($validation->hasError('instagram')) ? 'is-invalid' : '' ?>" value="<?= (old('instagram')) ? old('instagram') : $about['instagram'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('instagram') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-end mt-n4">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
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

<?= $this->section('additionalScript') ?>\
<script src="<?= base_url() ?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
    $('.textarea').summernote();
</script>
<?php if(session()->getFlashdata('warning')){ ?>
    <script type="text/javascript">
        toastr.warning('<?= session()->getFlashdata('warning') ?>');
    </script>
<?php } ?>
<?= $this->endSection() ?>