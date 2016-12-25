<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
<section class="content-header">
  <h1>
    Register Master Kredit
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form id="dischargeform" action="<?php echo base_url().'master_kredit/'.$action; ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>No Rekening</label>
              <input type="hidden" name="mk_id" value="<?php echo isset($edit['mk_id']) ? $edit['mk_id'] : '' ?>">
              <input type="text" name="mk_no_rekening" class="form-control" value="<?php echo isset($edit['mk_no_rekening']) ? $edit['mk_no_rekening'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Nasabah</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_nasabah" class="form-control" value="<?php echo isset($edit['mk_nasabah']) ? $edit['mk_nasabah'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Produk</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_produk" class="form-control" value="<?php echo isset($edit['mk_produk']) ? $edit['mk_produk'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Kode Group II</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_kode_group_2" class="form-control" value="<?php echo isset($edit['mk_kode_group_2']) ? $edit['mk_kode_group_2'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Type</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_type" class="form-control" value="<?php echo isset($edit['mk_type']) ? $edit['mk_type'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Jumlah Angsuran</label>
              <select name="mk_jumlah_angsuran" class="form-control select2" style="width: 100%;">
                <option selected="selected">12</option>
                <option>24</option>
                <option>32</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Tagih</label>
              <select name="mk_tanggal_tagih" class="form-control select2" style="width: 100%;">
                <option selected="selected">1</option>
                <option>2</option>
                <option>3</option>
              </select>
            </div>
            <div class="form-group">
              <label>Suku Bunga</label>
              <input type="text" name="mk_suku_bunga" class="form-control" value="<?php echo isset($edit['mk_suku_bunga']) ? $edit['mk_suku_bunga'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Adm. Lain</label>
              <input type="text" name="mk_adm_lain" class="form-control" value="<?php echo isset($edit['mk_adm_lain']) ? $edit['mk_adm_lain'] : '' ?>">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              <label>No Alternatif</label>
              <input type="text" name="mk_no_alternatif" class="form-control" value="<?php echo isset($edit['mk_no_alternatif']) ? $edit['mk_no_alternatif'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Kode Integrasi</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_kode_integrasi" class="form-control" value="<?php echo isset($edit['mk_kode_integrasi']) ? $edit['mk_kode_integrasi'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Group I</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_group1" class="form-control" value="<?php echo isset($edit['mk_group1']) ? $edit['mk_group1'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Kode Group III</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_kode_group_3" class="form-control" value="<?php echo isset($edit['mk_kode_group_3']) ? $edit['mk_kode_group_3'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Jangka Waktu</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mk_jangka_waktu" class="form-control" value="<?php echo isset($edit['mk_jangka_waktu']) ? $edit['mk_jangka_waktu'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Tanggal Tempo</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="mk_tanggal_tempo" class="form-control pull-right" id="datepicker" value="<?php echo isset($edit['mk_tanggal_tempo']) ? $edit['mk_tanggal_tempo'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label>Periode</label>
              <input type="text" name="mk_periode" class="form-control" value="<?php echo isset($edit['mk_periode']) ? $edit['mk_periode'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Jumlah Pinjam</label>
              <input type="text" name="mk_jumlah_pinjam" class="form-control" value="<?php echo isset($edit['mk_jumlah_pinjam']) ? $edit['mk_jumlah_pinjam'] : '' ?>">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary"><?php echo isset($edit['mk_id']) ? 'Update Data Kredit' : 'Simpan Registrasi Kredit' ?></button>
          <!-- <button type="submit" class="btn btn-danger">Batalkan Registrasi</button> -->
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
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>