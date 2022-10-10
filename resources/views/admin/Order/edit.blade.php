@extends('admin.layouts.master')

@section('css')
@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات المطعم</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">قائمة الطلبات</li>
        <li class="breadcrumb-item text-gray-500">تعديل بيانات عميل</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->

        <div class="content flex-row-fluid" id="kt_content">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">تعديل بيانات المطعم</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-Restaurants')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">

                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">صورة</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title"></h4>
                                                <div class="controls">
                                                    <input type="file"  class="dropify"  name="image" data-default-file="{{$employee->image}}" required data-validation-required-message="{{trans('word.This field is required')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                    {{--                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>--}}
                                    <!--end::Hint-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                {{--                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>--}}
                                <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">اسم المطعم</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الاسم" value="{{$employee->name}}" required/>

                                <input type="hidden" name="id" value="{{$employee->id}}" required/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">البريد الالكترونى</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="البريد الالكتروني" value="{{$employee->email}}"
                                       />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">رقم الجوال</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel" name="phone"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="رقم الجوال" value="{{$employee->phone }}" required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">حالة المطعم</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="status" class="form-control">
                                    <option @if($employee->status == 'open') selected @endif value="open"> مفتوح </option>
                                    <option @if($employee->status == 'closed') selected @endif value="closed"> مغلق </option>
                                    <option @if($employee->status == 'busy') selected @endif value="busy"> مشغول </option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الدفع نقدا </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="cash_payment" class="form-control">
                                    <option @if($employee->cash_payment == 'active') selected @endif value="active"> مفعل </option>
                                    <option @if($employee->cash_payment == 'in_active') selected @endif value="inactive"> غير مفعل</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الحد الادني للطلب </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="min_order_value"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                        value="{{$employee->min_order_value }}" required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الحد الاقصى للطلب </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="max_order_value"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       value="{{$employee->max_order_value }}" required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">نطاق التوصيل  </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="delivery_radius"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       value="{{$employee->delivery_radius }}" required/>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">العنوان تفصيلي </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="address"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       value="{{$employee->address}}" required/>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <label>الموقع على الخريطة </label>
                                <input type="text" id="search_input" placeholder=" أبحث  بالمكان او اضغط على الخريطه"/>
                                <input type="hidden" id="information"/>
                                <div id="us1" style="width: 100%; height: 400px;"></div>

                            </div>
                        <?php

                        $lat = !empty($employee->lat) ? $employee->lat : '24.69670448385797';
                        $lng = !empty($employee->lng) ? $employee->lng : '46.690517596875';

                        ?>
                        <!--begin::Form Group-->

                            <input type="hidden" value="{{$lat}}" id="lat" name="lat">
                            <input type="hidden" value="{{$lng}}" id="lng" name="lng">

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">وصف المطعم باللغة العربية   </label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <textarea rows="5" class="form-control" id="editor1" name="ar_description">{{$employee->ar_description}}</textarea>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">وصف المطعم باللغة الانجليزية   </label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <textarea rows="5" class="form-control" id="editor1" name="en_description">{{$employee->en_description}}</textarea>
                            </div>

                            <!--end::Input group-->
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">مفعل
                                        ؟</label>
                                    <input class="form-check-input" name="is_active" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                           name="is_active" type="checkbox"
                                           value="active" id="flexSwitchDefault"
                                           @if($employee->is_active == 'active') checked @endif />
                                </div>
                            </div>
                            <!--end::Input group-->


                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->

        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>
    <script src="{{asset('admin/locationpicker.jquery.js')}}"></script>


    <script>
        $('#us1').locationpicker({
            location: {
                latitude: {{$lat}},
                longitude: {{$lng}}
            },
            radius: 300,
            markerIcon: "{{asset('admin/map-marker-2-xl.png')}}",
            inputBinding: {
                latitudeInput: $('#lat'),
                longitudeInput: $('#lng'),
                // radiusInput: $('#us2-radius'),
                // locationNameInput: $('#address'),
            }

        });
        if (document.getElementById('us1')) {
            var content;
            var latitude = 24.69670448385797;
            var longitude = 46.690517596875;
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
        $("#state").change(function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-branch')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    $.each($data, function (title, id) {
                        console.log(title)
                        outs += '<option value="' + id + '">' + title + '</option>'
                    });
                    $('#branche').html(outs);
                });
            }
        });
    </script>


    <script>
        $('.dropify').dropify();

    </script>


@endsection

