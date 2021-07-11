<!-- Header -->
<div class="header right border-bottom">
    <div class="container">
        <!-- Logo -->
        <div class="header-logo">
            <h3><a href="">Oricraft Store</a></h3>
            <!--
            <img class="logo-dark" src="{{asset('assets/images/your-logo-dark')}}.png" alt="">
            <img class="logo-light" src="{{asset('assets/images/your-logo-ligh')}}t.png" alt="">
            -->
        </div>
        <!-- Menu -->
        <div class="header-menu">
            <ul class="nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Products</a>
                </li>
                @if(Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('detail_checkout')}}">Detail Checkout</a>
                </li>
                @endif
                @if(!Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Detail Checkout</a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Menu Extra -->
        <div class="header-menu-extra">
            <ul class="list-inline">
                @if(Auth::user())
                <?php $cart=DB::table('cart')->where('id_pembeli', Auth::user()->id)->where('status_c','Keranjang')->count(); ?>
                <li><a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i><sup>{{$cart}}</sup></a></li>
                 <li><a href="{{ route('logout') }}">Logout</a></li>
                 @endif
                 @if(!Auth::user())
                <li><a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i></a></li>
                 @endif
            </ul>
        </div>
        <!-- Menu Toggle -->
        <button class="header-toggle">
            <span></span>
        </button>
    </div><!-- end container -->
</div>
<!-- end Header -->
