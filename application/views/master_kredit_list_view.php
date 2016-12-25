<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>


<section class="content-header">
  <h1>
    List Master kredit
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="margin">
          <a href="<?php echo base_url(); ?>master_kredit" class="btn btn-app">
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
          <table  id="grid" class="table table-bordered table-striped table-hover display">
            <thead>
              <tr>
                <th hidden="true"></th>
                <th>No Rekening</th>
                <th>No Alternatif</th>
                <th>Nasabah</th>
                <th>Kode Integrasi</th>
                <th>Produk</th>
                <th>Group I</th>
                <th>Kode Group II</th>
                <th>Kode Group III</th>
                <th>Type</th>
                <th>Jangka Waktu</th>
                <th>Jumlah Angsuran</th>
                <th>Tanggal Tempo</th>
                <th>Tanggal Tagih</th>
                <th>Periode</th>
                <th>Suku Bunga</th>
                <th>Jumlah Pinjam</th>
                <th>Adm. Lain</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list_data as $data){ 
                  echo "<tr>";
                  echo "<td hidden='true'>".$data['mk_id']."</td>";
                  echo "<td>".$data['mk_no_rekening']."</td>";
                  echo "<td>".$data['mk_no_alternatif']."</td>";
                  echo "<td>".$data['mk_nasabah']."</td>";
                  echo "<td>".$data['mk_kode_integrasi']."</td>";
                  echo "<td>".$data['mk_produk']."</td>";
                  echo "<td>".$data['mk_group1']."</td>";
                  echo "<td>".$data['mk_kode_group_2']."</td>";
                  echo "<td>".$data['mk_kode_group_3']."</td>";
                  echo "<td>".$data['mk_type']."</td>";
                  echo "<td>".$data['mk_jangka_waktu']."</td>";
                  echo "<td>".$data['mk_jumlah_angsuran']."</td>";
                  echo "<td>".$data['mk_tanggal_tempo']."</td>";
                  echo "<td>".$data['mk_tanggal_tagih']."</td>";
                  echo "<td>".$data['mk_periode']."</td>";
                  echo "<td>".$data['mk_suku_bunga']."</td>";
                  echo "<td>".$data['mk_jumlah_pinjam']."</td>";
                  echo "<td>".$data['mk_adm_lain']."</td>";
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
        location.href = "<?php echo base_url(); ?>master_kredit/index/" + params[0]; 
      }
    });

    $('#deleteButton').click( function (){
      var params = table.row('.selected').data();

      if(!params) {
        alert('Select row first !');
      } else {
        if (confirm("Are you sure?")) {
          $.ajax({
            url: "<?php echo base_url().'master_kredit/delete/'; ?>"+params[0],
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