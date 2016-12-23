<body class="hold-transition skin-blue sidebar-mini">
    <section class="content-header">
      <h1>
        Tabungan
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Browse Data Master</li>
        <!-- <li><a href="#">Tables</a></li> -->
        <li class="active">Tabungan</li>
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
                <button type="button" class="btn btn-info btnShowModal" data-toggle="modal" data-target="#setor">Setor</button>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-danger btnShowModal" data-toggle="modal" data-target="#tarik">Tarik</button>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-success btnShowModal">Rek. Koran</button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableTabungan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%"></th>
                  <th width="15%">No Rekening</th>
                  <th width="25%">Nama</th>
                  <th width="35%">Alamat</th>
                  <th width="20%">Saldo</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($data_tabungan as $k=>$val) { ?>
                  <tr>
                    <td align="center">
                      <input type="checkbox" name="checklist" id="checklist" data="<?php echo $val->mt_no_rekening; ?>" class="checklist">
                    </td>
                    <td><?php echo $val->mt_no_rekening; ?></td>
                    <td><?php echo $val->mn_nama_nasabah; ?></td>
                    <td><?php echo $val->mn_alamat_nasabah; ?></td>
                    <td align="right"><?php echo 'Rp. '.number_format($saldo[$k],0,',','.');?></td>
                  </tr>
                  <?php
                }
                ?>
               
                </tfoot>
              </table>

              <!-- Modal -->
              <div class="modal fade" id="setor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <form method="post" role="form" action="proses_setor" >
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Setor</h4>
                    </div>
                    <div class="modal-body">
                      
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal_setor" placeholder="0" name="nominal_setor">
                            <input type="hidden" class="form-control" id="mt_no_rekening_setor" name="mt_no_rekening_setor">
                          </div>
                        </div>
                        <!-- <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnSubmitSetor" name="btnSubmitSetor">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="tarik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="post" role="form" action="proses_tarik" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tarik</h4>
                      </div>
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal_tarik" placeholder="0" name="nominal_tarik">
                            <input type="hidden" class="form-control" id="mt_no_rekening_tarik" name="mt_no_rekening_tarik">
                          </div>
                        </div>
                        <!-- <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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

<script>
  var itemchecked = '';
  $(function () {
    $('#tableTabungan').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $(document).ready(function(){
    $(document).on('click', '.btnShowModal', function(e){
      e.preventDefault();
      var hidden_no_rek = $("#mt_no_rekening_tarik").val();
      if(hidden_no_rek == '') {
        alert('Silakan pilih salah satu nasabah dibawah ini!');
        return false;
      }
    });

    $(document).on('click', ' #checklist', function(){
      var no_rek = $(this).attr('data');
      console.log(no_rek);
      $("#mt_no_rekening_tarik").val(no_rek);
      $("#mt_no_rekening_setor").val(no_rek);

      $(".checklist").prop("checked", false);
      $(this).prop("checked", true);
    });
  });
</script>
</body>
</html>
