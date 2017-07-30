<!-- BEGIN PAGE TITLE-->
<div class="page-bar">
    <h1 class="page-title">Front Users<small></small></h1>
    <?php echo $breadcrumb;?>
</div>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row middle-content">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group margin-right5">
                                <!-- <a class="btn green sbold" data-toggle="modal" href="javascript:void(0)" onclick="add()">Add users <i class="fa fa-plus"></i></a> -->
                                <a class="btn green sbold" href="#" id="reload">Reload <i class="fa fa-refresh"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                        <i class="fa fa-print"></i> Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table1">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Date</th>
                            <th class="pull-right" width="%"> -- </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<!-- /.modal --
<div class="modal fade" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="users-profile">
                <input type="hidden" name="id" value="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" data-tabindex="1">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email" data-tabindex="1">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" type="text" name="phone" data-tabindex="1">
                    </div>
                    <div class="form-group">
                        <label>Assign Role</label>
                        <select class="form-control select2me" type="text" name="role">
                            <option disabled selected="">Select Role</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" id="save" class="btn green">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="<?php echo base_url();?>assets/global/plugins/alertify/script/alertify.min.js" type="text/javascript"></script>
<script>
var save_method; //for save method string
var table;
$(document).ready(function(){
    $('#table1').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": { "url":"<?php echo site_url('admin/users_data')?>", "type": "POST"},

        //Set column definition initialisation properties.
        "columnDefs": [
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },],
    });

    $("#reload").click(function(){
        $("#table1").dataTable().fnDraw();
    });
});

// function edit(id)
// {
//     save_method = 'update';
//
//     $.ajax({
//         url : "<?php echo site_url('admin/users_edit')?>/" + id,
//         type: "POST",
//         dataType: "JSON",
//         success: function(data)
//         {
//             $('[name="id"]').val(data.admin_id);
//             $('[name="name"]').val(data.name);
//             $('[name="email"]').val(data.email);
//             $('[name="phone"]').val(data.phone);
//             $('[name="role"]').val(data.role);
//             $('#large').modal('show'); // show bootstrap modal when complete loaded
//             $('.modal-title').text('Edit Roles'); // Set title to Bootstrap modal title
//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
//             alert('Error get data from ajax');
//         }
//     });
// }

// function delete1(id)
// {
//     if(confirm('Are you sure delete this data?'))
//     {
//         // ajax delete data to database
//         $.ajax({
//             url : "<?php echo site_url('admin/users_delete')?>/"+id,
//             type: "POST",
//             dataType: "JSON",
//             success: function(data)
//             {
//                 alertify.success(data.message);
//                 $("#table1").dataTable().fnDraw();
//                 return false;
//             }
//         });
//     }
// }
</script>

<?php
$this->load->view('admin_include/right_sidebar');
$this->load->view('admin_include/footer');
?>
