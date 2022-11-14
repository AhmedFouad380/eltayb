@extends('front.layout')
@section('title')
    {{__('lang.Home')}}
@endsection
@section('content')
        <main class="main">
            <section class="home-slider position-relative mb-30">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @foreach(\App\Models\Slider::where('is_active','active')->get() as $Slider)
                        <div class="single-hero-slider rectangle single-animation-wrap" style="background-image: url({{$Slider->image}})">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    {{$Slider->title}}
                                </h1>
                                <p class="mb-65"> {{$Slider->description}}</p>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </section>
            <!--End hero-->
            <div class="container mb-30">
                <div class="row">
                    <div class="col-lg-4-5">
                        <section class="product-tabs section-padding position-relative">
                            <div class="section-title style-2">
                                <h3>{{__('lang.Popular Products')}}</h3>
                                <ul class="nav nav-tabs links" id="myTab" role="tablist">

                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">


                                <div class="tab-pane fade  show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                    <div class="row product-grid-4">
                                        @foreach(\App\Models\Product::where('is_active','active')->where('is_popular','active')->limit(15)->InRandomOrder()->get() as $Product)
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap mb-30">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{url('product_details',$Product->id)}}">
                                                            <img class="default-img" src="{{$Product->image}}" alt="" />
                                                            <img class="hover-img" src="" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="{{__('lang.addtowishlist')}}" class="action-btn addtowishlist" ><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Quick view" class="action-btn product-view " data-id="{{$Product->id}}"><i class="fi-rs-eye"></i></a>
                                                    </div>
                                                    @if($Product->is_hot == 1)
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="new">{{__('lang.hot')}}</span>
                                                    </div>
                                                    @elseif($Product->is_discount == 'active')
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="sale">{{__('lang.sale')}}</span>
                                                    </div>
                                                    @elseif($Product->is_new == 1)
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="new">{{__('lang.new')}}</span>
                                                    </div>
                                                   @endif
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="{{url('Category',$Product->category_id)}}">{{$Product->Category->title}}</a>
                                                    </div>
                                                    <h2><a href="{{url('product_details',$Product->id)}}"></a> {{$Product->title}}</h2>
                                                    <div class="product-rate-cover">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-small text-muted">By <a href="#">Tib </a></span>
                                                    </div>
                                                    <div class="product-card-bottom">
                                                        <div class="product-price">

                                                            @if($Product->is_discount == 'active')
                                                            <span>{{ $Product->DefaultShape->StorageAvaliable->sell_price - ( ( $Product->DefaultShape->StorageAvaliable->sell_price * $Product->discount_value ) / 100 ) }} KWD</span>

                                                            <span class="old-price">{{$Product->DefaultShape->l}} KWD</span>
                                                            @else
                                                                <span>{{$Product->DefaultShape->StorageAvaliable->sell_price}} KWD</span>
                                                            @endif
                                                        </div>
                                                        <div class="add-cart">
                                                            <a class="add" data-id="{{$Product->id}}" data-shape="{{$Product->DefaultShape->id}}"><i class="fi-rs-shopping-cart mr-5"></i>{{__('lang.add')}} </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--end product card-->

                                    </div>
                                    <!--End product-grid-4-->
                                </div>
                            </div>

                            <!--End tab-content-->
                        </section>
                        <!--Products Tabs-->
                        <!-- <section class="banners">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="banner-img">
                                        <img src="{{asset('website/assets/imgs/banner/banner-1.png')}}" alt="" />
                                        <div class="banner-text">
                                            <h4>
                                                Everyday Fresh & <br />Clean with Our<br />
                                                Products
                                            </h4>
                                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="banner-img">
                                        <img src="{{asset('website/assets/imgs/banner/banner-2.png')}}" alt="" />
                                        <div class="banner-text">
                                            <h4>
                                                Make your Breakfast<br />
                                                Healthy and Easy
                                            </h4>
                                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-md-none d-lg-flex">
                                    <div class="banner-img mb-sm-0">
                                        <img src="{{asset('website/assets/imgs/banner/banner-3.png')}}" alt="" />
                                        <div class="banner-text">
                                            <h4>The best Organic <br />Products Online</h4>
                                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
                        <!--End banners-->
                    </div>
                    <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
                        <!-- Fillter By Price -->
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30">{{__('lang.New products')}}</h5>
                            @foreach(\App\Models\Product::where('is_active','active')->where('is_new',1)->limit(3)->InRandomOrder()->get() as  $Pro)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{$Pro->image}}" alt="{{$Pro->title}}" />
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{url('product_details',$Pro->id)}}">{{$Pro->title}}</a></h5>
                                    <p class="price mb-0 mt-5">{{$Pro->DefaultShape->price}}</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                            <img src="{{asset('website/assets/imgs/banner/banner-11.png')}}" alt="" />
                            <div class="banner-text">
                                <span>Oganic</span>
                                <h4>
                                    Save 17% <br />
                                    on <span class="text-brand">Oganic</span><br />
                                    Juice
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    <section class="popular-categories section-padding">
                <div class="container">
                    <div class="section-title">
                        <div class="title">
                            <h3>{{__('lang.Shop by Categories')}}</h3>
{{--                            <a class="show-all" href="shop-grid-right.html">--}}
{{--                                All Categories--}}
{{--                                <i class="fi-rs-angle-right"></i>--}}
{{--                            </a>--}}
                        </div>
                        <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow" id="carausel-8-columns-arrows"></div>
                    </div>
                    <div class="carausel-8-columns-cover position-relative">
                        <div class="carausel-8-columns" id="carausel-8-columns">
                            @foreach(\App\Models\Category::where('is_active','active')->get() as $Cat)
                            <div class="card-1">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{url('Category',$Cat->id)}}"><img src="{{$Cat->icon}}" alt="" /></a>
                                </figure>
                                <h6>
                                    <a href="{{url('Category',$Cat->id)}}">{{$Cat->title}}</a>
                                </h6>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <div class="container mb-30">

                <div class="row">
                    <div class="section-title wow animate__animated animate__fadeIn">
                        <h3 class="">{{__('lang.Daily Best Sells')}}</h3>

                    </div>
                    <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        <!--End product Wrap-->
                                        @foreach(\App\Models\Product::where('is_active','active')->where('is_discount','active')->limit(10)->InRandomOrder()->get() as  $Product)

                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img"  src="{{$Product->image}}" alt="{{$Product->title}}"  />
{{--                                                        <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" />--}}
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="{{__('lang.addtowishlist')}}" class="action-btn addtowishlist" ><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Quick view" class="action-btn product-view " data-id="{{$Product->id}}"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">{{__('lang.sale')}}</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="{{url('Category',$Product->category_id)}}">{{$Product->Category->title}}</a>
                                                </div>
                                                <h2><a href="{{url('product_details',$Product->id)}}"></a> {{$Product->title}}</h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <div class="product-price">

                                                    @if($Product->is_discount == 'active')
                                                        <span>{{ $Product->DefaultShape->StorageAvaliable->sell_price - ( ( $Product->DefaultShape->StorageAvaliable->sell_price * $Product->discount_value ) / 100 ) }} KWD</span>

                                                        <span class="old-price">{{$Product->DefaultShape->l}} KWD</span>
                                                    @else
                                                        <span>{{$Product->DefaultShape->StorageAvaliable->sell_price}} KWD</span>
                                                    @endif
                                                </div>


                                                <div class="sold mt-15 mb-15">
                                                    <div class="progress mb-5">
                                                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="font-xs text-heading"> </span>
                                                </div>
                                                <a  data-id="{{$Product->id}}" data-shape="{{$Product->DefaultShape->id}}" class="add btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                            </div>
                                        </div>

                                    @endforeach
                                        <!--End product Wrap-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End category slider-->
            <!--End 4 columns-->
        </main>



@endsection

@section('js')

@endsection
