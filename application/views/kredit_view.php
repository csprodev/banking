
<body class="hold-transition skin-blue sidebar-mini">

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
                <button type="button" class="btn btn-info">Angsuran</button>
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
                <tr>
                  <td align="center">
                    <input type="checkbox" name="">
                  </td>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                </tr>
               
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
    $('#tableTabungan').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
