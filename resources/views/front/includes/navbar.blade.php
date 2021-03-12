<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="{{route('register')}}"><i class="fa fa-heart"></i>  {{__('messages.register')}}</a></li>
                        <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="{{route('login')}}"><i class="fa fa-user"></i> {{__('messages.signin')}}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav-item d-none d-sm-inline-block">
                                <a rel="alternate"  class="nav-link active"
                                   hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}
                                       ">
                                    {{ $properties['native'] }}
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">

                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{route('front.show')}}">Cart - <span class="cart-amunt">  @auth
                                {{Cart::session(auth()->id())->getContent()->count()}}
                            @else
                                0
                            @endauth</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                </div>
            </div>
            @if(auth()->user())
<a href="{{route("logout")}}">Logout</a>
                @endif
        </div>
    </div>
</div> <!-- End site branding area -->
@if( session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
@endif
