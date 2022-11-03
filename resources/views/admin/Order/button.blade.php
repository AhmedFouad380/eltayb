<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="dt-buttons flex-wrap">

    <!--end::Filter-->
    <!--begin::Add user-->
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_user">
        <i class="bi bi-search fs-2x"></i>
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
                    <h2 class="fw-bolder">البحث</h2>
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
                    <form id="" class="form" enctype="multipart/form-data" method="get" >
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
                                <label class=" fw-bold fs-6 mb-2"> العميل</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control js-example-basic-single" name="user_id">
                                    <option value="0">الكل</option>
                                @foreach(\App\Models\User::all() as $user)
                                        <option @if(Request::get('user_id') == $user->id) selected @endif  value="{{$user->id}}">{{$user->name}} -
                                            {{$user->phone}} </option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2"> حالة الطلب</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" name="type">
                                    <option value="0">الكل</option>
                                    <option @if(Request::get('type') == 'preparing') selected @endif value="preparing">جاري التحضر</option>
                                    <option @if(Request::get('type') == 'on_way') selected @endif value="on_way">جاري التوصيل </option>
                                    <option @if(Request::get('type') == 'delivered') selected @endif value="delivered">تم التوصيل</option>
                                    <option @if(Request::get('type') == 'canceled') selected @endif value="canceled">تم الالغاء</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2"> نوع الدفع</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" name="payment_type">
                                    <option value="0">الكل</option>
                                    <option @if(Request::get('payment_type') == 'cash') selected @endif  value="cash">كاش</option>
                                    <option @if(Request::get('payment_type') == 'credit') selected @endif value="credit">فيزا</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2"> حالة الدفع</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" name="is_payed">
                                    <option value="3">الكل</option>
                                    <option @if(Request::get('is_payed') == 0) selected @endif  value="0">لم يتم الدفع</option>
                                    <option @if(Request::get('is_payed') == 1) selected @endif value="1">تم الدفع</option>
                                </select>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2"> من تاريخ </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <!--end::Input-->
                                <input type="date" name="from" class="form-control">
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2"> الى تاريخ</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="to" class="form-control">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">ألغاء
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                <span class="indicator-label">بحث</span>
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

<script type="text/javascript"
        src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws&language=ar'></script>
<script src="{{asset('admin/locationpicker.jquery.js')}}"></script>

<script>
    $('.dropify').dropify();

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            dropdownParent: $('.modal-body')
        });
    });

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
                        url: '{{url("delete-Order")}}',
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
