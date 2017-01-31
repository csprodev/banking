<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()  ; ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>



<section class="content-header">
  <h1>
    Sys Menu
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="margin">
          <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal_menu"><i class="fa fa-plus"></i>Add</button>
          <a id="editButton" class="btn btn-app">
            <i class="fa fa-edit"></i> Edit
          </a>
          <a  id="deleteButton" class="btn btn-app">
            <i class="fa fa-trash"></i> Delete
          </a>
        </div>
        <div class="box-body">
          <table width="1500px" id="grid" class="table table-bordered table-striped table-hover display">
            <thead>
              <tr>
                <th hidden="true"></th>
                <th>No</th>
                <?php
                $hide_column = array('sm_id', 'sm_user_id');
                foreach ($column_table as $key => $data) 
                {
                  if(!in_array($data['COLUMN_NAME'], $hide_column))
                    echo "<th>".str_replace('_', ' ', substr($data['COLUMN_NAME'], 3))."</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach($list_data as $data)
                { 
                  echo "<tr>";
                  echo "<td hidden='true'>".$data['sm_id']."</td>";
                  echo "<td>".$no."</td>";
                  echo "<td>".$data['sm_title']."</td>";
                  if($data['sm_is_child'] == 1){
                    echo "<td>Yes</td>";
                  } else {
                    echo "<td>No</td>";
                  }
                  echo "<td>".$data['sm_controller']."</td>";
                  echo "<td>".$data['sm_icon']."</td>";
                  echo "<td>".$data['sm_id_parent']."</td>";
                  echo "<td>".$data['sm_order']."</td>";
                  echo "<td>".$data['sm_is_parent']."</td>";
                  echo "<td>".$data['sm_is_active']."</td>";
                  echo "</tr>";
                  $no++;
              }?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="modal fade modal_menu" id="modal_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document" style="width:700px">
      <div class="modal-content">
        <form method="post" id="form_menu" role="form" action="sys_menu/save">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Form User</h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title"  value="" required>
                  <input type="hidden" class="form-control" id="id" name="id">
                </div>
                <div class="form-group">
                  <label for="controller">Controller</label>
                  <input type="text" class="form-control" id="controller" name="controller" value="" >
                </div>
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control" id="icon" name="icon" value="">
                </div>
                <div class="form-group">
                  <label for="order">Order</label>
                  <input type="text" class="form-control" id="order" name="order" value="">
                </div>
                
                <div class="row">
                  <div class="col-lg-3">
                    <label for="is_active">Is Active</label><br/>
                    <label>
                      <input type="checkbox" name="is_active"  class="flat-red" checked>
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <label for="is_parent">Is Parent</label><br/>
                    <label>
                      <input id="is_parent" name="is_scope" type="radio" value="is_parent" class="flat-red" checked>
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <label for="is_child">Is Child</label><br/>
                    <label>
                      <input id="is_child" name="is_scope" type="radio" value="is_child" class="flat-red">
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label>Parent</label>
                  <select id="id_parent" name="id_parent" class="form-control select2" style="width: 100%;" disabled>
                    <option>---</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btn_cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>

<script>
  $(function () {
    $(".select2").select2({
      ajax: {
        url: "sys_menu/get_parent",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          return {
            results: $.map(data, function(obj) {
                return { id: obj.sm_id, text: obj.sm_title};
            }),
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
      minimumResultsForSearch: -1
    });

    $('input:radio[id=is_child]').on('ifChecked', function(event){
      $("select[id=id_parent]").attr('disabled', false);
    });

    $('input:radio[id=is_child]').on('ifUnchecked', function(event){
      $("select[id=id_parent]").attr('disabled', true);
    });

    var table = $('#grid').DataTable({
      "scrollX": true
    });

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    $('#grid tbody').on( 'click', 'tr', function (a) {
      if ( $(this).hasClass('selected')){
        $(this).removeClass('selected');
      } 
      else {
        var d = table.row( this ).data();
        table.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
      }
    });

    $('#editButton').click( function (){
      var params = table.row('.selected').data();
      if(!params) {
        alert('Select row first!');
      } else {
        $.ajax({
          url: "<?php echo base_url().'sys_menu/data_edit/'; ?>"+params[0],
          context: document.body,
          success:function(res) {
            if(res == 'success'){
              table.row('.selected').remove().draw( false );
            } else {
              var data = jQuery.parseJSON(res);
              $('#title').val(data.sm_title);
              $('#controller').val(data.sm_controller);
              $('#icon').val(data.sm_icon);
              $('#order').val(data.sm_order);

              if(data.sm_is_parent == 1){
                $('input:checkbox[id=is_parent]').attr('checked', true).iCheck('update');
              } else {
                $('input:checkbox[id=is_parent]').removeAttr('checked', true).iCheck('update');
              }

              if(data.sm_is_child == 1){
                $('input:checkbox[id=is_child]').attr('checked', true).iCheck('update');
                $("select[id=id_parent]").attr('disabled', false);
              } else {
                $('input:checkbox[id=is_child]').removeAttr('checked', true).iCheck('update');
                $("select[id=id_parent]").attr('disabled', true);
              }

              if(data.sm_is_active == 1){
                $('input:checkbox[id=is_active]').attr('checked', true).iCheck('update');
              } else {
                $('input:checkbox[id=is_active]').removeAttr('checked', true).iCheck('update');
              }

              $('#modal_menu').modal('toggle');
              $('#modal_menu').modal('show');
            }
          }
        });
      }
    });

    $('#deleteButton').click( function (){
      var params = table.row('.selected').data();

      if(!params) { 
        alert('Select row first !');
      } else {
        if (confirm("Are you sure?")) {
          $.ajax({
            url: "<?php echo base_url().'sys_menu/delete/'; ?>"+params[0],
            context: document.body,
            success:function(res) {
              if(res == 'success'){
                table.row('.selected').remove().draw( false );
              } else {
                alert(res);
              }
            }
          });
        }
        return false;
      }
    });

    $("#btn_cancel").click(function() {
      $(this).closest('form').find("input", "#form_menu").val("").removeAttr('checked').removeAttr('selected');
      $('input:radio[id=is_parent]').prop('checked', true).iCheck('update');
      $('input:radio[id=is_child]').removeAttr('checked', true).iCheck('update');
      $("select[id=id_parent]").attr('disabled', true);
    });

  });
</script>