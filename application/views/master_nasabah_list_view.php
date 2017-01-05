<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>


<section class="content-header">
  <h1>
    List Master Nasabah
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="margin">
          <a href="<?php echo base_url(); ?>master_nasabah" class="btn btn-app">
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
                <th>ID Nasabah</th>
                <th>No Alternatif</th>
                <th>Nama Nasabah</th>
                <th>Nama Alias</th>
                <th>Nama Ibu Kandung</th>
                <th>Jenis Kelamin</th>
                <th>Alamat Nasabah</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Identitas</th>
                <th>Nomer Identitas</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list_data as $data){ 
                    echo "<tr>";
                  echo "<td hidden='true'>".$data['mn_id']."</td>";
                  echo "<td>".$data['mn_id_nasabah']."</td>";
                  echo "<td>".$data['mn_no_alternatif']."</td>";
                  echo "<td>".$data['mn_nama_nasabah']."</td>";
                  echo "<td>".$data['mn_nama_alias']."</td>";
                  echo "<td>".$data['mn_nama_ibu_kandung']."</td>";
                  echo "<td>".$data['mn_jekel']."</td>";
                  echo "<td>".$data['mn_alamat_nasabah']."</td>";
                  echo "<td>".$data['mn_tempat_lahir']."</td>";
                  echo "<td>".$data['mn_tanggal_lahir']."</td>";
                  echo "<td>".$data['mn_jenis_identitas']."</td>";
                  echo "<td>".$data['mn_nomor_identitas']."</td>";
                  echo "</tr>";
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
        location.href = "<?php echo base_url(); ?>master_nasabah/index/" + params[0]; 
      }
    });

    $('#deleteButton').click( function (){
      var params = table.row('.selected').data();

      if(!params) {
        alert('Select row first !');
      } else {
        if (confirm("Are you sure?")) {
          $.ajax({
            url: "<?php echo base_url().'master_nasabah/delete/'; ?>"+params[0],
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