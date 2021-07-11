<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Oricraft Store Dashboard</title>

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
              <h3 class="card-title">Data Table Image Home
                <a href="" data-toggle="modal" data-target="#add" class="btn btn-sm btn-success pull-right">Tambah Gambar</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-center">
              <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $no=1; ?>
                                      @foreach($home as $hm)
                                        <tr>
                                          <th>{{$no}}. </th>
                                          <td><img src="{{asset('gambar_produk')}}/{{$hm->gambar_image}}" width="100"></td>
                                          <td>
                                            <a href="" data-toggle="modal" data-target="#image{{$hm->id_image}}" class="btn btn-sm btn-success form-control">Update Gambar</a>
                                          </td>
                                        </tr>
                                        <?php $no++ ?>
                                         <div class="col-lg-12">
                        <div class="modal fade" id="image{{$hm->id_image}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <?php $edit=DB::table('image_home')->where('id_image', $hm->id_image)->get(); ?>
                                           <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                            <h4 class="modal-title" id="H4"> Edit Data Image </h4>
                                        </div>
                                        <div class="modal-body">
                                           <form role="form" method="post" enctype="multipart/form-data" action="{{route('edima')}}">
                                            @csrf
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input class="form-control" type="file" name="gambar" />
                                        </div>
                                        <img src="{{asset('gambar_produk')}}/{{$hm->gambar_image}}" width="100">
                                        <input value="{{$hm->id_image}}" name="id_image" hidden="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-sm btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
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
                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                            <h4 class="modal-title" id="H4"> New Data Image </h4>
                                        </div>
                                        <div class="modal-body">
                                           <form role="form" method="post" enctype="multipart/form-data" action="{{route('addimageh')}}">
                                            @csrf
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input class="form-control" type="file" name="gambar" />
                                        </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-sm btn-primary">Save changes</button>
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
