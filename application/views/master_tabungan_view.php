<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
<section class="content-header">
  <h1>
    Register Master Tabungan
  </h1>
 <!--  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">Advanced Elements</li>
  </ol> -->
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
      <form action="<?php echo base_url(); ?>master_tabungan/save" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>No Rekening</label>
              <input type="text" name="mt_no_rekening" class="form-control">
            </div>
            <div class="form-group">
              <label>ID Nasabah</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mt_id_nasabah" class="form-control"> 
              </div>
            </div>
            <div class="form-group">
              <label>Integrasi</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mt_integrasi" class="form-control"> 
              </div>
            </div>
            <div class="form-group">
              <label>Produk</label>
              <input type="text" name="mt_produk" class="form-control">
            </div>
            <div class="form-group">
              <label>Pemilik</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mt_pemilik" class="form-control"> 
              </div>
            </div>
            <div class="form-group">
              <label>Group 1</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mt_group1" class="form-control"> 
              </div>
            </div>
            <div class="form-group">
              <label>Group 2</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mt_group2" class="form-control"> 
              </div>
            </div>
            <div class="form-group">
              <label>Group 3</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" name="mt_group3" class="form-control"> 
              </div>
            </div>
            <div class="form-group">
              <label>Saldo Minimum</label>
              <select class="form-control select2" name="mt_saldo_minimum" style="width: 100%;">
                <option selected="selected">Rp. 25000</option>
                <option>Rp. 50000</option>
                <option>Rp. 100000</option>
              </select>
            </div>
            <div class="form-group">
              <label>Setoran Minimum</label>
              <select class="form-control select2" name="mt_setoran_minimum" style="width: 100%;">
                <option selected="selected">Rp. 25000</option>
                <option>Rp. 50000</option>
                <option>Rp. 100000</option>
              </select>
            </div>
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan Registrasi</button>
          <button type="submit" class="btn btn-danger">Batal Registrasi</button>
        </div>
      </form>
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