<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="dt-buttons flex-wrap">

    <!--end::Filter-->
    <!--begin::Add user-->
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_user">
        <i class="bi bi-plus-circle-fill fs-2x"></i>
    </button>

    <!--end::Add user-->
    <button id="delete" class="btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-trash-fill fs-2x"></i>
    </button>

    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">اضافة جديده</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
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
                    <form id="" class="form" method="post"  enctype="multipart/form-data" action="{{url('store-Event')}}">
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
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الاسم </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                     required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">رقم الهاتف </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="phone"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       required/>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">التاريخ </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="date"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الوقت </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time" name="time"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">العنوان </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="address"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الوصف القصير  </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea rows="5" name="description" id="editor2"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                          required></textarea>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الوصف التفصيلي  </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea rows="5" name="long_description" id="editor1"
                                          class="form-control form-control-solid mb-3 mb-lg-0"
                                          required></textarea>
                                <!--end::Input-->
                            </div>


                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">الصورة</h4>
                                        <div class="controls">
                                            <input type="file"  class="dropify"  name="image" data-default-file="" required data-validation-required-message="{{trans('word.This field is required')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title"> صورة الخلفية</h4>
                                        <div class="controls">
                                            <input type="file"  class="dropify"  name="background" data-default-file="" required data-validation-required-message="{{trans('word.This field is required')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--end::Input group-->  <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">المفضلة
                                        ؟</label>
                                    <input class="form-check-input" name="is_popular" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input
                                        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                        name="is_popular" type="checkbox"
                                        value="active" id="flexSwitchDefault" checked/>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">مفعل
                                        ؟</label>
                                    <input class="form-check-input" name="is_active" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input
                                        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                        name="is_active" type="checkbox"
                                        value="active" id="flexSwitchDefault" checked/>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <div class="fv-row mb-7">
                                <label>الموقع على الخريطة </label>
                                <input type="text" id="search_input" placeholder=" أبحث  بالمكان او اضغط على الخريطه"/>
                                <input type="hidden" id="information"/>
                                <div id="us1" style="width: 100%; height: 400px;"></div>

                            </div>
                        <?php
                        $lat = !empty(old('lat')) ? old('lat') : '24.69670448385797';
                        $lng = !empty(old('lng')) ? old('lng') : '46.690517596875';
                        ?>
                        <!--begin::Form Group-->

                            <input type="hidden" value="{{$lat}}" id="lat" name="lat">
                            <input type="hidden" value="{{$lng}}" id="lng" name="lng">

                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">ألغاء
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                <span class="indicator-label">حفظ</span>
                                <span class="indicator-progress">برجاء الانتظار
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    <!--end::Modal - Add task-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );

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

<script type="text/javascript">
    $('.dropify').dropify();

    $("#delete").on("click", function () {
        var dataList = [];
        $("input:checkbox:checked").each(function (index) {
            dataList.push($(this).val())
        })

        if (dataList.length > 0) {
            Swal.fire({
                title: "تحذير.هل انت متأكد؟!",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("delete-Event  ")}}',
                        type: "get",
                        data: {'id': dataList, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("نجاح", "تم الحذف بنجاح", "success");
                                // location.reload();
                            } else {
                                Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("ألغاء", "تم الالغاء", "error");
                }
            });
        }
    });
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
