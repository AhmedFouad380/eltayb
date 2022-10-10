@extends('front.layout')

@section('title')
    {{__('lang.Profile')}}
    @endsection
@section('css')
    <style>
        .pac-container { z-index: 100000 !important; }

    </style>
    @endsection
@section('content')
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('lang.Home')}}</a>
                        <span></span>     {{__('lang.Profile')}}

                    </div>
                </div>
            </div>
            <div class="page-content pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="dashboard-menu">
                                        <ul class="nav flex-column" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if(Request::segment(2) == '') active @endif" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>{{__('lang.Dashboard')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link @if(Request::segment(2) == 'Orders') active @endif" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>{{__('lang.Orders')}}</a>
                                            </li>
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>{{}}</a>--}}
{{--                                            </li>--}}
                                            <li class="nav-item">
                                                <a class="nav-link @if(Request::segment(2) == 'My Address') active @endif" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>{{__('lang.My Address')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link @if(Request::segment(2) == 'Account details') active @endif" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>{{__('lang.Account details')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('logout')}}"><i class="fi-rs-sign-out mr-10"></i>{{__('lang.Logout')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content account dashboard-content pl-50">
                                        <div class="tab-pane fade  @if(Request::segment(2) == '') active show @endif " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Hello {{Auth::guard('web')->user()->name}}!</h3>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                                        manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade @if(Request::segment(2) == 'Orders') active show @endif" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="mb-0">{{__('lang.Your Orders')}}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{__('lang.Order')}}</th>
                                                                    <th>{{__('lang.Date')}}</th>
                                                                    <th>{{__('lang.OrderStatus')}}</th>
                                                                    <th>{{__('lang.Total')}}</th>
                                                                    <th>{{__('lang.view')}}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($Orders as $Order)
                                                                <tr>
                                                                    <td>{{$Order->id}}</td>
                                                                    <td>{{$Order->created_at->format('Y-m-d H:i')}}</td>
                                                                    <td>
                                                                        @if($Order->type == 'pending')
                                                                            {{__('lang.pending')}}
                                                                        @elseif($Order->type == 'preparing')
                                                                            {{__('lang.preparing')}}
                                                                        @elseif($Order->type == 'on_way')
                                                                            {{__('lang.on_way')}}
                                                                        @elseif($Order->type == 'delivered')
                                                                            {{__('lang.delivered')}}
                                                                        @elseif($Order->type == 'canceled')
                                                                            {{__('lang.canceled')}}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$Order->total_price}} </td>
                                                                    <td><a href="" class="btn-small d-block">{{__('lang.View')}}</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Orders tracking</h3>
                                                </div>
                                                <div class="card-body contact-from-area">
                                                    <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                                <div class="input-style mb-20">
                                                                    <label>Order ID</label>
                                                                    <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                                </div>
                                                                <div class="input-style mb-20">
                                                                    <label>Billing email</label>
                                                                    <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                                </div>
                                                                <button class="submit submit-auto-width" type="submit">Track</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade @if(Request::segment(2) == 'My Address') active show @endif" id="address" role="tabpanel" aria-labelledby="address-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-3 mb-lg-0">
                                                        <div class="card-header">
                                                            <h3 class="mb-0">{{__('lang.My Address')}}</h3>
                                                            <br>
                                                            <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_add_user"><i class="fi-rs-plus"> </i>
                                                                {{__('lang.add-address')}} </button>
                                                            <div class="modal fade " id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                                                <!--begin::Modal dialog-->
                                                                <div class="modal-dialog modal-lg  modal-dialog-centered mw-650px">
                                                                    <!--begin::Modal content-->
                                                                    <div class="modal-content">
                                                                        <!--begin::Modal header-->
                                                                        <div class="modal-header" id="kt_modal_add_user_header">
                                                                            <!--begin::Modal title-->
                                                                            <h2 class="fw-bolder"></h2>
                                                                            <!--end::Modal title-->
                                                                            <!--begin::Close-->
                                                                            <div style="background-color: #FFF" class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                                 data-bs-dismiss="modal">
                                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                              transform="rotate(-45 6 17.3137)" fill="black"/>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                              transform="rotate(45 7.41422 6)" fill="black"/>
                    </svg>
                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </div>
                                                                            <!--end::Close-->
                                                                        </div>
                                                                        <!--end::Modal header-->
                                                                        <!--begin::Modal body-->
                                                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                                            <!--begin::Form-->
                                                                            <form id="" class="form" method="post" action="{{url('store-Address')}}">
                                                                            @csrf
                                                                            <!--begin::Scroll-->
                                                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                                     id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                                                     data-kt-scroll-activate="{default: false, lg: true}"
                                                                                     data-kt-scroll-max-height="auto"
                                                                                     data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                                                     data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                                                     data-kt-scroll-offset="300px">

                                                                                    <!--begin::Input group-->
                                                                                    <div class="form-group">
                                                                                        <!--begin::Label-->
                                                                                        <label class="required fw-bold fs-6 mb-2">{{__('lang.name')}}</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text" name="name"
                                                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                               placeholder="{{__('lang.name')}}" value="" required/>
                                                                                        <!--end::Input-->
                                                                                    </div>
                                                                                    <!--end::Input group-->  <!--begin::Input group-->
                                                                                    <div class="form-group">
                                                                                        <!--begin::Label-->
                                                                                        <label class="required fw-bold fs-6 mb-2">{{__('lang.address')}} </label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text" name="address"
                                                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                               placeholder="{{__('lang.address')}}" value=""
                                                                                        />
                                                                                        <!--end::Input-->
                                                                                    </div>
                                                                                    <!--end::Input group-->
                                                                                    <div class="form-group">
                                                                                        <!--begin::Label-->
                                                                                        <label class="required fw-bold fs-6 mb-2"> {{__('lang.building_num')}}</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text" name="building_num" id="building_num"
                                                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                               placeholder="{{__('lang.building_num')}}" value="" required/>
                                                                                        <!--end::Input-->
                                                                                        <span id="error-validation" style="color:red"></span>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <!--begin::Label-->
                                                                                        <label class="required fw-bold fs-6 mb-2"> {{__('lang.floor_num')}}</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text" name="floor_num"
                                                                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                               placeholder=" {{__('lang.floor_num')}}" value="" required/>
                                                                                        <!--end::Input-->
                                                                                    </div>

                                                                                    <!--end::Input group-->
                                                                                    <div class="">
                                                                                        <label>{{__('lang.location on map')}} </label>
                                                                                        <input type="text" id="search_input" placeholder=" {{__('lang.search')}}"/>
                                                                                        <input type="hidden" id="information"/>
                                                                                        <div id="us1" style="width: 100%; height: 400px;"></div>

                                                                                    </div>
                                                                                <?php

                                                                                $lat = '24.69670448385797';
                                                                                $lng =  '46.690517596875';

                                                                                ?>
                                                                                <!--begin::Form Group-->

                                                                                    <input type="hidden" value="{{$lat}}" id="lat" name="lat">
                                                                                    <input type="hidden" value="{{$lng}}" id="lng" name="lng">

                                                                                </div>
                                                                                <!--end::Scroll-->
                                                                                <!--begin::Actions-->
                                                                                <div class="text-center pt-15">
                                                                                    <button type="reset" class="btn btn-light me-3" style="background-color:#787878"
                                                                                            data-bs-dismiss="modal">ألغاء
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-primary me-3" style="background-color: #386dc2"
                                                                                            data-kt-users-modal-action="submit">
                                                                                        <span class="indicator-label">حفظ</span>
                                                                                    </button>
                                                                                </div>
                                                                                <!--end::Actions-->
                                                                            </form>
                                                                            <!--end::Form-->
                                                                        </div>
                                                                        <!--end::Modal body-->
                                                                    </div>
                                                                    <!--end::Modal content-->
                                                                </div>
                                                                <!--end::Modal dialog-->
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach($addresses as $Address)
                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">{{$Address->name}}</h5>
                                                        </div>

                                                        <div class="card-body">
                                                            <p>{{__('lang.building_num')}} : {{$Address->building_num}}</p>
                                                            <p>{{__('lang.floor_num')}} : {{$Address->floor_num}}</p>
                                                            <p>{{__('lang.address')}} : {{$Address->address}}</p>
                                                            <a href="#" data-id="{{$Address->id}}"class="viewMap btn-small" style="color:#4d4ebd">{{__('lang.view on map')}}</a><br>
                                                            <a href="#" data-id="{{$Address->id}} "class="edit-address btn-small">{{__('lang.Users_Edit')}}</a><br>
                                                            <a data-id="5" href="{{url('/deleteAddress',$Address->id)}}" class=" delete text-body"><i class="fi-rs-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                    @endforeach

                                            </div>
                                        </div>
                                        <div class="tab-pane fade @if(Request::segment(2) == 'Account details') active show @endif" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>{{__('lang.Account details')}}</h5>
                                                </div>
                                                <div class="card-body">
{{--                                                    <p>Already have an account? <a href="page-login.html">Log in instead!</a></p>--}}
                                                    <form method="post" action="{{url('UpdateProfile')}}">
                                                        <div class="row">
                                                            @csrf
                                                            <div class="col-md-12 form-group">
                                                                <input type="text" required="" value="{{$data->name}}"  name="name"  required placeholder="{{__('lang.name')}}" />
                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <input type="text" disabled value="{{$data->email}}" required="" name="email" placeholder="{{__('lang.email')}}" />
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <input type="text" required="" value="{{$data->phone}}"  name="phone" placeholder="{{__('lang.phone')}}" />
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <input type="password" name="password" placeholder="{{__('lang.password')}}" />
                                                            </div>
                                                            <div class="col-md-12 form-group">
                                                                <input type="password" name="password_confirmation" placeholder="{{__('lang.Confirm password')}}" />
                                                            </div>

                                                                <div class="col-md-12">
                                                                <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content card card-outline-info">

                    <div class="modal-body">

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endsection

@section('js')
    <script type="text/javascript"

            src='http://maps.google.com/maps/api/js?libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>
    <script src="{{asset('admin/locationpicker.jquery.js')}}"></script>


    <script>
        $('#us1').locationpicker({
            location: {
                latitude: {{$lat}},
                longitude: {{$lng}}
            },
            radius: 300,
            inputBinding: {
                latitudeInput: $('#lat'),
                longitudeInput: $('#lng'),
                // radiusInput: $('#us2-radius'),
                // locationNameInput: $('#address'),
            }

        });
        if (document.getElementById('us1')) {
            var content;
            var latitude = {{$lat}};
            var longitude =  {{$lng}};
            var map;
            var marker;
            navigator.geolocation.getCurrentPosition(loadMap);

            function loadMap(location) {
                if (location.coords) {
                    latitude = location.coords.latitude;
                    longitude = location.coords.longitude;
                }
                var myLatlng = new google.maps.LatLng(latitude, longitude);
                var mapOptions = {
                    zoom: 8,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                };
                map = new google.maps.Map(document.getElementById("us1"), mapOptions);

                content = document.getElementById('information');
                google.maps.event.addListener(map, 'click', function (e) {
                    placeMarker(e.latLng);
                });

                var input = document.getElementById('search_input');
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                var searchBox = new google.maps.places.SearchBox(input);

                google.maps.event.addListener(searchBox, 'places_changed', function () {
                    var places = searchBox.getPlaces();
                    placeMarker(places[0].geometry.location);
                });

                marker = new google.maps.Marker({
                    map: map
                });
            }
        }

        function placeMarker(location) {
            marker.setPosition(location);
            map.panTo(location);
            //map.setCenter(location)
            content.innerHTML = "Lat: " + location.lat() + " / Long: " + location.lng();
            $("#lat").val(location.lat());
            $("#lng").val(location.lng());
            google.maps.event.addListener(marker, 'click', function (e) {
                new google.maps.InfoWindow({
                    content: "Lat: " + location.lat() + " / Long: " + location.lng()
                }).open(map, marker);

            });
        }


    </script>

    <script>

        $(".edit-address").click(function () {
            var id = $(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('EditAddress')}}",
                data: {"id": id},
                success: function (data) {
                    $('#titleModel').html("{{__('lang.Edit')}}")
                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })

        $(".viewMap").click(function () {
            var id = $(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('viewMap')}}",
                data: {"id": id},
                success: function (data) {
                    $('#titleModel').html("{{__('lang.ViewMap')}}")

                    $(".bs-edit-modal-lg .modal-body").html(data)
                    $(".bs-edit-modal-lg").modal('show')
                    $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                        //   $('.bs-edit-modal-lg').empty();
                        $('.bs-edit-modal-lg').hide();
                    })
                }
            })
        })

    </script>
@endsection
