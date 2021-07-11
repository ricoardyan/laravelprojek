<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Oricraft Store Checkout</title>

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
              <h3 class="card-title">Data Table Checkout</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-responsive">
              <thead>
                                        <tr>
                                            <th>No </th>
                                            <th scope="col">Gambar</th>
                          <!--   <th scope="col"></th> -->
                            <th scope="col">Product</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Status Barang</th>
                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $nul=0; ?>
                                      <?php $no=1; ?>
                        @foreach($cart as $crt)
                        <?php $harga=number_format($crt->harga_c,0,",","."); 
                        $total=$crt->harga_c*$crt->qty;
                        $totall=number_format($total,0,",",".");
                        $subtotal=$nul+=$total;
                        $subtotal=number_format($subtotal,0,",",".");
                        ?>
                        <tr>
                          <td>{{$no}}</td>
                          <!--   <th scope="row"><a href="cart/delete_cart/{{$crt->id_cart}}">x</a></th> -->
                            <td class="product-thumbnail">
                                <a href="#"><img src="{{asset('gambar_produk')}}/{{$crt->gambar}}" width="100" alt=""></a>
                            </td>
                            <td>{{$crt->nama_produk}}</td>
                            <td>{{$crt->nama}}</td>
                            <td>{{$crt->alamat}}</td>
                            <td>Rp. {{$harga}}</td>
                            <td>
                                {{$crt->qty}}
                            </td>
                            <td>Rp. {{$totall}}</td>
                            <td>{{$crt->keterangan}} - {{$crt->payment}}</td>
                            <td>
                                @if($crt->status_b==NULL)
                                    <span class="btn btn-sm btn-danger">Belum Terkonfirmasi</span>
                                @endif
                                @if($crt->status_b!==NULL)
                                    <span class="btn btn-sm btn-success">Terkonfirmasi</span>
                                @endif
                            </td>
                            <td align="center">
                              <form method="post" action="{{route('confirm')}}">
                                @csrf
                                <input value="{{$crt->id_cart}}" name="id_cart" hidden="">
                                <input value="{{$crt->id_produk}}" name="id_produk" hidden="">
                                <input value="Confirm" name="status_b" hidden="">
                                <input value="{{$crt->qty}}" name="qty" hidden="">
                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
                              </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
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
