@extends('layout.app')

@section('title', 'checkout')

@section('content')
<div class="section">
    <div class="container">
        <div class="row col-spacing-40">
            <div class="col-12 col-xl-8">
                <h5 class="font-weight-medium margin-bottom-30">Billing details</h5>
                <form method="post" action="{{route('transaksi')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-6">
                            <label class="required">Name</label>
                            <input type="text" name="nama" required>
                        </div>
                        <div class="col-6">
                            <label class="required">Telepon</label>
                            <input type="tel" name="telepon" required>
                        </div>
                        <div class="col-12">
                            <label> Alamat Lengkap </label>
                            <input type="text" name="alamat">
                        </div>
                        <div class="col-6">
                            <label class="required">Kode Pos</label>
                            <input type="text" name="kode_pos" required>
                        </div>
                        <div class="col-6">
                            <label class="required">Email address</label>
                            <input type="email" name="email" required>
                        </div>
                       <!--  <div class="col-12">
                            <label>Order notes (optional)</label>
                            <textarea placeholder="Notes about your order, eg. special notes for delivery."></textarea>
                        </div> -->
                    </div>
            </div>
             <?php $nul=0; ?>
                        @foreach($cart as $crt)
                        <?php $harga=number_format($crt->harga_c,0,",","."); 
                        $total=$crt->harga_c*$crt->qty;
                        $totall=number_format($total,0,",",".");
                        $subtotal=$nul+=$total;
                        $subtotal=number_format($subtotal,0,",",".");
                        ?>
                                    @endforeach
            <div class="col-12 col-xl-4">
                <?php $sub=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->where('cart.id_pembeli', Auth::user()->id)->where('cart.status_c','Keranjang')->limit('1')->get();
                $per=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->where('cart.id_pembeli', Auth::user()->id)->where('cart.status_c','Keranjang')->count();
                 ?>
                <div class="bg-grey padding-20 padding-md-30 padding-lg-40">
                    <h5 class="font-weight-medium">Your order</h5>
                    <table class="table cart-totals">
                        <tbody>
                            <tr>
                                <th scope="row">Product per Item x {{$per}}</th>
                                <!-- <td>$20.00</td> -->
                            </tr>
                            <tr>
                                <th scope="row">Pembayaran Akun</th>
                                <td>
                                    @foreach($pembayaran as $pbr)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="id_payment" id="exampleRadios1" value="{{$pbr->id_payment}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                        {{$pbr->payment}} - {{$pbr->keterangan}}
                                        </label>
                                    </div>
                                   <!--  <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                        Free shipping
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                                        <label class="form-check-label" for="exampleRadios3">
                                        Local pickup
                                        </label>
                                    </div> -->
                                    @endforeach
                                </td>
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
                    @foreach($sub as $sb)
                        <button class="btn button-md button-dark button-fullwidth margin-top-20" href="#">Place order</button>
                    @endforeach
                </div>
                </form>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
@endsection
