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
                    <h1>Menu Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Menu</li>
                        <li class="breadcrumb-item active">Category</li>
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
                         <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-add">
                            <i class="far fa-plus-square mr-2"></i>Add Category
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
                                    <th width="20px" class="text-center">#</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center" width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="dataTable">
                                <tr>
                                    <td class="text-center"></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-outline-secondary btn-sm">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
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

<!-- Modal Add-Data -->
<form action="<?= base_url() ?>/admin/category/create" method="POST">
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">New Category</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="category" id="category" placeholder="Input Category Name" class="form-control">
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>
<!-- Modal Edit-Data -->
<form action="<?= base_url() ?>/admin/category/update" method="POST">
    <?= csrf_field() ?>
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Edit Category</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id-edit" id="id-edit">
                    <input type="text" name="category-edit" id="category-edit" placeholder="Input Category Name" class="form-control">
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>
<!-- Modal Delete-Data -->
<form action="<?= base_url() ?>/admin/category/delete" method="POST">
    <?= csrf_field() ?>
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Edit Category</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-weight-light">Do you want to delete <strong id="cat-name"></strong> ?</p>
                </div>
                <div class="modal-footer justify-content-end">
                    <input type="hidden" name="id-delete" id="id_delete">
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
                type     : 'GET',
                url      : '<?php echo base_url('admin/category/read'); ?>',
                dataType : 'json',
                async    : true,
                success  : function(data){
                    // console.log(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        var no = i+1;
                        html += '<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+data[i].name+'</td>'+
                        '<td style="text-align:center;">'+
                        '<a href="javascript:void(0);" class="btn btn-outline-primary btn-sm item_edit" data-category_id="'+data[i].id+'" data-name="'+data[i].name+'"><i class="far fa-edit"></i></a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-outline-danger btn-sm item_delete" data-category_id="'+data[i].id+'" data-name="'+data[i].name+'"><i class="fas fa-trash-alt"></i></a>'+
                        '</td>'+
                        '</tr>';
                    }
                    $('#dataTable').html(html);
                    $('#idTable').DataTable({
                        'responsive': true,
                        'autoWidth': false,
                    });
                }
            });
        }
        // Get Data for Edit
         $('#dataTable').on('click','.item_edit',function(){
            var id = $(this).data('category_id');
            var name = $(this).data('name');
           
            $('#modal-edit').modal('show');
            $('[name="category-edit"]').val(name);
            $('[name="id-edit"]').val(id);
        });
        //Get Data for Delete
        $('#dataTable').on('click','.item_delete',function(){
            var id = $(this).data('category_id');
            var name = $(this).data('name');
            // console.log(id);
            $('#modal-delete').modal('show');
            $('[name="id-delete"]').val(id);
            $('#cat-name').html(name);
        });
    });
</script>
<?php if(session()->getFlashdata('success')){ ?>
    <script type="text/javascript">
        toastr.success('<?= session()->getFlashdata('success') ?>');
    </script>
<?php } if(session()->getFlashdata('warning')){ ?>
    <script type="text/javascript">
        toastr.warning('<?= session()->getFlashdata('warning') ?>');
    </script>
<?php } ?>
<?= $this->endSection() ?>