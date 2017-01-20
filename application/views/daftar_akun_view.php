<body class="hold-transition skin-blue sidebar-mini">
  <div class="alert alert-danger alert-dismissible" style="display: none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Silakan pilih salah satu nasabah dibawah ini!
  </div>
    <section class="content-header">
      <h1>
        Daftar Akun
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Daftar Akun</li>
        <!-- <li><a href="#">Tables</a></li> -->
        <!-- <li class="active">Tabungan</li> -->
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
                <button type="button" class="btn btn-info btnShowModal" data-toggle="modal" data-target="#addNew">Add</button>
              </div>
              <!-- <div class="btn-group">
                <button type="button" class="btn btn-danger btnShowModal" data-toggle="modal" data-target="#tarik">Tarik</button>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-success btnShowModal">Rek. Koran</button>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableAkun" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th width="5%"></th> -->
                  <th width="15%">Kode Akun</th>
                  <th width="35%">Nama Akun</th>
                  <th width="25%">Kategori</th>
                  <!-- <th width="35%">Subkategori</th> -->
                  <th width="5%">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($data_akun as $k=>$val) { ?>
                  <tr>
                    <td><?php echo $val->mc_kode_coa; ?></td>
                    <td><?php echo $val->mc_nama_coa; ?></td>
                    <td><?php echo $val->kc_nama_kategori; ?></td>
                    <!-- <td><?php echo $val->sc_nama_subkategori; ?></td> -->
                  </tr>
                  <?php
                }
                ?>
               
                </tfoot>
              </table>

              <!-- modal alert -->
              <div class="modal fade warning" id="danger-alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Warning!</h4>
                      Silakan pilih salah satu nasabah dibawah ini!
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade modaltrans" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <form method="post" role="form" action="proses_setor" >
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Add</h4>
                    </div>
                    <div class="modal-body">
                      
                        <div class="box-body">
                          <div class="form-group">
                            <label for="mc_nama_coa">Nama Akun</label>
                            <input type="text" class="form-control" id="mc_nama_coa" name="mc_nama_coa" value="">
                            <label for="mc_deskripsi">Description</label>
                            <textarea name="mc_deskripsi" id="mc_deskripsi" class="form-control"></textarea>
                            <label for="mc_id_kategori">Kategori</label>
                            <select name="mc_id_kategori" id="mc_id_kategori" class="form-control">
                              <?php
                              foreach($category as $k=>$val)
                              {
                                ?>
                                <option value="<?php echo $val->kc_id;?>"><?php echo $val->kc_kode_kategori.' - '.$val->kc_nama_kategori; ?></option>
                                <?php
                              }
                              ?>
                            </select>
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
    $('#tableAkun').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $(document).ready(function(){
    // $(document).on('click', '.btnShowModal', function(e){
    //   e.preventDefault();
    //   var hidden_no_rek = $("#mt_no_rekening_tarik").val();
    //   if(hidden_no_rek == '') {
    //     $(".alert").show();
    //     $('.modaltrans').modal('hide');
    //   }
    // });

    // $(document).on('click', ' #checklist', function(){
    //   var no_rek = $(this).attr('data');
    //   console.log(no_rek);
    //   $("#mt_no_rekening_tarik").val(no_rek);
    //   $("#mt_no_rekening_setor").val(no_rek);
    //   $("#no_rekening_tarik").val(no_rek);
    //   $("#no_rekening_setor").val(no_rek);

    //   $(".checklist").prop("checked", false);
    //   $(this).prop("checked", true);
    // });
  });
</script>
</body>
</html>
