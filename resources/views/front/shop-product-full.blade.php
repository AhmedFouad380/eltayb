@extends('front.layout')
@section('title')
    {{$data->title}}
@endsection
@section('content')
        <!--End header-->
        <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.Home')}}</a>
                        <span></span> <a href="{{url('Category',$data->Category->title)}}">{{$data->Category->title}}</a> <span></span> {{$data->title}}
                    </div>
                </div>
            </div>
            <div class="container mb-30">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @foreach($data->Images as $image)
                                            <figure class="border-radius-10">
                                                <img src="{{$image->image}}" alt="{{$data->title}}" />
                                            </figure>
                                            @endforeach

                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            @foreach($data->Images as $image)
                                            <div><img src="{{$image->image}}" alt="{{$data->title}}" /></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        @if($data->is_discount == 'active')
                                            <span class="stock-status out-stock"> {{__('lang.sale')}} </span>
                                        @elseif($data->is_hot == 1)
                                            <span class="stock-status out-stock"> {{__('lang.hot')}} </span>
                                        @elseif($data->is_new == 1)
                                            <span class="stock-status out-stock"> {{_('lang.new')}} </span>
                                        @endif
                                            <h2 class="title-detail">{{$data->title}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left" id="ShapePrice">
                                                @if($data->is_discount == 'active')

                                                    <span data-shape="{{$data->DefaultShape->id}}" class="current-price text-brand">{{ $data->DefaultShape->StorageAvaliable->sell_price - (( $data->DefaultShape->StorageAvaliable->sell_price * $data->discount_value ) / 100 ) }}</span>
                                                    <span>
                                                          <span class="save-price font-md color3 ml-15">{{$data->discount_value}}% Off</span>
                                                          <span class="old-price font-md ml-15">{{$data->DefaultShape->StorageAvaliable->sell_price}}</span>
                                                     </span>
                                                @else
                                                    <span class="current-price text-brand">{{$data->DefaultShape->StorageAvaliable->sell_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="short-desc mb-30">
                                        </div>
                                        <div class="attr-detail attr-size mb-30">
                                            <strong class="mr-10">{{__('lang.Size / Weight')}}: </strong>
                                            <ul class="list-filter size-filter font-small">
                                                @foreach($data->Shapes as $Shape)
                                                <li class="shape-view @if($Shape->default == 1) active @endif" data-id="{{$Shape->id}}"><a href="#">{{$Shape->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="detail-extralink mb-50">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" data-id="{{$data->id}}"class="addCart button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>{{__('lang.add')}}</button>
                                                <a aria-label="{{__('lang.addtowishlist')}}" class="action-btn addtowishlist" data-id="{{$data->id}}" ><i class="fi-rs-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="font-xs">
                                            <ul class="mr-50 float-start">
                                                <li>{{__('lang.stock')}}:<span class="in-stock text-brand ml-5">{{$data->DefaultShape->StorageAvaliable->available_quantity}} {{__('lang.Items In Stock')}}</span></li>
                                                <li class="mb-5">{{__('lang.date')}}:<span class="text-brand"> {{$data->created_at->format('Y-m-d')}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">{{__('lang.description')}}</a>
                                        </li>

{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">{{__('lang.Reviews')}} (3)</a>--}}
{{--                                        </li>--}}
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                               {!! $data->description !!}
                                            </div>
                                        </div>
{{--                                        <div class="tab-pane fade" id="Reviews">--}}
{{--                                            <!--Comments-->--}}
{{--                                            <div class="comments-area">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-lg-8">--}}
{{--                                                        <h4 class="mb-30">Customer questions & answers</h4>--}}
{{--                                                        <div class="comment-list">--}}
{{--                                                            <div class="single-comment justify-content-between d-flex mb-30">--}}
{{--                                                                <div class="user justify-content-between d-flex">--}}
{{--                                                                    <div class="thumb text-center">--}}
{{--                                                                        <img src="assets/imgs/blog/author-2.png" alt="" />--}}
{{--                                                                        <a href="#" class="font-heading text-brand">Sienna</a>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="desc">--}}
{{--                                                                        <div class="d-flex justify-content-between mb-10">--}}
{{--                                                                            <div class="d-flex align-items-center">--}}
{{--                                                                                <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="product-rate d-inline-block">--}}
{{--                                                                                <div class="product-rating" style="width: 100%"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="single-comment justify-content-between d-flex mb-30 ml-30">--}}
{{--                                                                <div class="user justify-content-between d-flex">--}}
{{--                                                                    <div class="thumb text-center">--}}
{{--                                                                        <img src="assets/imgs/blog/author-3.png" alt="" />--}}
{{--                                                                        <a href="#" class="font-heading text-brand">Brenna</a>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="desc">--}}
{{--                                                                        <div class="d-flex justify-content-between mb-10">--}}
{{--                                                                            <div class="d-flex align-items-center">--}}
{{--                                                                                <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="product-rate d-inline-block">--}}
{{--                                                                                <div class="product-rating" style="width: 80%"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                                                <div class="user justify-content-between d-flex">--}}
{{--                                                                    <div class="thumb text-center">--}}
{{--                                                                        <img src="assets/imgs/blog/author-4.png" alt="" />--}}
{{--                                                                        <a href="#" class="font-heading text-brand">Gemma</a>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="desc">--}}
{{--                                                                        <div class="d-flex justify-content-between mb-10">--}}
{{--                                                                            <div class="d-flex align-items-center">--}}
{{--                                                                                <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="product-rate d-inline-block">--}}
{{--                                                                                <div class="product-rating" style="width: 80%"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-4">--}}
{{--                                                        <h4 class="mb-30">Customer reviews</h4>--}}
{{--                                                        <div class="d-flex mb-30">--}}
{{--                                                            <div class="product-rate d-inline-block mr-15">--}}
{{--                                                                <div class="product-rating" style="width: 90%"></div>--}}
{{--                                                            </div>--}}
{{--                                                            <h6>4.8 out of 5</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <span>5 star</span>--}}
{{--                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <span>4 star</span>--}}
{{--                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <span>3 star</span>--}}
{{--                                                            <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <span>2 star</span>--}}
{{--                                                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="progress mb-30">--}}
{{--                                                            <span>1 star</span>--}}
{{--                                                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>--}}
{{--                                                        </div>--}}
{{--                                                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--comment form-->--}}
{{--                                            <div class="comment-form">--}}
{{--                                                <h4 class="mb-15">Add a review</h4>--}}
{{--                                                <div class="product-rate d-inline-block mb-30"></div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-lg-8 col-md-12">--}}
{{--                                                        <form class="form-contact comment_form" action="#" id="commentForm">--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-sm-6">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name" />--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-sm-6">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" />--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-12">--}}
{{--                                                                    <div class="form-group">--}}
{{--                                                                        <input class="form-control" name="website" id="website" type="text" placeholder="Website" />--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <button type="submit" class="button button-contactForm">Submit Review</button>--}}
{{--                                                            </div>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h2 class="section-title style-1 mb-30">{{__('lang.Related products')}}</h2>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach(\App\Models\Product::where('is_active','active')->where('in_stock','>',0)->where('category_id',$data->category_id)->limit(4)->InRandomOrder()->get() as $Related)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{url('product_details',$Related->id)}}" tabindex="0">
                                                                <img class="default-img" src="{{$Related->image}}" alt="" />
/                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view " class=" product-view action-btn small hover-up" data-id="{{$Related->id}}" ><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                    </div>
                                                    @if($Related->is_hot == 1)
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="new">{{__('lang.hot')}}</span>
                                                        </div>
                                                    @elseif($Related->is_discount == 1)
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="sale">{{__('lang.sale')}}</span>
                                                        </div>
                                                    @elseif($Related->is_new == 1)
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="new">{{__('lang.new')}}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{url('product_details',$Related->id)}}" tabindex="0">{{$Related->title}}</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span> </span>
                                                    </div>
                                                    <div class="product-price">
                                                        @if($Related->is_discount == 'active')

                                                            <span >{{ $Related->DefaultShape->price - (( $Related->DefaultShape->price * $data->discount_value ) / 100 ) }}</span>
                                                          <span class="old-price ">{{$Related->DefaultShape->price}}</span>
                                                        @else
                                                            <span >{{$Related->DefaultShape->price }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection

@section('js')
    <script>
        $(".addCart").click(function () {
            var id = $(this).data('id')
            var shape = $('.current-price').data('shape')
            var count = $('.qty-val').text()
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
                    data: {"id": id ,"shape_id":shape ,"count":count},
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
                    timer: 3000,
                    showConfirmButton: false
                });

            }
        })

        $('.shape-view').on('click',function () {
    id = $(this).data('id');
        $.ajax({
            url: '{{url("ShapeView")}}',
            type: "get",
            data: {'id': id },
            success: function (data) {
            $('#ShapePrice').html(data);
            },
            fail: function (xhrerrorThrown) {
                Swal.fire("نأسف", "حدث خطأ ما ", "error");
            }
        });


    })
    </script>
@endsection
