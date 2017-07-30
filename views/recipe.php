<!-- BEGIN PAGE TITLE-->
<div class="page-bar">
    <h1 class="page-title">Recipe<small></small></h1>
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
                                <a class="btn green sbold" data-toggle="modal" href="javascript:void(0)" onclick="add()">Add Recipe <i class="fa fa-plus"></i></a>
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
                            <th width="5%">No.</th>
                            <th width="10%">Recipe Image</th>
                            <th width="15%">Recipe</th>
                            <th width="25%">Preparation Steps</th>
                            <th width="25%">Ingradients</th>
                            <th width="10%">Author</th>
                            <th class="pull-right" width="10%"> -- </th>
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

<!-- /.modal -->
<div class="modal fade" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="recipe-form"  enctype="multipart/form-data">
                <input type="hidden" name="id" value="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Recipe</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Recipe Image</label>
                        <input class="form-control" type="file" name="image[]">
                    </div>
                    <div class="form-group">
                        <label>Recipe</label>
                        <input class="form-control" type="text" name="recipe_title">
                    </div>
                    <div class="form-group">
                        <label>Recipe Intro</label>
                        <textarea class="form-control" name="recipe_intro"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Steps (write steps in between <code>< li > Text goeas here < /li ></code> tag)</label>
                        <textarea class="form-control" name="preparation_steps"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input class="form-control" type="text" name="author">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="recipe_category_id">
                            <option disabled selected="">Select Category</option>
                            <?php
                            foreach($categories as $category)
                            {
                            ?>
                                <option value="<?php echo $category['recipe_category_id'];?>"><?php echo $category['category'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><strong>Select Recipe Ingredients</strong></label>
                        <div id="ingredient">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label>Ingredient</label>
                                    <input class="form-control search-ingredients" type="text" name="ingredient[]" placeholder="Search Ingredient">
                                </div>
                                <div class="col-md-3">
                                    <label>Quantity</label>
                                    <input class="form-control" type="text" name="quantity[]" placeholder="Ingredient Quantity">
                                </div>
                                <div class="col-md-3">
                                    <label>Unit</label>
                                    <select class="form-control" name="unit[]">
                                        <option disabled selected="">Select Unit</option>
                                        <?php
                                        foreach($units as $unit)
                                        {
                                        ?>
                                            <option value="<?php echo $unit['sign'];?>"><?php echo $unit['sign'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="button" class="form-control btn green btn-outline add-ingredient"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
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

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
var save_method; //for save method string
var table;
var searchRequest = null;
$(document).ready(function(){
    $('#table1').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": { "url":"<?php echo site_url('admin/recipe_data')?>", "type": "POST"},

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

    $("#save").click(function()
    {
        $('#save').text('Saving...'); //change button text
        $('#save').attr('disabled',true); //set button disable

        var form = $('form')[0];
        var formData = new FormData(form);

        $.each($('input[type=file]')[0].files, function(i, file){
            formData.append('image[]', $('input[type=file]')[0].files[i]);
        });

        var other_data = $('.recipe-form').serializeArray();
        $.each(other_data,function(key,input){
            formData.append(input.name,input.value);
        });
        // var form_data = $('.recipe-form').serialize();

        if(save_method == 'add') {
            url = "<?php echo site_url('admin/recipe_create')?>";
        } else {
            url = "<?php echo site_url('admin/recipe_update')?>";
        }

        jQuery.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: formData,
            contentType: false,
            processData:false,
            success: function(res) {
                if (res.error) {
                    alertify.error(res.message);

                    $('#save').text('Save Changes');
                    $('#save').attr('disabled',false);
                } else {
                    $('.recipe-form')[0].reset();
                    alertify.success(res.message);

                    $('#large').modal('hide');
                    $("#table1").dataTable().fnDraw();

                    $('#save').text('Save Changes');
                    $('#save').attr('disabled',false);

                    return false;
                }
            }
        });
    });

    $(document).off("click", ".add-ingredient").on('click', ".add-ingredient", function (e) {
        e.preventDefault();
        var html1 = '';
        var url = "<?php echo site_url('admin/get_ingredient_units')?>";
        jQuery.ajax({
            type: "POST",
            url: url,
            success: function(res) {
                res = JSON.parse(res);
                $.each(res, function(index, val) {
                    html1 += '<option value="'+ val.sign +'">'+ val.sign + ' </option>';
                });

                var html = '<div class="row form-group append-div">' +
                            '<div class="col-md-4">' +
                                '<input class="form-control search-ingredients" type="text" name="ingredient[]" placeholder="Search Ingredient">' +
                            '</div>' +
                            '<div class="col-md-3">' +
                                '<input class="form-control" type="text" name="quantity[]" placeholder="Ingredient Quantity">' +
                            '</div>' +
                            '<div class="col-md-3">' +
                                '<select class="form-control" name="unit[]">' +
                                    '<option disabled selected="">Select Unit</option>';

                var html2 ='</select>' +
                            '</div>' +
                            '<div class="col-md-1">' +
                                '<button type="button" class="form-control btn red btn-outline remove-ingredient"><i class="fa fa-minus"></i></button>' +
                            '</div>';

                $("#ingredient").append(html+html1+html2);

                $("#ingredient").find('.search-ingredients').autocomplete({
                    minLength: 1,
                    source: function(request, response) {
                            if (searchRequest !== null) {
                                searchRequest.abort();
                            }
                            searchRequest = $.ajax({
                                url: '<?php echo site_url("admin/autocomplete_ingredients")?>',
                                method: 'post',
                                dataType: "json",
                                data: {term: request.term},
                                success: function(data) {
                                    searchRequest = null;
                                    response($.map(data, function(item) {
                                        return {
                                            value: item.ingredient_id,
                                            label: item.ingredient
                                        };
                                    }));
                                }
                            }).fail(function() {
                                searchRequest = null;
                            });
                        }
                });

            }
        });

    });

    $(document).off("click", ".remove-ingredient").on('click', ".remove-ingredient", function (e) {
        e.preventDefault();
        $(this).closest(".form-group").remove();
    });

    $(".search-ingredients").autocomplete({
        minLength: 1,
        source: function(request, response) {
                if (searchRequest !== null) {
                    searchRequest.abort();
                }
                searchRequest = $.ajax({
                    url: '<?php echo site_url("admin/autocomplete_ingredients")?>',
                    method: 'post',
                    dataType: "json",
                    data: {term: request.term},
                    success: function(data) {
                        searchRequest = null;
                        response($.map(data, function(item) {
                            return {
                                value: item.ingredient_id,
                                label: item.ingredient
                            };
                        }));
                    }
                }).fail(function() {
                    searchRequest = null;
                });
            }
    });
});

function add()
{
    save_method = 'add';
    $('.recipe-form')[0].reset(); // reset form on modals
    $('div.append-div').remove();
    $('#large').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Recipe'); // Set title to Bootstrap modal title
}

function edit(id)
{
    save_method = 'update';
    $('div.append-div').remove();
    $.ajax({
        url : "<?php echo site_url('admin/recipe_edit')?>/" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            use_ingradients = JSON.parse(data.use_ingradients);
            $('[name="id"]').val(data.recipe_id);
            $('[name="recipe_title"]').val(data.recipe_title);
            $('[name="recipe_intro"]').val(data.recipe_intro);
            $('[name="preparation_steps"]').val(data.preparation_steps);
            $('[name="author"]').val(data.author);
            $('[name="recipe_category_id"]').val(data.recipe_category_id);

            $.each(use_ingradients, function(index, val) {
                if(index == 0)
                {
                    $('[name="ingredient[]"]').val(val.ingredient);
                    $('[name="quantity[]"]').val(val.quantity);
                    $('[name="unit[]"]').val(val.unit);
                }
                else
                {
                    var html1 = '';
                    var url = "<?php echo site_url('admin/get_ingredient_units')?>";
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        success: function(res) {
                            res = JSON.parse(res);
                            $.each(res, function(i, v) {
                                if(v.sign == val.unit)
                                {
                                    html1 += '<option value="'+ v.sign +'" selected>'+ v.sign + ' </option>';
                                }
                                else
                                {
                                    html1 += '<option value="'+ v.sign +'">'+ v.sign + ' </option>';
                                }
                            });

                            var html = '<div class="row form-group append-div">' +
                                        '<div class="col-md-4">' +
                                            '<input class="form-control search-ingredients" value="'+ val.ingredient +'" type="text" name="ingredient[]" placeholder="Search Ingredient">' +
                                        '</div>' +
                                        '<div class="col-md-3">' +
                                            '<input class="form-control" type="text" value="'+val.quantity+'" name="quantity[]" placeholder="Ingredient Quantity">' +
                                        '</div>' +
                                        '<div class="col-md-3">' +
                                            '<select class="form-control" name="unit[]">' +
                                                '<option disabled>Select Unit</option>';

                            var html2 ='</select>' +
                                        '</div>' +
                                        '<div class="col-md-1">' +
                                            '<button type="button" class="form-control btn red btn-outline remove-ingredient"><i class="fa fa-minus"></i></button>' +
                                        '</div>';

                            $("#ingredient").append(html+html1+html2);

                            $("#ingredient").find('.search-ingredients').autocomplete({
                                minLength: 1,
                                source: function(request, response) {
                                        if (searchRequest !== null) {
                                            searchRequest.abort();
                                        }
                                        searchRequest = $.ajax({
                                            url: '<?php echo site_url("admin/autocomplete_ingredients")?>',
                                            method: 'post',
                                            dataType: "json",
                                            data: {term: request.term},
                                            success: function(data) {
                                                searchRequest = null;
                                                response($.map(data, function(item) {
                                                    return {
                                                        value: item.ingredient,
                                                        label: item.ingredient
                                                    };
                                                }));
                                            }
                                        }).fail(function() {
                                            searchRequest = null;
                                        });
                                    }
                            });

                        }
                    });
                }
            });
            // $('[name="preparation_steps"]').val(data.preparation_steps);

            $('#large').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Roles'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function delete1(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/recipe_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                alertify.success(data.message);
                $("#table1").dataTable().fnDraw();
                return false;
            }
        });
    }
}
</script>

<?php
$this->load->view('admin_include/right_sidebar');
$this->load->view('admin_include/footer');
?>
