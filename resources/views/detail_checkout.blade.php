@extends('layout.app')

@section('title', 'cart')

@section('content')
<div class="section-lg">
    <div class="container">
        <div class="row col-spacing-40">
            @if(session('success_checkout'))
                <div class="alert alert-succes alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('success_checkout')}}
                </div>
            @endif
            <div class="col-12 col-xl-12">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th scope="col">Gambar</th>
                          <!--   <th scope="col"></th> -->
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Status Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nul=0; ?>
                        @foreach($cart as $crt)
                        <?php $harga=number_format($crt->harga_c,0,",","."); 
                        $total=$crt->harga_c*$crt->qty;
                        $totall=number_format($total,0,",",".");
                        $subtotal=$nul+=$total;
                        $subtotal=number_format($subtotal,0,",",".");
                        ?>
                        <tr>
                          <!--   <th scope="row"><a href="cart/delete_cart/{{$crt->id_cart}}">x</a></th> -->
                            <td class="product-thumbnail">
                                <a href="#"><img src="{{asset('gambar_produk')}}/{{$crt->gambar}}" width="270" alt=""></a>
                            </td>
                            <td>{{$crt->nama_produk}}</td>
                            <td>Rp. {{$harga}}</td>
                            <td>
                                {{$crt->qty}}
                            </td>
                            <td>Rp. {{$totall}}</td>
                            <td>{{$crt->keterangan}} - {{$crt->payment}}</td>
                            <td>
                                @if($crt->status_b==NULL)
                                    <span class="btn btn-sm btn-danger">Barang Belum Terkonfirmasi</span>
                                @endif
                                @if($crt->status_b!==NULL)
                                    <span class="btn btn-sm btn-success">Barang Terkonfirmasi, Akan Segera di Kirim</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div><!-- end row -->
    </div><!-- end container -->
</div>
@endsection
