<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
<section class="content-header">
  <h1>
    Register Master Tabungan
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <!-- /.box-header -->
    <div class="box-body">
      <form action="<?php echo base_url().'master_tabungan/'.$action; ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>No Rekening</label>
              <input type="hidden" name="mt_id" value="<?php echo isset($edit['mt_id']) ? $edit['mt_id'] : '' ?>"></input>
              <input type="text" name="mt_no_rekening" class="form-control" value="<?php echo isset($edit['mt_no_rekening']) ? $edit['mt_no_rekening'] : '' ?>" required>
            </div>
            <div class="form-group">
              <label>ID Nasabah</label>
                <input type="text" name="mt_id_nasabah" class="form-control" value="<?php echo isset($edit['mt_id_nasabah']) ? $edit['mt_id_nasabah'] : '' ?>"> 
            </div>
            <div class="form-group">
              <label>Integrasi</label>
                <input type="text" name="mt_integrasi" class="form-control" value="<?php echo isset($edit['mt_integrasi']) ? $edit['mt_integrasi'] : '' ?>"> 
            </div>
            <div class="form-group">
              <label>Produk</label>
              <input type="text" name="mt_produk" class="form-control" value="<?php echo isset($edit['mt_produk']) ? $edit['mt_produk'] : '' ?>">
            </div>
            <div class="form-group">
              <label>Pemilik</label>
                <input type="text" name="mt_pemilik" class="form-control" value="<?php echo isset($edit['mt_id_nasabah']) ? $edit['mt_id_nasabah'] : '' ?>"> 
            </div>
            <div class="form-group">
              <label>Group 1</label>
                <input type="text" name="mt_group1" class="form-control" value="<?php echo isset($edit['mt_group1']) ? $edit['mt_group1'] : '' ?>"> 
            </div>
            <div class="form-group">
              <label>Group 2</label>
                <input type="text" name="mt_group2" class="form-control" value="<?php echo isset($edit['mt_group2']) ? $edit['mt_group2'] : '' ?>"> 
            </div>
            <div class="form-group">
              <label>Group 3</label>
                <input type="text" name="mt_group3" class="form-control" value="<?php echo isset($edit['mt_group3']) ? $edit['mt_group3'] : '' ?>"> 
            </div>
            <div class="form-group">
              <label>Saldo Minimum</label>
              <select class="form-control select2" id="mt_saldo_minimum" name="mt_saldo_minimum" style="width: 100%;">
                <option value="Rp. 25000">Rp. 25000</option>
                <option value="Rp. 50000">Rp. 50000</option>
                <option value="Rp. 100000">Rp. 100000</option>
              </select>
            </div>
            <div class="form-group">
              <label>Setoran Minimum</label>
              <select class="form-control select2" id="mt_setoran_minimum" name="mt_setoran_minimum" style="width: 100%;">
                <option value="Rp. 25000">Rp. 25000</option>
                <option value="Rp. 50000">Rp. 50000</option>
                <option value="Rp. 100000">Rp. 100000</option>
              </select>
            </div>
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        <div class="box-footer"> 
          <button type="submit" class="btn btn-primary"><?php echo isset($edit['mt_id']) ? 'Update' : 'Simpan Registrasi' ?></button>
          <button type="button" id="batal_registrasi" class="btn btn-danger"><?php echo isset($edit['mt_id']) ? 'Batal' : 'Batal Registrasi' ?></button>
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

    $('#batal_registrasi').click(function(){
      location.href = "<?php echo base_url(); ?>master_tabungan/list_data"
    });  
    
    $("#mt_saldo_minimum option").filter(function() {
        return $(this).text() == "<?php echo $edit['mt_saldo_minimum']; ?>"; 
    }).prop('selected', true);

    $("#mt_setoran_minimum option").filter(function() {
        return $(this).text() == "<?php echo $edit['mt_setoran_minimum']; ?>"; 
    }).prop('selected', true);
  });
</script>