<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
        <div class="detail-gallery">
            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
            <!-- MAIN SLIDES -->
            <div class="product-image-slider">
                @foreach($data->Images as $Image)
                <figure class="border-radius-10">
                    <img src="{{asset('website/assets/imgs/shop/product-16-2.jpg')}}" alt="product image" />
                </figure>
                @endforeach

            </div>
            <!-- THUMBNAILS -->
            <div class="slider-nav-thumbnails">
                @foreach($data->Images as $Image)
                <div><img src="{{asset('website/assets/imgs/shop/thumbnail-3.jpg')}}" alt="product image" /></div>
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
            <h3 class="title-detail"><a href="{{url('product_details',$data->id)}}" class="text-heading">{{$data->title}}</a></h3>
            <div class="product-detail-rating">
                <div class="product-rate-cover text-end">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                </div>
            </div>
            <div class="clearfix product-price-cover">
                <div class="product-price primary-color float-left">
                    @if($data->is_discount == 'active')

                        <span class="current-price text-brand">{{ $data->DefaultShape->price - (( $data->DefaultShape->price * $data->discount_value ) / 100 ) }}</span>
                        <span>
                      <span class="save-price font-md color3 ml-15">{{$data->discount_value}}% Off</span>

                       <span class="old-price font-md ml-15">{{$data->DefaultShape->price}}</span>
                                            </span>
                    @else
                        <span class="current-price text-brand">{{$data->DefaultShape->price }}</span>
                    @endif
                </div>
            </div>
            <div class="detail-extralink mb-30">
                <div class="detail-qty border radius">
                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                    <span class="qty-val">1</span>
                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                </div>
                <div class="product-extra-link2">
                    <button type="submit"  data-id="{{$data->id}}" class="button add button-add-to-cart"><i class="fi-rs-shopping-cart"></i>{{__('lang.add')}}</button>
                </div>
            </div>
            <div class="font-xs">
                <ul>
                    <li class="mb-5">{{__('lang.Vendor')}}: <span class="text-brand">eltayeb</span></li>
                    <li class="mb-5">{{__('lang.date')}}:<span class="text-brand"> {{$data->created_at->format('Y-m-d H:i')}}</span></li>
                </ul>
            </div>
        </div>
        <!-- Detail Info -->
    </div>
</div>
