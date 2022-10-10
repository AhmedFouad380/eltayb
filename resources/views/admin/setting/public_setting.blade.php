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
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">الاعدادات</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">الاعدادات</li>
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
                        <h3 class="fw-bolder m-0">الاعدادات العامة</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" action="{{url('edit_setting')}}" class="form"
                          method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">الشعار</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                         style="background-image: url({{ URL::asset('admin/assets/media/avatars/blank.png')}})">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                             style="background-image: url({{ $settings->logo}})"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="avatar_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">الاسم</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="ar_name"
                                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم" value="{{$settings->ar_name}}"/>
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">الاسم باللغة الانجليزية</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="en_name"
                                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم" value="{{$settings->en_name}}"/>
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6"> الوصف المختصر</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="about"
                                           class="form-control form-control-lg form-control-solid" placeholder="الوصف"
                                           value="{{$settings->about}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">رقم الجوال </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="phone"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="رقم الجوال 1" value="{{$settings->phone}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">رقم جوال خدمة العملاء</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="customer_phone"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="رقم الجوال 2" value="{{$settings->customer_phone}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">العنوان </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="address"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="العنوان 1" value="{{$settings->address}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">البريد الاليكترونى</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="البريد الاليكترونى " value="{{$settings->email}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">تويتر</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="twitter"
                                           class="form-control form-control-lg form-control-solid" placeholder="تويتر "
                                           value="{{$settings->twitter}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">انستجرام</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="instagram"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="انستجرام " value="{{$settings->instagram}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">يوتيوب</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="youtube"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="يوتيوب " value="{{$settings->youtube}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">فيس بوك</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="facebook"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="فيس بوك " value="{{$settings->facebook}}"/>
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">مواعيد العمل</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="hours"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="مواعيد العمل " value="{{$settings->hours}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">رسوم الشحن</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="delivery_fees"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="رسوم الشحن " value="{{$settings->delivery_fees}}"/>
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">الضريبة</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="tax"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="الضريبة " value="{{$settings->tax}}"/>
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="fv-row mb-7">
                                <label>الموقع على الخريطة </label>
                                <input type="text" id="search_input" placeholder=" أبحث  بالمكان او اضغط على الخريطه"/>
                                <input type="hidden" id="information"/>
                                <div id="us1" style="width: 100%; height: 400px;"></div>

                            </div>
                        <?php

                        $lat = !empty($settings->lat) ? $settings->lat : '24.69670448385797';
                        $lng = !empty($settings->lng) ? $settings->lng : '46.690517596875';

                        ?>
                        <!--begin::Form Group-->

                            <input type="hidden" value="{{$lat}}" id="lat" name="lat">
                            <input type="hidden" value="{{$lng}}" id="lng" name="lng">
                            <!--end::Input group-->

                        </div>
                        <!--end::Card body-->
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

    <?php
    $message = session()->get("message");
    ?>

    @if( session()->has("message"))
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success("نجاح", "{{$message}}");
        </script>

    @endif

@endsection

