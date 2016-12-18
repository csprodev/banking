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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableTabungan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="15%">No Rekening</th>
                  <th width="20%">Nama</th>
                  <th width="30%">Alamat</th>
                  <th width="15%">Saldo</th>
                  <th width="20%"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td align="right"><?php echo 'Rp. '.number_format(100000,0,',','.');?></td>
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#setor">Setor</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tarik">Tarik</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">Rek. Koran</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning">Copy</button>
                    </div>
                  </td>
                </tr>
               
                </tfoot>
              </table>

              <!-- Modal -->
              <div class="modal fade" id="setor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Setor</h4>
                    </div>
                    <div class="modal-body">
                      <form role="form">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal" placeholder="0">
                          </div>
                        </div>
                        <!-- <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="tarik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Tarik</h4>
                    </div>
                    <div class="modal-body">
                      <form role="form">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal" placeholder="0">
                          </div>
                        </div>
                        <!-- <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
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
    $(".sidebar-menu li").removeClass('active');
    $(".sidebar-menu li").addClass('active');
  });
</script>
</body>
</html>
