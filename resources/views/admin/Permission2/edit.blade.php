@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <!-- Page-Title -->
    <!-- Page-Title -->
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    {{trans('admin.dashboard')}}
                </li>
                <li class="breadcrumb-item"><a href="{{ url('Permissions') }}"> {{trans('lang.Permissions')}}
                    </a>
                </li>

                <li class="breadcrumb-item">
                    {{trans('admin.Edit')}}
                </li>

            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid" @if(session('lang')=='en') @else dir="rtl" @endif>
            @include('layouts.errors')

            <div class="card m-b-20">
                <div class="card-body">
                    <form class="px-10" novalidate="novalidate" id="kt_form2" method="post" action="{{url('Update_Permission')}}"
                          enctype="multipart/form-data">
                        <!--begin: Wizard Step 1-->
                        @csrf

                        <div class="form-group">
                            <label>{{__('lang.name')}} <span style="color: red"> *</span>  </label>
                            <input type="text" class="form-control form-control-solid" name="ar_title" value="{{$User->name}}"
                                   placeholder="{{__('lang.name')}}">
                            <input type="hidden" class="form-control form-control-solid" name="id" value="{{$User->id}}"
                                   placeholder="{{__('lang.name_ar')}}">
                        </div>
                        @php()
                            $$Permissions = \App
                        @endphp
                        @foreach(\App\Permission::all() as $permission)
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="col-from-label">{{ __('lang.'.$permission->name) }}</label>
                                </div>
                                <div class="col-md-2">
                                    <div class="switch">
                                        <label>
                                            <input type="checkbox" name="permissions[]" @if(in_array($permission->id, $Permissions)) value="{{$permission->name}}"><span class="lever switch-col-indigo"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                    @endforeach

                        <!--end: Wizard Actions-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Jobs_Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                        </div>
                    </form>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

@endsection

