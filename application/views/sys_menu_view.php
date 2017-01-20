<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
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
          <a href="<?php echo base_url(); ?>sys_menu" class="btn btn-app">
            <i class="fa fa-plus"></i>Add
          </a>
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
                foreach ($column_table as $key => $data) 
                {
                  if($data['COLUMN_NAME'] != 'sm_id')
                    echo "<th>".str_replace('_', ' ', substr($data['COLUMN_NAME'], 3))."</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach($list_data as $data){ 
                  echo "<tr>";
                  echo "<td hidden='true'>".$data['sm_id']."</td>";
                  echo "<td>".$no."</td>";
                  echo "<td>".$data['sm_title']."</td>";
                  echo "<td>".$data['sm_user_id']."</td>";
                  echo "<td>".$data['sm_is_child']."</td>";
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
</section>
<!-- /.content -->

<script>
  $(function () {
    var table = $('#grid').DataTable({
      "scrollX": true
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
        location.href = "<?php echo base_url(); ?>sys_menu/index/" + params[0]; 
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

  });
</script>