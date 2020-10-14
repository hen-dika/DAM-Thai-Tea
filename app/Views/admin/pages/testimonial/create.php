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
                    <h3>New Menu</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin/testimonial">Testimonial</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="<?= base_url() ?>/admin/testimonial/create" method="POST" id="menu-form" enctype="multipart/form-data">
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
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= old('name'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" id="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username'); ?>">
                                    <input type="hidden" name="price" id="price">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Testimonial</label>
                                    <textarea class="textarea" name="testimonial" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= old('testimonial'); ?></textarea>
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
                                    <label>Photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : '' ?>" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('image') ?>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-end mt-n4">
                                <button type="submit" name="status" id="draft" value="0" class="btn btn-outline-secondary btn-sm mr-3">Draft</button>
                                <button type="submit" name="status" id="publish" value="1" class="btn btn-primary btn-sm">Publish</button>
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