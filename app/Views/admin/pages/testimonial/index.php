<?= $this->extend('admin/index') ?>

<?= $this->section('additionalStyle') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
                    <h1>Testimonial List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                                <a href="<?= base_url() ?>/admin/testimonial/create"><i class="far fa-plus-square mr-2"></i>Add Testimonials</a>
                            </button>
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
                            <table id="idTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Testimonial</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Delete-Data -->
<form action="<?= base_url() ?>/admin/testimonial/delete" method="POST">
    <?= csrf_field() ?>
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="font-weight-light mt-3">Do you want to delete <strong id="name"></strong> testimonials ?</p>
                </div>
                <div class="modal-footer justify-content-end">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger" id="btn_delete">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>
<?= $this->endSection() ?>

<?= $this->section('additionalScript') ?>
<!-- DataTables -->
<script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>/plugins/toastr/toastr.min.js"></script>
<!-- Page Script -->
<script type="text/javascript">
    $(document).ready(function(){
        show();
        function show(){
            $.ajax({
                type    : 'GET',
                dataType: 'JSON',
                url     : '<?= base_url(); ?>/admin/testimonial/read',
                async   : true,
                success : function(data){
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html +='<tr>'+
                        '<td><img class="img-thumbnail" src="<?= base_url()?>/images/uploads/testimonials/'+data[i].image+'"></td>'+
                        '<td>'+data[i].username+'</td>'+
                        '<td>'+data[i].name+'</td>'+
                        '<td>'+data[i].testimoni+'</td>'+
                        '<td>'+data[i].status+'</td>'+
                        '<td style="text-align:center;">'+
                        '<a href="<?= base_url() ?>/admin/testimonial/edit/'+data[i].id+'" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></a>'+''+
                        '<a href="javascript:void(0);" class="btn btn-outline-danger btn-sm item_delete ml-1" data-menu_id="'+data[i].id+'" data-name="'+data[i].name+'"><i class="fas fa-trash-alt"></i></a>'+
                        '</td>'+
                        '</tr>';
                    }
                    $('#idTable').DataTable({
                        'responsive' : true
                    });
                    $('#dataTable').html(html);
                }
            });
        }
    });

    $('#dataTable').on('click','.item_delete', function(){
        var id = $(this).data('menu_id');
        var name = $(this).data('name');
        $('#modal-delete').modal('show');
        $('#id').val(id);
        $('#name').html(name);
    });
</script>
<?php if(session()->getFlashdata('success')){ ?>
    <script type="text/javascript">
        toastr.success('<?= session()->getFlashdata('success') ?>');
    </script>
<?php } else if(session()->getFlashdata('danger')){ ?>
    <script type="text/javascript">
        toastr.danger('<?= session()->getFlashdata('danger') ?>');
    </script>
<?php } ?>
<?= $this->endSection() ?>