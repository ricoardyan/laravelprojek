<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Oricraft Store Produk</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('lte/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
     <link rel="stylesheet" href="{{asset('lte/plugins/datatables/dataTables.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('pages/section/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('pages/section/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
          <!-- /.card -->
          <div class="card" style="border-top: 2px solid blue;">
            <div class="card-header">
              <h3 class="card-title">Data Table Produk
                <a href="" data-toggle="modal" data-target="#masuk" class="btn btn-sm btn-success pull-right">Tambah Produk</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
              <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Nama Produk</th>
                                            <th>Tipe Produk</th>
                                            <th>Stok Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Gambar</th>
                                            <th>Status Produk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $no=1; ?>
                                      @foreach($produk as $prd)
                                        <tr>
                                          <th>{{$no}}. </th>
                                          <td>{{$prd->nama_produk}}</td>
                                          <td>{{$prd->tipe_produk}}</td>
                                          <td>{{$prd->stok}}</td>
                                          <td>{{$prd->harga}}</td>
                                          <td><img src="{{asset('gambar_produk')}}/{{$prd->gambar}}" width="150"></td>
                                          <td>
                                            @if($prd->status_produk=="Tersedia")
                                            <button type="text" class="btn btn-sm btn-success form-control">Tersedia</button>
                                            @endif
                                            @if($prd->status_produk!=="Tersedia")
                                            <button type="text" class="btn btn-sm btn-danger form-control">Tidak Tersedia</button>
                                            @endif
                                          </td>
                                          <td>
                                            <a href="" data-toggle="modal" data-target="#edit{{$prd->id_produk}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Update</a>
                                          </td>
                                        </tr>
                                        <?php $no++ ?>
                                        <!-- Edit Produk -->
                                           <div class="col-lg-12">
                        <div class="modal fade" id="edit{{$prd->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                            <h4 class="modal-title" id="H4"> Update Data Produk </h4>
                                        </div>
                                        <div class="modal-body">
                                          <?php $edit=DB::table('produk')->where('id_produk', $prd->id_produk)->get(); ?>
                                           <form role="form" method="post" enctype="multipart/form-data" action="{{route('editproduk')}}">
                                            @csrf
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input value="{{$prd->id_produk}}" name="id_produk" hidden="">
                                            <input class="form-control" value="{{$prd->nama_produk}}" name="nama_produk" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Produk</label>
                                            <input class="form-control" value="{{$prd->tipe_produk}}" name="tipe_produk" />
                                        </div>
                                       <div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control" value="{{$prd->stok}}" type="number" name="stok" />
                                        </div>
                                        <div class="form-group">
                                            <label>Rp. Harga</label>
                                            <input class="form-control" value="{{$prd->harga}}" type="number" name="harga" />
                                        </div>
                                        <div class="form-group">
                                          <label>Status Produk</label>
                                          <select class="form-control" name="status_produk">
                                            <option value="Tersedia"> Tersedia </option>
                                            <option value="Tidak Tersedia"> Tidak Tersedia </option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input class="form-control" type="file" name="gambar" />
                                        </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                                        <!-- Edit Produk -->
                                      @endforeach
                                    </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <div class="col-lg-12">
                        <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                            <h4 class="modal-title" id="H4"> New Data Produk </h4>
                                        </div>
                                        <div class="modal-body">
                                           <form role="form" method="post" enctype="multipart/form-data" action="{{route('addproduk')}}">
                                            @csrf
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input class="form-control" name="nama_produk" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Produk</label>
                                            <input class="form-control" name="tipe_produk" />
                                        </div>
                                       <div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control" type="number" name="stok" />
                                        </div>
                                        <div class="form-group">
                                            <label>Rp. Harga</label>
                                            <input class="form-control" type="number" name="harga" />
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input class="form-control" type="file" name="gambar" />
                                        </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('pages/section/footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('lte/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="{{asset('lte/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jVectorMap -->
<script src="{{asset('lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.2 -->
<script src="{{asset('lte/plugins/chartjs-old/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('lte/dist/js/pages/dashboard2.js')}}"></script>
<!-- page script -->
<script src="{{asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
