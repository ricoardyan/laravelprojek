@extends('layout.app')

@section('title', 'cart')

@section('content')
<div class="section-lg">
    <div class="container">
        <div class="row col-spacing-40">
            <div class="col-12 col-xl-8">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
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
                            <th scope="row"><a href="cart/delete_cart/{{$crt->id_cart}}">x</a></th>
                            <td class="product-thumbnail">
                                <a href="#"><img src="{{asset('gambar_produk')}}/{{$crt->gambar}}" width="270" alt=""></a>
                            </td>
                            <td>{{$crt->nama_produk}}</td>
                            <td>Rp. {{$harga}}</td>
                            <td>
                                <form class="product-quantity" method="post" action="{{route('editcart')}}">
                                    @csrf
                                    <input value="{{$crt->id_produk}}" hidden="" name="id_produk">
                                    <div class="qnt">
                                        <input type="number" id="quantity" name="qty" min="1" max="{{$crt->stok}}" value="{{$crt->qty}}">
                                    </div><br>
                                    <button class="btn btn-sm btn-dark" style="margin-left: 15%;border-radius: 25%;margin-top: 2%;">Update</button>
                                </form>
                            </td>
                            <td>Rp. {{$totall}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-xl-4">
                <div class="bg-grey padding-20 padding-md-30 padding-lg-40">
                    <h5 class="font-weight-medium">Cart totals</h5>
                    <table class="table cart-totals">
                        @if(Auth::user())
                        <?php $sub=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->where('cart.id_pembeli', Auth::user()->id)->where('cart.status_c','Keranjang')->limit('1')->get();
                        $per=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->where('cart.id_pembeli', Auth::user()->id)->where('cart.status_c','Keranjang')->count();
                         ?>
                         @endif
                        <tbody>
                            <tr>
                                <th scope="row">Item Produk</th>
                                <td>{{$per}} x</td>
                            </tr>
                            
                            <tr>
                                <th scope="row">Total</th>
                                <td>
                                    @foreach($sub as $sb)
                                    Rp. {{$subtotal}}
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="button button-md button-dark button-fullwidth margin-top-20" href="{{ route('checkout') }}">Proceed</a>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
@endsection