@section('script')


            <script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
            <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'editor5' );
                CKEDITOR.replace( 'editor6' );
            </script>

            <!--begin::Page scripts(used by this page) -->
            <script>
                $('#kt_select4').select2({
                    placeholder: ""
                });
                $('#kt_select5').select2({
                    placeholder: ""
                });
            </script>

            <script type="text/javascript"
                    src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>
            <script src="{{asset('dashboard/locationpicker.jquery.js')}}"></script>


            <!--begin::Page scripts(used by this page) -->
            <script>

                if (document.getElementById('us2')) {
                    var content;
                        @if($User->lat== null && $User->lng == null)
                    var latitude = 24.69670448385797;
                    var longitude = 46.690517596875;
                        @else
                    var latitude = {{$User->lat}};
                    var longitude = {{$User->lng}};
                        @endif
                    var map;
                    var marker;
                    navigator.geolocation.getCurrentPosition(loadMap);

                    function loadMap(location) {
                        // if (location.coords) {
                        //     latitude = location.coords.latitude;
                        //     longitude = location.coords.longitude;
                        // }
                        var myLatlng = new google.maps.LatLng(latitude, longitude);

                        var mapOptions = {
                            zoom: 12,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,

                        };
                        map = new google.maps.Map(document.getElementById("us2"), mapOptions);
                        var oldMarker = new google.maps.Marker({
                            position: myLatlng,
                            map,
                        });
                        content = document.getElementById('information2');

                        function setMapOnAll(map) {
                            oldMarker.setMap(map);
                        }

                        google.maps.event.addListener(map, 'click', function (e) {
                            placeMarker(e.latLng);
                            setMapOnAll(null);
                        });


                        var input = document.getElementById('search_input2');
                        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                        var searchBox = new google.maps.places.SearchBox(input);

                        google.maps.event.addListener(searchBox, 'places_changed', function () {
                            var places = searchBox.getPlaces();
                            placeMarker(places[0].geometry.location);


                            setMapOnAll(null);
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
                    $("#lat2").val(location.lat());
                    $("#lng2").val(location.lng());
                    google.maps.event.addListener(marker, 'click', function (e) {
                        new google.maps.InfoWindow({
                            content: "Lat: " + location.lat() + " / Long: " + location.lng()
                        }).open(map, marker);

                    });
                }

                $("#checker").click(function () {
                    var items = document.getElementsByTagName("input");

                    for (var i = 0; i < items.length; i++) {
                        if (items[i].type == 'checkbox') {
                            if (items[i].checked == true) {
                                items[i].checked = false;
                            } else {
                                items[i].checked = true;
                            }
                        }
                    }

                });

                //Delete Row
                $("body").on("click", "#delete", function () {
                    var dataList = [];
                    dataList = $("#kt_datatable input:checkbox:checked").map(function () {
                        return $(this).val();
                    }).get();

                    if (dataList.length > 0) {
                        Swal.fire({
                            title: "{{trans('word.Are you sure?')}}",
                            text: "",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "{{trans('word.Yes, Sure it!')}}",
                            cancelButtonText: "{{trans('word.No')}}",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }).then(function (result) {
                            if (result.value) {
                                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    url: '{{url("Delete_Language")}}',
                                    type: "get",
                                    data: {'id': dataList, _token: CSRF_TOKEN},
                                    dataType: "JSON",
                                    success: function (data) {
                                        if (data.message == "Success") {
                                            $("#kt_datatable .selected").hide();
                                            @if( Request::segment(1) == "ar")
                                            $('#delete').text('حذف 0 سجل');
                                            @else
                                            $('#delete').text('Delete 0 row');
                                            @endif
                                            Swal.fire("{{trans('word.Deleted')}}", "{{trans('word.Message_Delete')}}", "success");
                                            location.reload();
                                        } else {
                                            Swal.fire("{{trans('word.Sorry')}}", "{{trans('word.Message_Fail_Delete')}}", "error");
                                        }
                                    },
                                    fail: function (xhrerrorThrown) {
                                        Swal.fire("{{trans('word.Sorry')}}", "{{trans('word.Message_Fail_Delete')}}", "error");
                                    }
                                });
                                // result.dismiss can be 'cancel', 'overlay',
                                // 'close', and 'timer'
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire("{{trans('word.Cancelled')}}", "{{trans('word.Message_Cancelled_Delete')}}", "error");
                            }
                        });
                    }
                });

                $(document).ready(function () {
                    // Basic
                    $('.dropify').dropify();

                    // Used events
                    var drEvent = $('#input-file-events').dropify();

                    drEvent.on('dropify.beforeClear', function (event, element) {
                        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                    });

                    drEvent.on('dropify.afterClear', function (event, element) {
                        alert('File deleted');
                    });

                    drEvent.on('dropify.errors', function (event, element) {
                        console.log('Has Errors');
                    });

                    var drDestroy = $('#input-file-to-destroy').dropify();
                    drDestroy = drDestroy.data('dropify')
                    $('#toggleDropify').on('click', function (e) {
                        e.preventDefault();
                        if (drDestroy.isDropified()) {
                            drDestroy.destroy();
                        } else {
                            drDestroy.init();
                        }
                    })
                });

                //End Delete Row
                $(".edit-Advert").click(function () {
                    var id = $(this).data('id')
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "GET",
                        url: "{{url('Edit_Language')}}",
                        data: {"id": id},
                        success: function (data) {
                            $(".bs-edit-modal-lg .modal-body").html(data)
                            $(".bs-edit-modal-lg").modal('show')
                            $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                                //   $('.bs-edit-modal-lg').empty();
                                $('.bs-edit-modal-lg').hide();
                            })
                        }
                    })
                })

                $(".switchery-demo").click(function () {
                    var id = $(this).data('id');
                    console.log(id);
                    $.ajax({
                        type: "get",
                        url: "{{url('UpdateStatusUser')}}",
                        data: {"id": id},
                        success: function (data) {
                            Swal.fire({
                                icon: 'success',
                                title: "@if(Request::segment(1)=='ar')  نجاح @else success @endif",
                                text: "@if(Request::segment(1) == 'ar' ) تم التعديل بنجاح   @else Successfully changed @endif",
                                type: "success",
                                timer: 1000,
                                showConfirmButton: false
                            });


                        }
                    })
                })
            </script>

            <script type="text/javascript">
                $(document).ready(function () {
                    // Basic
                    $('.dropify').dropify();

                    // Used events
                    var drEvent = $('#input-file-events').dropify();

                    drEvent.on('dropify.beforeClear', function (event, element) {
                        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                    });

                    drEvent.on('dropify.afterClear', function (event, element) {
                        alert('File deleted');
                    });

                    drEvent.on('dropify.errors', function (event, element) {
                        console.log('Has Errors');
                    });

                    var drDestroy = $('#input-file-to-destroy').dropify();
                    drDestroy = drDestroy.data('dropify')
                    $('#toggleDropify').on('click', function (e) {
                        e.preventDefault();
                        if (drDestroy.isDropified()) {
                            drDestroy.destroy();
                        } else {
                            drDestroy.init();
                        }
                    })
                });
                $("#MainCategory2").click(function () {
                    var wahda = $(this).val();

                    if (wahda != '') {

                        $.get("{{ URL::to('/GetSubCategory')}}" + '/' + wahda, function ($data) {
                            console.log($data)

                            var outs = "";
                            $.each($data, function (name, id) {

                                outs += '<option value="' + id + '">' + name + '</option>'

                            });
                            $('#SubCategory2').html(outs);


                        });
                    }
                });
                $("#City2").click(function () {
                    var wahda = $(this).val();

                    if (wahda != '') {

                        $.get("{{ URL::to('/GetDistricts')}}" + '/' + wahda, function ($data) {
                            console.log($data)

                            var outs = "";
                            $.each($data, function (name, id) {

                                outs += '<option value="' + id + '">' + name + '</option>'

                            });
                            $('#district2').html(outs);


                        });
                    }
                });


            </script>


            <?php
            $message = session()->get("message");
            ?>

            @if( session()->has("message"))
                @if( $message == "Success")
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: "{{__('lang.Success')}}",
                            text: "{{__('lang.Success_text')}}",
                            type: "success",
                            timer: 1000,
                            showConfirmButton: false
                        });

                    </script>
                @elseif ( $message == "Failed")
                    <script>
                        Swal.fire({
                            icon: 'warning',
                            title: "{{__('lang.Sorry')}}",
                            text: "{{__('lang.operation_failed')}}",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                @endif

                @if( $message == "phone")
                    <script>
                        Swal.fire({
                            icon: 'warning',
                            title: "{{__('lang.Sorry')}}",
                            text: "عفوا رقم الهاتف موجود بالفعل",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                @endif
                @if( $message == "email")
                    <script>
                        Swal.fire({
                            icon: 'warning',
                            title: "{{__('lang.Sorry')}}",
                            text: "عفوا البريد الالكتروني موجود بالفعل",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                @endif
                @if( $message == "job_num")
                    <script>
                        Swal.fire({
                            icon: 'warning',
                            title: "{{__('lang.Sorry')}}",
                            text: "عفوا رقم الوظيفة موجود بالفعل",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                @endif
                @if( $message == "contract_num")
                    <script>
                        Swal.fire({
                            icon: 'warning',
                            title: "{{__('lang.Sorry')}}",
                            text: "عفوا رقم العقد موجود بالفعل",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
    @endif
    @endif

@endsection
