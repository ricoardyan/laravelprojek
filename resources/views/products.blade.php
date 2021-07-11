@extends('layout.app')

@section('title', 'Products')

@section('content')
    <!-- Products section -->
    <div class="section">
        <div class="container">
            <!-- Products -->
            <div class="row col-spacing-30">
                <!-- Product box 1 -->
                @foreach($produk as $prd)
                <?php $harga=number_format($prd->harga,0,",","."); ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="product-box">
                        <div class="product-img">
                            <!-- Product IMG -->
                            <a class="product-img-link" href="#">
                                <img src="{{asset('gambar_produk')}}/{{$prd->gambar}}" alt="">
                            </a>
                            <!-- Badge (left) -->
                            <div class="product-badge-left"><!-- you can add: 'red/green' -->
                                <span>New</span>
                            </div>
                            <!-- Badge (right) -->
                            <div class="product-badge-right red"><!-- you can add: 'red/green' -->
                                <span>-50%</span>
                            </div>
                            <!-- Add to Cart -->
                            <div class="add-to-cart">
                                <form action="{{ route('addcart') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$prd->id_produk}}" name="id_produk">
                                    <input type="hidden" value="1" name="qty">
                                    <input type="hidden" value="{{$prd->harga}}" name="harga">
                                    @if(!Auth::user())
                                     <a href="{{route('login')}}"><i class="fa fa-shopping-cart"></i> 
                                        Add To Cart
                                    </a>
                                    @endif
                                    @if(Auth::user())
                                    @if(Auth::user()->level=="Pembeli")
                                     <button><i class="fa fa-shopping-cart"></i> 
                                        Add To Cart
                                    </button>
                                    @endif
                                    @endif
                                </form>
                               <!--  <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a> -->
                            </div>
                            
                        </div>
                        <div class="product-title">
                            <!-- Product Title -->
                            <h6 class="font-weight-medium"><a href="#">{{$prd->nama_produk}}</a></h6>
                            <h6 class="font-weight-medium"><a href="#">{{$prd->tipe_produk}}</a></h6>
                            <!-- Product Price -->
                            <div class="price">
                                <!-- <del>$98</del> -->
                                <span>Rp. {{$harga}}</span>
                                <span class="text pull-right" style="float: right;">Stok : {{$prd->stok}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Product box 2 -->
                <!-- Product box 3 -->
                <!-- Product box 4 -->
                <!-- Product box 5 -->
                <!-- Product box 6 -->
            </div><!-- end row -->
            <!-- Pagination -->
            <!-- <div class="text-center margin-top-50">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </nav>
            </div> -->
        </div><!-- end container -->
    </div>
    <!-- end Products section -->
@endsection
