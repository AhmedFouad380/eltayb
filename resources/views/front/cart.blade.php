@extends('front.layout')
@section('title')
    {{__('lang.cart')}}
@endsection
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.Home')}}</a>
                    <span></span> {{__('lang.cart')}}
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">{{__('lang.cart')}}</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{\App\Models\Cart::where('user_id',Auth::guard('web')->id())->count()}}</span> products in your cart</h6>
                        <h6 class="text-body"><a href="#" class=" delete-All clear-cart text-muted"><i class="fi-rs-trash mr-5"></i>{{__('lang.Clear Cart')}}</a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        @if(count($Carts) > 0)
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
{{--                                    <th class="custome-checkbox start pl-30">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">--}}
{{--                                        <label class="form-check-label" for="exampleCheckbox11"></label>--}}
{{--                                    </th>--}}
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($Carts as $Cart)
                                <tr class="pt-30 tr{{$Cart->id}}">
                                    <td class="image product-thumbnail pt-40"><img src="{{$Cart->Product->image}}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="{{url('product_details',$Cart->product_id)}}">{{$Cart->Product->title}}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body"> {{$Cart->Shape->price}} </h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down" data-id="{{$Cart->id}}" data-count="{{$Cart->count}}"  ><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val value-id-{{$Cart->id}}"> {{$Cart->count}} </span>
                                                <a href="#" class="qty-up" data-id="{{$Cart->id}}"   data-count="{{$Cart->count}}"  ><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand"> {{$Cart->Shape->price * $Cart->count}} </h4>
                                    </td>
                                    <td class="action  text-center"  data-title="Remove"><a  data-id="{{$Cart->id}}" href="#" class=" delete text-body"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                <?php
                                $total[] = $Cart->Shape->price * $Cart->count
                                ?>
                            @endforeach
                                </tbody>
                        </table>
                        @else
                       <h3> {{__('lang.EmptyCart')}} </h3>
                            <?php
                            $total[] = 0;
                            ?>
                        @endif
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn " href="{{__('/')}}"><i class="fi-rs-arrow-left mr-10"></i>{{__('lang.Continue Shopping')}}</a>
{{--                        <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Update Cart</a>--}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="p-40">
                            <h4 class="mb-10">{{__('lang.Apply Coupon')}}</h4>
                            {{--                                <p class="mb-30"><span class="font-lg text-muted">{{__('lang.Using A Promo Code')}}</p>--}}
                            <form action="{{url('ApplyCoupon')}}" method="post" >
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <input class="font-medium mr-15 coupon" required name="coupon" placeholder="{{__('lang.Enter Your Coupon')}}">
                                    <br>
                                    <button class="btn" type="submit"><i class="fi-rs-label mr-10"></i>{{__('lang.Apply')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="border p-md-4 cart-totals ml-30">
                        <form method="post" action="{{url('StoreOrder')}}">
                            @csrf
                        <div class="table-responsive">
                            <table class="table no-border">
                                @if(Session::Has('coupon'))
                                <tbody>
                                <?php
                                $coupon = \App\Models\Coupon::findOrFail(Session('coupon'));
                                $totalWithCoupon =  array_sum($total) - ((array_sum($total) * $coupon->percent) / 100);
                                ?>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.Subtotal')}}</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{array_sum($total)}}  KWD</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>

                                <tr>
                                    <td class="cart_total_label">

                                        <h6 class="text-muted">{{__('lang.Coupon')}} : {{$coupon->name}}
                                        </h6>
                                        <Br>
                                        <input type="hidden" name="coupon_id" class="form-control" value="{{$coupon->id}}">
                                        <input type="hidden" name="payment_type" class="form-control" value="cash">
                                        <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                                            <a href="{{url('removeCoupon')}}" style="
    padding: 0;
    border: none;
    width: 146px;
    height: 26px;
    background-color: #DEF9EC ; border-radius: 10%"> {{__('lang.Delete')}}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end text-danger">- {{$coupon->percent}} %</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">{{__('lang.Tax')}} : </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">{{\App\Models\Setting::find(1)->tax}} KWD</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">{{__('lang.delivery_fees')}} :</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">{{\App\Models\Setting::find(1)->delivery_fees}} KWD</h5>
                                    </td>
                                </tr>

{{--                                    <tr>--}}
{{--                                        <td scope="col" colspan="2">--}}
{{--                                            <div class="divider-2 mt-10 mb-10"></div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.address')}}
{{--                                                <a href="{{url('add-address')}}"><i class="fi-rs-plus mr-5"></i></a>--}}
                                            </h6>
                                        </td>
                                        <td class="cart_total_amount">
                                        <select name="address_id" class=""   >
                                            @foreach(\App\Models\Address::where('user_id',Auth::guard('web')->id())->get() as $Address)
                                            <option value="{{$Address->id}}">{{$Address->name}}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.Total')}}</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{$totalWithCoupon + \App\Models\Setting::find(1)->delivery_fees + \App\Models\Setting::find(1)->tax}} KWD</h4>
                                        </td>
                                    </tr>
                                </tbody>
                                @else
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.Subtotal')}}</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{array_sum($total)}} KWD</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.Tax')}} : </h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">{{\App\Models\Setting::find(1)->tax}} KWD</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.delivery_fees')}} :</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">{{\App\Models\Setting::find(1)->delivery_fees}} KWD</h5>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.address')}}
                                                {{--                                                <a href="{{url('add-address')}}"><i class="fi-rs-plus mr-5"></i></a>--}}
                                            </h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <select class="form-control" name="address_id" required >
                                                @foreach(\App\Models\Address::where('user_id',Auth::guard('web')->id())->get() as $Address)
                                                <option value="{{$Address->id}}">{{$Address->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>                                      </tr> <tr>

                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">{{__('lang.Total')}}</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{array_sum($total) + \App\Models\Setting::find(1)->delivery_fees + \App\Models\Setting::find(1)->tax }} KWD</h4>
                                        </td>
                                    </tr>
                                    </tbody>

                                @endif
                            </table>
                        </div>
                        <button type="submit"  class="btn mb-20 w-100">{{__('lang.Proceed To CheckOut')}}<i class="fi-rs-sign-out ml-15"></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
{{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}

    @if(Session('CouponMessage') && Session('CouponMessage') == 'success')
            <script>

                Swal.fire({
            icon: 'success',
            title: "{{__('lang.Success')}}",
            text: "{{__('lang.Success_text')}}",
            type: "success",
            timer: 1000,
            showConfirmButton: false

        });
                </script
        @endif


            @if(Session('CouponMessage') && Session('CouponMessage') == 'failed')
            <script>

                Swal.fire({
            icon: 'error',
            title: "{{__('lang.worning')}}",
            text: "{{__('lang.coupon is wrong')}}",
            type: "error",
            timer: 3000,
            showConfirmButton: false
        });
                </script>
        @endif
        @if(Session('CouponMessage') && Session('CouponMessage') == 'AlreadyAdd')
                <script>

                Swal.fire({
            icon: 'error',
            title: "{{__('lang.worning')}}",
            text: "{{__('lang.coupon is already add')}}",
            type: "error",
            timer: 3000,
            showConfirmButton: false
        });
                </script>

        @endif
        <script>

            $('.qty-down').on('click',function () {
          var id = $(this).data('id');
          var value = $(this).data('count') - 1 ;

            $.ajax({
                type: "GET",
                url: "{{url('qty-down')}}",
                data: {"id": id ,"value":value},
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: "{{__('lang.Success')}}",
                        text: "{{__('lang.Success_text')}}",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });
                    location.reload()

                }
            })
        });
        $('.qty-up').on('click',function () {
            var id = $(this).data('id');
            var value = $(this).data('count') + 1;
            $.ajax({
                type: "GET",
                url: "{{url('qty-up')}}",
                data: {"id": id ,"value":value},
                success: function (data) {

                    Swal.fire({
                        icon: 'success',
                        title: "{{__('lang.Success')}}",
                        text: "{{__('lang.Success_text')}}",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });
                    location.reload()

                }
            })
        });
        $('.delete').on('click',function () {
            var id = $(this).data('id');

            Swal.fire({
                title: "{{__('lang.warrning')}} !",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "{{__('lang.btn_yes')}}",
                cancelButtonText: "{{__('lang.btn_no')}}",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "GET",
                        url: "{{url('delete-cart-item')}}",
                        data: {"id": id },
                        success: function (data) {

                            location.reload();
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
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire('', "{{__('lang.Message_Cancelled')}}", "error");
                }
            });

        });
        $('.delete-All').on('click',function () {

            Swal.fire({
                title: "{{__('lang.warrning')}} !",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "{{__('lang.btn_yes')}}",
                cancelButtonText: "{{__('lang.btn_no')}}",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "GET",
                        url: "{{url('delete-All')}}",
                        success: function (data) {

                            location.reload();
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
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire('', "{{__('lang.Message_Cancelled')}}", "error");
                }
            });

        });
    </script>


@endsection
