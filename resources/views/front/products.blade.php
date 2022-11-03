@extends('front.layout')

@section('title')
    {{$Category->title}}
@endsection
@section('content')
        <!--End header-->
        <main class="main">
            <div class="page-header mt-30 mb-50">
                <div class="container">
                    <div class="archive-header">
                        <div class="row align-items-center">
                            <div class="col-xl-3">
                                <h1 class="mb-15">{{$Category->title}}</h1>
                                <div class="breadcrumb">
                                    <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.Home')}}</a>
                                    <span></span> {{$Category->title}}
                                </div>
                            </div>
                            <div class="col-xl-9 text-end d-none d-xl-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-30">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p>We found <strong class="text-brand">{{$Products->total()}}</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Featured</a></li>
                                            <li><a href="#">Price: Low to High</a></li>
                                            <li><a href="#">Price: High to Low</a></li>
                                            <li><a href="#">Release Date</a></li>
                                            <li><a href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid">
                            @foreach($Products as $Product)
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
                                                <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
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
                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">Tib </a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">

                                                    @if($Product->is_discount == 'active')
                                                        <span>{{ $Product->DefaultShape->StorageAvaliable->sell_price - ( ( $Product->DefaultShape->StorageAvaliable->sell_price * $Product->discount_value ) / 100 ) }} KWD</span>

                                                        <span class="old-price">{{$Product->DefaultShape->StorageAvaliable->sell_price}} KWD</span>
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
                        </div>
                        <!--product grid-->
                        <div class="pagination-area mt-20 mb-20" style="direction: ltr">
                            <nav aria-label="Page navigation example">
                                @php
                                    $paginator =$Products->appends(request()->input())->links()->paginator;
                                        if ($paginator->currentPage() < 2 ){
                                            $link = $paginator->currentPage();
                                        }else{
                                             $link = $paginator->currentPage() -1;
                                        }
                                        if($paginator->currentPage() == $paginator->lastPage()){
                                                   $last_links = $paginator->currentPage();
                                        }else{
                                                   $last_links = $paginator->currentPage() +1;

                                        }
                                @endphp
                                @if ($paginator->lastPage() > 1)
                                    <ul class="pagination justify-content-start">
                                        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
                                            <a class="page-link" href="{{ $paginator->url(1) }}"> <i class="fi-rs-arrow-small-left"></i>
                                               </a>
                                        </li>
                                        @for ($i = $link; $i <= $last_links; $i++)
                                            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} page-item">
                                                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
                                            <a class="page-link"
                                               href="{{ $paginator->url($paginator->lastPage()) }}"> <i class="fi-rs-arrow-small-right"> </i> </a>
                                        </li>
                                    </ul>
                                @endif


                            </nav>
                        </div>
                        <!--End Deals-->
                    </div>
                </div>
            </div>
        </main>
@endsection
