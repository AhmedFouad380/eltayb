<!DOCTYPE html>
   @if(Session('lang') == 'ar')
    <html  lang="ar" dir="rtl" class="rtl">

    <html class="no-js" lang="en" >
    @endif
<head>
    <meta charset="utf-8" />
    <title> {{\App\Models\Setting::findOrFail(1)->name}} || @yield('title') </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    @if(Session('lang') == 'ar')
        <link rel="shortcut icon" href="{{asset('admin/assets/icon.png')}}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('website/assets_ar/css/plugins/slider-range.css')}}" />
        <link rel="stylesheet" href="{{asset('website/assets_ar/css/main.css?v=4.0')}}" />
    @else
        <link rel="shortcut icon" href="{{asset('admin/assets/icon.png')}}" />
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('website/assets/css/plugins/slider-range.css')}}" />
        <link rel="stylesheet" href="{{asset('website/assets/css/main.css?v=4.0')}}" />
    @endif
    @yield('css')
    <style>
        .default-img {
            width: 100%!important;
            height: 150px!important;
        }
        @if(Session('lang') == 'ar')
                .svgInject{
            margin-left: 11px;
        }

        .product-price{
            direction:ltr!important;
        }
        @else
        .svgInject{
            margin-right: 11px;
        }
        @endif

    </style>

</head>

