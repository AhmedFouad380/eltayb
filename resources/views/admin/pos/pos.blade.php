<!DOCTYPE html>
    <html lang="en" dir="rtl">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet">
            <link  rel="stylesheet" href="{{asset('pos/assets/css/all.min.css')}}">
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
            <link rel="stylesheet" href="{{asset('pos/assets/css/styleEn.css')}}">
            <title>Pos || {{\App\Models\Setting::find(1)->name}}</title>
            <style type="text/css">
                .ajax-load{
                    background: #e1e1e1;
                    padding: 10px 0px;
                    width: 100%;
                }
            </style>
        </head>
        <body>
        <form action="{{url('StoreInvoice')}}" method="post">
            @csrf
            <div class="container-fluied p-4 text-capitalize">
                <!-- -----------this is section 1-----------  -->
                <div class="row mb-3">
                    <div class="col-md-6 col-lg-6 col-12">
                        <label for="cars">الموقع :</label>
                        <select   name="branch_id" id="cars">
                            <option value="{{Auth::guard('admin')->user()->Branch->id}}">{{Auth::guard('admin')->user()->Branch->ar_name}}</option>
                        </select>
                        <span class="date">{{\Carbon\Carbon::now()->format('Y-m-d')}} </span>
                        <span class="time">{{\Carbon\Carbon::now()->format('h:i A')}} </span>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 d-flex justify-content-end">
                        <a class="btn return" href="{{url('Dashboard')}}">
                            <i class="fa-solid fa-arrow-rotate-left"></i>
                        </a>
                    </div>
                </div>
                 <!-- -----------end  section 1-----------  -->
                <div class="row">
                    <div class="col-md-7 col-lg-7 col-12">
                         <!-- -----------this is section 2 "table"-----------  -->
                        <div class="box1">
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-12 col-lg-5 d-flex mb-4">
                                    <span class="span-box">
                                        <i class="fa-solid fa-user"></i>
                                     </span>
                                     <select name="client_id" class="js-example-basic-single form-control" style="width:100%" id="client_id">
                                         @foreach(\App\Models\Client::all() as $client)
                                             <option value="{{$client->id}}">{{$client->name}}</option>
                                         @endforeach
                                    </select>
                                    <span class="span-box">
                                            <!--begin::Add user-->
                                        <i class=" blue fa-solid fa-circle-plus"  class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                           data-bs-target="#exampleModalToggle"></i>
                                        </span>
                                </div>
                                <div class="col-md-7 col-lg-6 col-7 d-flex justify-content-end mb-4">
                                    <span>
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                     </span>
                                     <select name="" id="">
                                    </select>
                                    <span>
                                        <i class=" blue fa-solid fa-circle-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive" id="table-data">
                                    @include('admin.pos.item_table')
                                </div>

                            </div>
                        </div>
                        <!-- ---------- end section 2 "table" ---------- -->
                        <!-- ---------- this is total section ---------- -->
                        <div class="white">
                             <div class="row">
                                 <div class="col-md-4 col-12 col-lg-4 mb-3">
                                      <span class="text-capitalize">العدد :</span>
                                      <span id="itemCount">0</span>
                                 </div>
                                 <div class="col-md-8 col-12 col-lg-8 mb-3">
                                      <span class="text-capitalize">الاجمالي : </span>
                                      <span id="SubTotal">0</span>
                                 </div>
                             </div>
                        </div>
                    </div>
                    <!-- ---------- end total section ---------- -->

                    <!-- ---------- this is categories ---------- -->
                    <div class="col-md-5 col-lg-5 col-12">
                        <div class="box2">
                            <div class="my-4">
                                <select class="form-control js-example-basic-single category_id" name="category_id" >
                                    @foreach(\App\Models\Category::all() as $Cat)
                                        <option value="{{$Cat->id}}" >{{$Cat->ar_title}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="row scroll-y" id="post-data">
                            @include('admin.pos.posdata')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-lg-6 col-12">
                        <button type="submit" class="green">
                            <i class="fa-solid fa-money-bill-1"></i>
                            دفع
                        </button>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12 d-flex justify-content-end">
                        <p class="color-p">
                            اجمالي الفاتورة
                            <span class="d-block"id="total">0</span>
                        </p>
                    </div>
                </div>
            </div>




        </form>
        <div class="modal fade modal-lg	" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">اضافة عميل</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="" class="form" method="post"  enctype="multipart/form-data" action="{{url('store-clients')}}">
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
                                    <label class="required fw-bold fs-6 mb-2">الاسم</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           required/>
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">رقم الجوال </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="phone"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                    />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">العنوان</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="address"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                    />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->  <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2">الايميل</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="email"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                    />
                                    <!--end::Input-->
                                </div>

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

                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                    </div>
                </div>
            </div>
        </div>


            <div class="modal bs-edit-modal-lg" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">اختيار الحجم</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>










            <script src="{{asset('pos/assets/js/jquery-3.6.1.min.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="{{asset('pos/assets/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('pos/assets/js/script.js')}}"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            $(".category_id").change(function () {
                var category_id = $(this).val();
                if (category_id != '') {
                    $.ajax({
                        type: "GET",
                        url: "{{url('POSProducts')}}",
                        data: {'category_id': category_id

                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        },
                        success: function (data) {
                            $("#post-data").html(data);
                        }
                    })
                }
            });


        </script>
            <script>

                $(".add-item").click(function () {
                    var id = $(this).data('id');
                    var client_id = $('#client_id').val();
                    if (client_id != '') {
                        if (id != '') {
                            $.ajax({
                                type: "GET",
                                url: "{{url('getShapesPos')}}",
                                data: {
                                        'id': id,
                                },
                                error: function (xhr, status, error) {
                                    alert(xhr.responseText);
                                },
                                success: function (data) {
                                    $(".bs-edit-modal-lg .modal-body").html(data)
                                    $(".bs-edit-modal-lg").modal('show')
                                    $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                                        //   $('.bs-edit-modal-lg').empty();
                                            $('.bs-edit-modal-lg').hide();
                                    })

                                }
                            })
                        }
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: "عفوا!",
                            text: "يجب اختيار العميل اولا",
                            type: "error",
                            timer: 3000,
                            showConfirmButton: false
                        });

                    }
                });


                $(".addShape").click(function () {
                    var id = $(this).data('id');
                    $('.bs-edit-modal-lg').hide();
              //      $('.modal-backdrop').css('display','none');

                    var client_id = $('#client_id').val();
                    if (client_id != '') {
                        if (id != '') {
                            $.ajax({
                                type: "GET",
                                url: "{{url('add-item')}}",
                                data: {
                                    'id': id,
                                    client_id: client_id
                                },
                                error: function (xhr, status, error) {
                                    alert(xhr.responseText);
                                },
                                success: function (data) {
                                    $("#table-data").html(data);
                                    getData()
                                }
                            })
                        }
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: "عفوا!",
                            text: "يجب اختيار العميل اولا",
                            type: "error",
                            timer: 3000,
                            showConfirmButton: false
                        });

                    }
                });

                $(".delete").click(function () {
                    var id = $(this).data('id');
                    if (id != '')  {
                        Swal.fire({
                            title: "هل انت متاكد ",
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
                                    url: '{{url("delete-item")}}',
                                    type: "get",
                                    data: {'id': id, _token: CSRF_TOKEN},
                                    success: function (data) {
                                        console.log(data);
                                        Swal.fire("نجح   ", "تم الحذف  بنجاح", "success");
                                        $("#table-data").html(data);
                                        getData()
                                    },
                                    fail: function (xhrerrorThrown) {
                                        Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                                    }
                                });
                                // result.dismiss can be 'cancel', 'overlay',
                                // 'close', and 'timer'
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire("{{__('lang.Cancelled')}}", "{{__('lang.Message_Cancelled_Delete')}}", "error");
                            }
                        });
                    } else{
                        Swal.fire({
                            icon: 'error',
                            title: "عفوا!",
                            text: "عفوا حدث خطأ",
                            type: "error",
                            timer: 3000,
                            showConfirmButton: false
                        });

                    }
                });

                $(".update-count").click(function () {
                    var id = $(this).data('id');
                    var count= $('.inputcount-'+id).val();
                    alert(count);
                    if (id != '') {
                        $.ajax({
                            type: "GET",
                            url: "{{url('update-count')}}",
                            data: {
                                'id': id,
                                count: count
                            },
                            error: function (xhr, status, error) {
                                alert(xhr.responseText);
                            },
                            success: function (data) {
                                $("#table-data").html(data);
                                getData()

                            }
                        })
                    } else{
                        Swal.fire({
                            icon: 'error',
                            title: "عفوا!",
                            text: "يجب اختيار العميل اولا",
                            type: "error",
                            timer: 3000,
                            showConfirmButton: false
                        });

                    }
                });


                function getData() {
                    $.ajax({
                        type: "GET",
                        url: "{{url('getDataPos')}}",
                        data: {
                        },
                        error: function (xhr, status, error) {
                            alert(xhr.responseText);
                        },
                        success: function (data) {
                            $('#SubTotal').html(data['total_price'])
                            $('#total').html(data['total_price'])
                            $('#itemCount').html(data['count'])

                        }
                    })
                }


                getData()

            </script>


        </body>
    </html>
