
<body class="hold-transition skin-blue sidebar-mini">
  <div class="alert alert-danger alert-dismissible" style="display: none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Silakan pilih salah satu nasabah dibawah ini!
  </div>
    <section class="content-header">
      <h1>
        Kredit
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Browse Data Master</li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Kredit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Tabungan</h3> -->
              <div class="btn-group">
                <button type="button" class="btn btn-info btnShowModal" data-toggle="modal" data-target="#angsuran">Angsuran</button>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-success">Riwayat</button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableTabungan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%"></th>
                  <th width="25%">No Rekening</th>
                  <th width="30%">Nama</th>
                  <th width="40%">Alamat</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($data_kredit as $k=>$val) { ?>
                  <tr>
                    <td align="center">
                      <input type="checkbox" name="checklist" id="checklist" data="<?php echo $val->mk_no_rekening; ?>" class="checklist">
                    </td>
                    <td><?php echo $val->mk_no_rekening; ?></td>
                    <td><?php echo $val->mn_nama_nasabah; ?></td>
                    <td><?php echo $val->mn_alamat_nasabah; ?></td>
                  </tr>
                  <?php
                }
                ?>
               
                </tfoot>
              </table>

              <!-- Modal -->
              <div class="modal fade modalangsuran" id="angsuran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <form method="post" role="form" action="proses_angsur" >
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Angsuran</h4>
                    </div>
                    <div class="modal-body">
                      
                        <div class="box-body">
                          <div class="form-group">
                            <label for="no_rekening_kredit">No. Rekening</label>
                            <input type="text" class="form-control" id="no_rekening_kredit" name="no_rekening_kredit" disabled value="">
                            <label for="nominal_angsuran">Nominal Angsuran</label>
                            <input type="text" class="form-control" id="nominal_angsuran" name="nominal_angsuran" disabled value="">
                            <input type="hidden" class="form-control" id="mk_no_rekening_kredit" name="mk_no_rekening_kredit">
                            
                          </div>
                        </div>
                        <!-- <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnSubmitSetor" name="btnSubmitSetor">Proses</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

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
    $('#tableTabungan').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $(document).ready(function(){
    $(document).on('click', '.btnShowModal', function(e){
      e.preventDefault();
      var hidden_no_rek = $("#mk_no_rekening_kredit").val();
      if(hidden_no_rek == '') {
        $(".alert").show();
        $('.modalangsuran').modal('hide');
      }
    });

    $(document).on('click', ' #checklist', function(){
      var no_rek = $(this).attr('data');
      console.log(no_rek);
      $("#mk_no_rekening_kredit").val(no_rek);
      $("#no_rekening_kredit").val(no_rek);

      $(".checklist").prop("checked", false);
      $(this).prop("checked", true);
    });
  });
</script>
</body>
</html>
