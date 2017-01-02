<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
<section class="content-header">
  <h1>
    Register Master Nasabah
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <!-- /.box-header -->
    <div class="box-body">
      <form id="dischargeform" action="<?php echo base_url().'master_nasabah/'.$action; ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>ID Nasabah</label>
              <input type="hidden" name="mn_id" value="<?php echo isset($edit['mn_id']) ? $edit['mn_id'] : '' ?>">
              <input type="text" name="mn_id_nasabah" class="form-control" readOnly=true value="<?php echo isset($edit['mn_id_nasabah']) ? $edit['mn_id_nasabah'] : $id_nasabah ?>">
            </div>
            <div class="form-group">
              <label>Nama Nasabah</label>
              <input type="text" name="mn_nama_nasabah" class="form-control" value="<?php echo isset($edit['mn_nama_nasabah']) ? $edit['mn_nama_nasabah'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Nama Ibu Kandung</label>
              <input type="text" name="mn_nama_ibu_kandung" class="form-control" value="<?php echo isset($edit['mn_nama_ibu_kandung']) ? $edit['mn_nama_ibu_kandung'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Alamat Nasabah</label>
              <textarea name="mn_alamat_nasabah" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label>Jenis Identitas</label>
              <select name="mn_jenis_identitas" class="form-control select2" style="width: 100%;">
                <option value="sim" selected="selected">Sim</option>
                <option value="ktp">Ktp</option>
                <option value="dll">Lainnya</option>
              </select>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              <label>No Alternatif</label>
              <input type="text" name="mn_no_alternatif" readOnly=true class="form-control"  value="<?php echo isset($edit['mn_no_alternatif']) ? $edit['mn_no_alternatif'] : $id_nasabah ?>">
            </div>
            <div class="form-group">
              <label>Nama Alias</label>
              <input type="text" name="mn_nama_alias" class="form-control"  value="<?php echo isset($edit['mn_nama_alias']) ? $edit['mn_nama_alias'] : '' ?>">
            </div>

            <div class="form-group">
            <label>Jenis Kelamin</label>
              <div class="row">
                <div class="col-lg-6">
                  <div class="radio">
                    <label>
                      <input type="radio" name="mn_jekel" id="optionsRadios1" value="L" checked value="<?php echo isset($edit['mn_jekel']) ? $edit['mn_jekel'] : '' ?>">
                      Laki-laki
                    </label>
                  </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <div class="input-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="mn_jekel" id="optionsRadios1" value="P" value="<?php echo isset($edit['mn_jekel']) ? $edit['mn_jekel'] : '' ?>">
                          Perempuan
                        </label>
                      </div>
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="mn_tempat_lahir" class="form-control"  value="<?php echo isset($edit['mn_tempat_lahir']) ? $edit['mn_tempat_lahir'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="mn_tanggal_lahir" class="form-control pull-right" id="datepicker" value="<?php echo isset($edit['mn_tanggal_lahir']) ? $edit['mn_tanggal_lahir'] : '' ?>">
              </div>
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary" style="margin-left:-9px"><?php echo isset($edit['mn_id']) ? 'Update Data Nasabah' : 'Simpan Registrasi Nasabah' ?></button>
          <!-- <button type="button" class="btn btn-danger">Batalkan Registrasi</button> -->
        </div>
      </form>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
  </div>
  <!-- /.box -->
</section>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel3">Konfirmasi</h3>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menyimpan data nasabah ini?</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
        <button class="btn-primary btn" id="SubForm">Iya</button>
      </div>
    </div>
  </div>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true 
    });

    $("#dischargeform").validate({
      rules: {
          mn_id_nasabah: "required",
          mn_nama_nasabah: "required",
      },
      messages: {
          mn_id_nasabah: "id nasabah masih kosong",
          mn_nama_nasabah: "nama nasabah masih kosong",
      },
      submitHandler: function (form) {
          $("#myModal").modal('show');
          $('#SubForm').click(function () {
              form.submit();
         });
      }
    });
  });
</script>