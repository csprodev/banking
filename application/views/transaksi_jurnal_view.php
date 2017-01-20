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
    <div class="box-body">
      <form method="post" action="transaksi_jurnal/save" class="form-horizontal" style="margin-bottom: 20px">
        <div class="form-group" >
          <label for="inputEmail3" class="col-sm-2 control-label">Tgl. Trans:</label>
          <div class="col-sm-7">
            <!-- <label name="tj_tanggal_trans" style="margin-top: 6px;"><?php echo $time; ?></label> -->
            <input type="text" readOnly="true" name="tj_tanggal_trans" class="form-control" id="uraian" value="<?php echo $time; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Uraian:</label>
          <div class="col-sm-7">
            <input type="text" name="tj_uraian" class="form-control" id="uraian" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">No Bukti:</label>
          <div class="col-sm-7">
            <input type="text" name="tj_no_bukti" class="form-control" readOnly="true" id="noBukti" value="<?php echo $no_bukti; ?>">
          </div>
        </div>
        <div class="box-footer" style="margin-left:100px">
          <button type="button" data-toggle="modal" data-target="#tambah" style="margin-right:30px" class="btn btn-info col-sm-1">Tambah</button>
          <button type="button" style="margin-right:30px" class="btn btn-info col-sm-1">Batal</button>
          <button type="button" style="margin-right:30px" class="btn btn-info col-sm-1">Histori</button>
          <button type="submit" style="margin-right:30px" class="btn btn-info col-sm-1">Posting</button>
        </div>
      </form>

      <div class="hr"><hr /></div>
      <table  id="grid" class="table table-bordered table-striped table-hover display">
            <thead>
              <tr>
                <th hidden="true"></th>
                <th>NO KD.PERK</th>
                <th>NM. PERK</th>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list_data as $data)
              { 
                echo "<tr>";
                echo "<td hidden='true'>".$data['tj_id']."</td>";
                echo "<td>".$data['tj_kode_perkiraan']."</td>";
                echo "<td>".$data['tj_nama_perkiraan']."</td>";
                echo "<td>".$data['tj_debet']."</td>";
                echo "<td>".$data['tj_kredit']."</td>";
                echo "<td><a href='#' data-href='transaksi_jurnal/delete?id=".$data['tj_id']."' data-toggle='modal' data-target='#confirm-delete'><i class='fa fa-trash'></a></td>";
                echo "</tr>";
              }
              ?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
    </div>
    <div class="box-footer">
    </div>

    <div class="modal fade modaltrans" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" role="form" action="transaksi_jurnal/tambah_temp" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label for="tj_kode_perkiraan">Kode Perkiraan</label>
                  <!-- <input type="text" class="form-control" id="tj_kode_perkiraan" name="tj_kode_perkiraan"> -->
                  <select name="tj_kode_perkiraan" id="tj_kode_perkiraan" class="form-control">
                    <option value='' selected>-- Pilih Paket --</option>
                    <?php
                      if(!empty($rkp))
                      {
                        foreach($rkp as $key => $val)
                        {
                          echo "<option value='".$val['rkp_kode']."'>".$val['rkp_nama']."</option>";
                        }
                      }
                    ?>
                  </select>
                  
                  <label for="tj_nama_perkiraan">Keterangan</label>
                  <input type="text" class="form-control" id="tj_nama_perkiraan" name="tj_nama_perkiraan">

                  <label for="tj_debet">Debet</label>
                  <input type="text" class="form-control" id="tj_debet" placeholder="Rp." name="tj_debet">

                  <label for="tj_kredit">Kredit</label>
                  <input type="text" class="form-control" id="tj_kredit" placeholder="Rp." name="tj_kredit">
                </div>
              </div> 
            </div>
            <div class="modal-footer">
              <button type="button" id="tambahBatal" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" id="tambahSimpan" class="btn btn-primary btnSubmittambah" name="btnSubmittambah">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              Delete Transaksi Jurnal
          </div>
          <div class="modal-body">
              Anda ingin menghapus data ini?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <a class="btn btn-danger btn-ok">Delete</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(function () {
    var table = $('#grid').DataTable({
      "scrollX": true
    });

    $('#tambahSimpan').on('click',function(e){

      $.post("transaksi_jurnal/tambah_temp",
      {
          tj_kode_perkiraan: $('#tj_kode_perkiraan').val(),
          tj_nama_perkiraan: $('#tj_nama_perkiraan').val(),
          tj_debet: $('#tj_debet').val(),
          tj_kredit: $('#tj_kredit').val()
      },
      function(data, status){
          alert("Data saved");
      });
      $('#tambah').modal('toggle');
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

    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $('#batal').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $('#tambah').on('show.bs.modal', function(e) {
      var url = "<?php echo base_url().'transaksi_jurnal/ref_kode_perkiraan'; ?>";

      $.ajax({
          type: "POST",
          url: url,
          cache: false,
          success: function(result){
            document.getElementById("tj_kode_perkiraan").innerHTML = result;
          }
        });
    });

    $("select").change(function(){
      var currentId = $(this).attr("id");
      var url = "<?php echo base_url().'transaksi_jurnal/ref_kode_perkiraan'; ?>";
      
      if(currentId == 'kategori_perawatan'){
        kp_val = $(this).val();
        // script loading

        var send_data = "kp=" + kp_val + "&next_id=" + "type_perawatan";

        $.ajax({
          type: "POST",
          url: url,
          data: send_data,
          cache: false,
          success: function(result){
            
            document.getElementById("type_perawatan").innerHTML = result;
          }
        });
      }
    });

  });
</script>