<body>
<!-- Quick view -->
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
{{--        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>--}}
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        @if(Auth::guard('web')->check())
                        <ul>
                            <li><a href="{{url('Profile','Orders')}}">{{__('lang.Order Tracking')}}</a></li>
                        </ul>
                            @endif
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
{{--                        <div id="news-flash" class="d-inline-block">--}}
{{--                            <ul>--}}
{{--                                <li>100% Secure delivery without contacting the courier</li>--}}
{{--                                <li>Supper Value Deals - Save more with coupons</li>--}}
{{--                                <li>Trendy 25silver jewelry, save up 35% off today</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>{{__('lang.Need help? Call Us')}}:  <strong class="text-brand"> {{\App\Models\Setting::findOrFail(1)->customer_phone}} </strong></li>
                            @if(Session('lang') == 'en')
                            <li>
                                <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown"   >
                                    <li>
                                        <a href="{{url('lang/ar')}}"><img src="{{asset('website/assets/imgs/theme/ksa.png')}}" alt="" />العربية</a>
                                    </li>
                                </ul>
                            </li>
                            @else
                                <li>
                                    <a class="language-dropdown-active" href="#">العربية <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="{{url('lang/en')}}"><img src="{{asset('website/assets/imgs/theme/flag-us.png')}}" alt="" />English</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
{{--                            <li>--}}
{{--                                <a class="language-dropdown-active" href="#">USD <i class="fi-rs-angle-small-down"></i></a>--}}
{{--                                <ul class="language-dropdown">--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('website/assets/imgs/theme/flag-fr.png')}}" alt="" />INR</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('website/assets/imgs/theme/flag-dt.png')}}" alt="" />MBP</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('website/assets/imgs/theme/flag-ru.png')}}" alt="" />EU</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{url('/')}}"><img src="{{\App\Models\Setting::findOrFail(1)->logo}}" alt="{{\App\Models\Setting::findOrFail(1)->name}}" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{url('Search')}}" method="get">
                            @csrf
                            <select class="select-active" name="category_id">
                                <option value="0">{{__('lang.All Categories')}}</option>
                                @foreach(\App\Models\Category::where('is_active','active')->get() as $Category)
                                <option value="{{$Category->id}}"> {{$Category->title}}</option>
                                @endforeach
                            </select>
                            <input type="text" name="search" placeholder="{{__('lang.search')}}..." />
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">

                            @if(Auth::guard('web')->check())

                            <div class="header-action-icon-2">
                                <a href="{{url('wishlist')}}">
                                    <img class="svgInject" alt="eltayeb" src="{{asset('website/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                   @if(\App\Models\Wishlist::where('user_id',Auth::guard('web')->id())->count() > 0)  <span class="pro-count blue"id="CountWishlist">{{\App\Models\Wishlist::where('user_id',Auth::guard('web')->id())->count()}}</span>@endif
                                </a>
                                <a href="{{url('wishlist')}}"><span class="lable">{{__('lang.Wishlist')}}</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{url('cart')}}">
                                    <img alt="eltayeb" src="{{asset('website/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                    @if(\App\Models\Cart::where('user_id',Auth::guard('web')->id())->sum('count') >0)
                                    <span class="pro-count blue" id="CountCart">
                                        {{\App\Models\Cart::where('user_id',Auth::guard('web')->id())->sum('count')}}
                                    </span>
                                        @endif
                                </a>
                                <a href="{{url('cart')}}"><span class="lable">{{__('lang.cart')}}</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="#">
                                    <img class="svgInject" alt="eltayeb" src="{{asset('website/assets/imgs/theme/icons/icon-user.svg')}}" />
                                </a>
                                <a href="#"><span class="lable ml-0">{{Auth::guard('web')->user()->name}}</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li><a href="{{url('Profile','Account details')}}"><i class="fi fi-rs-user mr-10"></i>{{__('lang.Account details')}}</a></li>
                                        <li><a href="{{url('Profile','Orders')}}"><i class="fi fi-rs-location-alt mr-10"></i>{{__('lang.Orders')}}</a></li>
                                        <li><a href="{{url('Profile','My Address')}}"><i class="fi fi-rs-label mr-10"></i>{{__('lang.My Address')}}</a></li>
                                        <li><a href="{{url('Profile')}}"><i class="fi fi-rs-heart mr-10"></i>{{__('lang.My Wishlist')}}</a></li>
                                        <li><a href="{{url('logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>{{__('lang.Logout')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            @else
                                <div class="header-action-icon-2">
                                <a href="{{url('login')}}">
                                    <img class="svgInject" alt="eltayeb" src="{{asset('website/assets/imgs/theme/icons/icon-user.svg')}}" />
                                </a>
                                    <a href="{{url('login')}}"><span class="lable ml-0">{{__('lang.login')}}</span></a>

                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{url('register')}}">
                                        <img class="svgInject" alt="eltayeb" src="{{asset('website/assets/imgs/theme/icons/icon-user.svg')}}" />
                                    </a>
                                    <a href="{{url('register')}}"><span class="lable ml-0">{{__('lang.register')}}</span></a>

                                </div>
                                @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{url('/')}}"><img src="{{\App\Models\Setting::findOrFail(1)->logo}}" alt="{{\App\Models\Setting::findOrFail(1)->name}}" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex" style="width: 80%">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et"></span>{{__('lang.BrowseCategories')}}
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul style="    display: flex;
    flex-wrap: wrap;">
                                    @foreach(\App\Models\Category::where('is_active','active')->limit(8)->get() as $Cat)
                                    <li style="width: 33.33%; flex: auto">
                                        <a href="{{url('/Category',$Cat->id)}}">
{{--                                            <img src="{{asset('website/assets/imgs/theme/icons/category-1.svg')}}" alt="" />--}}
                                            {{$Cat->title}}</a>
                                    </li>
                                    @endforeach

                                </ul>

                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul style="    display: flex;
    flex-wrap: wrap;">
                                        @foreach(\App\Models\Category::where('is_active','active')->get() as $key => $Cat)
                                            @if($key > 7)
                                            <li style="width: 33.33%; flex: auto">
                                                <a href="{{url('/Category',$Cat->id)}}">
                                                    {{--                                            <img src="{{asset('website/assets/imgs/theme/icons/category-1.svg')}}" alt="" />--}}
                                                    {{$Cat->title}}</a>
                                            </li>
                                            @endif
                                        @endforeach



                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading" style="margin:0 auto">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="{{asset('website/assets/imgs/theme/icons/icon-hot.svg')}}" alt="{{__('lang.Hot Deals')}}" /><a href="{{url('Hot-Deals')}}">{{__('lang.Hot Deals')}}</a></li>
                                <li>
                                    <a href="{{url('/')}}">{{__('lang.Home')}}</a>
                                </li>
                                @foreach(\App\Models\Page::where('is_active','active')->where('position','header')->get() as $Page)
                                <li>
                                    <a href="{{url('Page',$Page->id)}}">{{$Page->title}}</a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="{{url('Contact')}}">{{__('lang.Contact')}}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{asset('website/assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                    <p>{{\App\Models\Setting::findOrFail(1)->customer_phone}}<span>{{__('lang.Customer service')}}</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
{{--                        <div class="header-action-icon-2">--}}
{{--                            <a href="shop-wishlist.html">--}}
{{--                                <img alt="eltayeb" src="{{asset('website/assets/imgs/theme/icons/icon-heart.svg')}}" />--}}
{{--                                <span class="pro-count white">4</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{url('cart')}}">
                                <img alt="eltayeb" src="{{asset('website/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                @if(\App\Models\Cart::where('user_id',Auth::guard('web')->id())->sum('count') >0)
                                    <span class="pro-count blue">
                                        {{\App\Models\Cart::where('user_id',Auth::guard('web')->id())->sum('count')}}
                                    </span>
                                @endif
                            </a>
{{--                            <div class="cart-dropdown-wrap cart-dropdown-hm2">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <div class="shopping-cart-img">--}}
{{--                                            <a href="shop-product-right.html"><img alt="eltayeb" src="{{asset('website/assets/imgs/shop/thumbnail-3.jpg')}}" /></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="shopping-cart-title">--}}
{{--                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>--}}
{{--                                            <h3><span>1 × </span>$800.00</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="shopping-cart-delete">--}}
{{--                                            <a href="#"><i class="fi-rs-cross-small"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="shopping-cart-img">--}}
{{--                                            <a href="shop-product-right.html"><img alt="eltayeb" src="{{asset('website/assets/imgs/shop/thumbnail-4.jpg')}}" /></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="shopping-cart-title">--}}
{{--                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>--}}
{{--                                            <h3><span>1 × </span>$3500.00</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="shopping-cart-delete">--}}
{{--                                            <a href="#"><i class="fi-rs-cross-small"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="shopping-cart-footer">--}}
{{--                                    <div class="shopping-cart-total">--}}
{{--                                        <h4>Total <span>$383.00</span></h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="shopping-cart-button">--}}
{{--                                        <a href="shop-cart.html">View cart</a>--}}
{{--                                        <a href="shop-checkout.html">Checkout</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{url('/')}}"><img src="{{\App\Models\Setting::findOrFail(1)->logo}}" alt="{{\App\Models\Setting::findOrFail(1)->name}}" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="{{url('Search')}}" method="get">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{url('/')}}">{{__('lang.Home')}}</a>
                        </li>
                        @foreach(\App\Models\Page::where('is_active','active')->where('position','header')->get() as $Page)
                            <li>
                                <a href="{{url('Page',$Page->id)}}">{{$Page->title}}</a>
                            </li>
                        @endforeach
                        <li class="menu-item-has-children">
                            <a href="index.html">{{__('lang.BrowseCategories')}}</a>
                            <ul class="dropdown">
                                @foreach(\App\Models\Category::where('is_active','active')->limit(8)->get() as $Cat)
                                    <li><a href="{{url('/Category',$Cat->id)}}">
                                        {{$Cat->title}}</a>
                                    </li>
                                @endforeach


                                @foreach(\App\Models\Page::where('is_active','active')->where('position','header')->get() as $Page)

                                @endforeach
                            </ul>
                        </li>
                        @foreach(\App\Models\Page::where('is_active','active')->where('position','header')->get() as $Page)
                            <li>
                                <a href="{{url('Page',$Page->id)}}">{{$Page->title}}</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{url('Contact')}}">{{__('lang.Contact')}}</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">

                <div class="single-mobile-header-info">
                    <a href="{{url('login')}}"><i class="fi-rs-user"></i>{{__('lang.login')}}  </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{url('login')}}"><i class="fi-rs-user"></i>{{__('lang.register')}}  </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="{{\App\Models\Setting::findOrFail(1)->facebook}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                <a href="{{\App\Models\Setting::findOrFail(1)->twitters}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                <a href="{{\App\Models\Setting::findOrFail(1)->instagram}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                <a href="{{\App\Models\Setting::findOrFail(1)->youtube}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2021 © <a href="https://corebugs.com"> CoreBugs </a> All rights reserved.</div>
        </div>
    </div>
</div>
<!--End header-->
@yield('content')
<footer class="main">
    <section class="newsletter mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                {{__('lang.Stay home & get your daily')}} <br />
                                {{__('lang.needs from our shop')}}
                            </h2>
                            <p class="mb-45">{{__('lang.Start Your Daily Shopping with')}} <span class="text-brand">Eltayeb </span></p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                        <img src="{{asset('website/assets/imgs/banner/banner-9.png')}}" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{asset('website/assets/imgs/theme/icons/icon-1.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('lang.Best prices & offers')}}</h3>
                            <p>{{__('lang.Orders 5 KWD or more')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{asset('website/assets/imgs/theme/icons/icon-2.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('lang.Free delivery')}}</h3>
                            <p> {{__('lang.amazing services')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{asset('website/assets/imgs/theme/icons/icon-3.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('lang.Great daily deal')}}</h3>
                            <p>{{__('lang.When you sign up')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{asset('website/assets/imgs/theme/icons/icon-4.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('lang.Wide assortment')}}</h3>
                            <p>{{__('lang.Mega Discounts')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{asset('website/assets/imgs/theme/icons/icon-5.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('lang.Easy returns')}}</h3>
                            <p>{{__('lang.Within 30 days')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{asset('website/assets/imgs/theme/icons/icon-6.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Safe delivery</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img src="{{\App\Models\Setting::findOrFail(1)->logo}}" alt="{{\App\Models\Setting::findOrFail(1)->name}}" /></a>
{{--                            <p class="font-lg text-heading">Awesome grocery store website template</p>--}}
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{asset('website/assets/imgs/theme/icons/icon-location.svg')}}" alt="" /><strong>{{__('lang.address')}}  :  </strong> <span>{{\App\Models\Setting::findOrFail(1)->address}}</span></li>
                            <li><img src="{{asset('website/assets/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>{{__('lang.phone')}}  :  </strong><span>{{\App\Models\Setting::findOrFail(1)->phone}}</span></li>
                            <li><img src="{{asset('website/assets/imgs/theme/icons/icon-email-2.svg')}}" alt="" /><strong>{{__('lang.email')}}  :  </strong><span>{{\App\Models\Setting::findOrFail(1)->email}}</span></li>
                            <li><img src="{{asset('website/assets/imgs/theme/icons/icon-clock.svg')}}" alt="" /><strong>  </strong><span>{{\App\Models\Setting::findOrFail(1)->hours}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col">
{{--                    <h4 class="widget-title">{{__('lang.Pages')}}</h4>--}}
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach(\App\Models\Page::where('is_active','active')->where('position','footer')->get() as $page)
                        <li><a href="{{url('Page',$page->id)}}">{{$page->title}}</a></li>
                        @endforeach
                        <li><a href="{{url('Contact')}}">{{__('lang.Contact')}}</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
{{--                    <h4 class="widget-title">{{__('lang.Categories')}}</h4>--}}
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach(\App\Models\Category::where('is_active','active')->limit(6)->InRandomOrder()->get() as $page)
                            <li><a href="{{url('Category',$page->id)}}">{{$page->title}}</a></li>
                        @endforeach

                    </ul>
                </div>

                <div class="footer-link-widget col">
{{--                    <h4 class="widget-title">{{__('lang.Account')}}</h4>--}}
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @if(Auth::guard('web')->check())
                            <li><a href="{{url('Profile')}}">{{__('lang.Profile')}}</a></li>
                            <li><a href="{{url('register')}}">{{__('lang.Register')}}</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="{{url('Contact')}}">{{__('lang.Contact')}}</a></li>
                        @else
                        <li><a href="{{url('login')}}">{{__('lang.login')}}</a></li>
                        <li><a href="{{url('register')}}">{{__('lang.register')}}</a></li>
                        <li><a href="#">My Wishlist</a></li>
                            <li><a href="{{url('Contact')}}">{{__('lang.Contact')}}</a></li>
                            @endif
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col">
{{--                    <h4 class="widget-title">Install App</h4>--}}
{{--                    <p class="wow fadeIn animated">From App Store or Google Play</p>--}}
{{--                    <div class="download-app">--}}
{{--                        <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{asset('website/assets/imgs/theme/app-store.jpg')}}" alt="" /></a>--}}
{{--                        <a href="#" class="hover-up mb-sm-2"><img src="{{asset('website/assets/imgs/theme/google-play.jpg')}}" alt="" /></a>--}}
{{--                    </div>--}}
                    <p class="mb-20">{{__('lang.Secured Payment Gateways')}}</p>
                    <img class="wow fadeIn animated" src="{{asset('website/assets/imgs/theme/payment-method.png')}}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-30">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; 2021, <strong class="text-brand"><a href="https://corebugs.com" >CoreBugs</a></strong> -All rights reserved</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="{{asset('website/assets/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />
                    <p>{{\App\Models\Setting::findOrFail(1)->customer_phone}}<span>Working {{\App\Models\Setting::findOrFail(1)->hours}}</span></p>
                </div>
{{--                <div class="hotline d-lg-inline-flex">--}}
{{--                    <img src="{{asset('website/assets/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />--}}
{{--                    <p>1900 - 8888<span>24/7 Support Center</span></p>--}}
{{--                </div>--}}
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="{{\App\Models\Setting::findOrFail(1)->facebook}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                    <a href="{{\App\Models\Setting::findOrFail(1)->twitters}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                    <a href="{{\App\Models\Setting::findOrFail(1)->instagram}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                    <a href="{{\App\Models\Setting::findOrFail(1)->youtube}}"><img src="{{asset('website/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                </div>
                <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
        </div>
    </div>
</footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{asset('website/assets/imgs/theme/loading.gif')}}" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
@if(Session('lang' ) == 'en')
    <script src="{{asset('website/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('website/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('website/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('website/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/slider-range.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('website/assets/js/main.js?v=4.0')}}"></script>
    <script src="{{asset('website/assets/js/shop.js?v=4.0')}}"></script>

@else
    <script src="{{asset('website/assets_ar/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/slick.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/wow.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/slider-range.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/plugins/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('website/assets_ar/js/main.js?v=4.0')}}"></script>
    <script src="{{asset('website/assets_ar/js/shop.js?v=4.0')}}"></script>

@endif
    <!-- Template  JS -->
@yield('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(".product-view").click(function () {
        var id = $(this).data('id')
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "GET",
            url: "{{url('product_model')}}",
            data: {"id": id},
            success: function (data) {
                $("#quickViewModal .modal-body").html(data)
                $("#quickViewModal").modal('show')
                $("#quickViewModal").on('hidden.bs.modal', function (e) {
                    //   $('.bs-edit-modal-lg').empty();
                    $('.bs-edit-modal-lg').hide();
                })
            }
        })
    })

    $('.addtowishlist').click(function () {
        var id = $(this).data('id');
            @if(Auth::guard('web')->check())
        var check = true;
            @else
        var check = false;
        @endif
        if(check){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('add-wishlist')}}",
                data: {"id": id },
                success: function (data) {
                    $('#CountWishlist').html(data)
                    Swal.fire({
                        icon: 'success',
                        title: "{{__('lang.Success')}}",
                        text: "{{__('lang.Success_text')}}",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });

                }
            })
        }else{
            Swal.fire({
                icon: 'error',
                title: "{{__('lang.error')}}",
                text: "{{ __('lang.PleaseLogin') }}",
                type: "error",
                timer: 5000,
                confirmButtonText: '{{__('lang.login')}}',
            }).then(function (result) {
                window.location.href = "{{url('login')}}";
            } );


        }
    })
    $(".add").click(function () {
        var id = $(this).data('id')
        var shape = $(this).data('shape')

        @if(Auth::guard('web')->check())
            var check = true;
            @else
        var check = false;
        @endif
            if(check){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "GET",
            url: "{{url('add-cart')}}",
            data: {"id": id ,"shape_id":shape},
            success: function (data) {
            $('#CountCart').html(data)
                Swal.fire({
                    icon: 'success',
                    title: "{{__('lang.Success')}}",
                    text: "{{__('lang.Success_text')}}",
                    type: "success",
                    timer: 1000,
                    showConfirmButton: false
                });

            }
        })
        }else{
            Swal.fire({
                icon: 'error',
                title: "{{__('lang.error')}}",
                text: "{{ __('lang.PleaseLogin') }}",
                type: "error",
                timer: 5000,
                confirmButtonText: '{{__('lang.login')}}',
            }).then(function (result) {
                window.location.href = "{{url('login')}}";
            } );


        }
    })


</script>
<?php
$message = session()->get("message");
?>
@if( session()->has("message"))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{__('lang.Success')}}",
            text: "{{__('lang.Success_text')}}",
            type: "success",
            timer: 3000,
            showConfirmButton: false
        });

    </script>

    @endif
@foreach ($errors->all() as $error)
    <script>
        Swal.fire({
            icon: 'error',
            title: "{{__('lang.error')}}",
            text: "{{ $error }}",
            type: "error",
            timer: 3000,
            showConfirmButton: false
        });

    </script>
@endforeach

@if( session()->has("error"))
    <?php
    $e = session()->get("error");
    ?>

    <script>
        Swal.fire({
            icon: 'warning',
            title: "برجاء التأكد من البيانات.",
            text: "{{$e}} ",
            type: "error",
            timer: 5000,
            showConfirmButton: false
        });
    </script>

@endif
</body>
</html>
