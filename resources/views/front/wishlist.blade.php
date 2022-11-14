@extends('front.layout')

@section('title')
    {{__('lang.Wishlist')}}
@endsection
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.Home')}}</a>
                    <span></span> {{__('lang.Wishlist')}}
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="mb-50">
                        <h1 class="heading-2 mb-10">{{__('lang.Wishlist')}}</h1>
{{--                        <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>--}}
                    </div>
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
{{--                                <th scope="col">Stock Status</th>--}}
{{--                                <th scope="col">Action</th>--}}
                                <th scope="col" class="end">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Wishlist::where('user_id',Auth::guard('web')->id())->get() as $data)
                            <tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="{{$data->Product->image}}" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="{{url('product_details',$data->Product->id)}}">{{$data->Product->title}}</a></h6>
{{--                                    <div class="product-rate-cover">--}}
{{--                                        <div class="product-rate d-inline-block">--}}
{{--                                            <div class="product-rating" style="width: 90%"></div>--}}
{{--                                        </div>--}}
{{--                                        <span class="font-small ml-5 text-muted"> (4.0)</span>--}}
{{--                                    </div>--}}
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">{{$data->Product->DefaultShape->price}}</h3>
                                </td>
{{--                                <td class="text-center detail-info" data-title="Stock">--}}
{{--                                    <span class="stock-status in-stock mb-0"> In Stock </span>--}}
{{--                                </td>--}}
{{--                                <td class="text-right" data-title="Cart">--}}
{{--                                    <button class="btn btn-sm">Add to cart</button>--}}
{{--                                </td>--}}
                                <td class="action text-center" data-title="Remove">
                                    <a href="#" class="text-body deleteWithList" data-id="{{$data->id}}"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@section('js')
    <script>
        $('.deleteWithList').click(function () {
            var id = $(this).data('id');

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "GET",
                    url: "{{url('deleteWithList')}}",
                    data: {"id": id },
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: "{{__('lang.Success')}}",
                            text: "{{__('lang.Success_text')}}",
                            type: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });

                        const myTimeout = setTimeout(reload, 2000);

                        function reload() {
                            window.location.reload();
                        }



                    }
                })

        })
    </script>

@endsection
