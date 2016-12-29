<!DOCTYPE html>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>

<style>
  button: {
    color: red;
  }
</style>

<section class="content-header">
  <h1>
    Register Master Kredit
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <!-- /.box-header -->
    <div class="box-body">
      <form class="form-horizontal" style="margin-bottom: 20px">
        <div class="form-group" >
          <label for="inputEmail3" class="col-sm-2 control-label">Tgl. Trans:</label>
          <div class="col-sm-7">
            <label style="margin-top: 6px;"><?php echo $time; ?></label>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Uraian:</label>
          <div class="col-sm-7">
            <input type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">No Bukti:</label>
          <div class="col-sm-7">
            <input type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <div class="box-footer" style="margin-left:100px">
          <button type="submit" style="margin-right:30px" class="btn btn-info col-sm-1">Tambah</button>
          <button type="button" style="margin-right:30px" class="btn btn-info col-sm-1">Batal</button>
          <button type="button" style="margin-right:30px" class="btn btn-info col-sm-1">Histori</button>
          <button type="button" style="margin-right:30px" class="btn btn-info col-sm-1">Posting</button>
        </div>
      </form>

      <div class="hr"><hr /></div>
      <!-- /.row -->
      <table  id="grid" class="table table-bordered table-striped table-hover display">
            <thead>
              <tr>
                <th hidden="true"></th>
                <th>NO KD.PERK</th>
                <th>NM. PERK</th>
                <th>Debet</th>
                <th>Kredit</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list_data as $data){ 
                    echo "<tr>";
                  echo "<td hidden='true'>".$data['tj_id']."</td>";
                  echo "<td>".$data['tj_kode_perkiraan']."</td>";
                  echo "<td>".$data['tj_nama_perkiraan']."</td>";
                  echo "<td>".$data['tj_debet']."</td>";
                  echo "<td>".$data['tj_kredit']."</td>";
                  echo "</tr>";
              }?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
  </div>
  <!-- /.box -->
</section>

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