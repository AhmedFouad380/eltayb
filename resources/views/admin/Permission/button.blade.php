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
                    <form class="px-10" novalidate="novalidate" id="kt_form" method="post"
                          action="{{url('create-Permission')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{__('lang.name')}} <span style="color: red"> *</span>  </label>
                            <input type="text" class="form-control form-control-solid" required name="name"
                                   placeholder="{{__('lang.name')}}">
                        </div>
                        @foreach(\Spatie\Permission\Models\Permission::all() as $permission)

                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">{{ __('lang.'.$permission->name) }}
                                    </label>

                                    <input
                                        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                        name="permissions[]" type="checkbox"
                                        value="{{$permission->name}}" id="flexSwitchDefault"  />
                                </div>
                            </div>

                        @endforeach

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('lang.Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                        </div>
                        <!--begin: Wizard Step 1-->
                        <!--end: Wizard Step 1-->
                        <!--begin: Wizard Step 2-->
                        <!--end: Wizard Step 2-->
                        <!--begin: Wizard Step 3-->
                        <!--end: Wizard Step 3-->
                        <!--begin: Wizard Actions-->
                        <!--end: Wizard Actions-->
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
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor1' );
    $('.is_discount').on('click , change , keyup ',function () {
        var value = $(this).val();
        if(value == 'active'){
            $( "#discount_value" ).prop( "disabled", false );

// Enable #x
        }else{
            $( "#discount_value" ).prop( "disabled", false );

        }
    })
</script>
<script>
    $("#add-question").on("click", function () {
        $("#questions").append('<div class="row">' +
            '                                            <div class="col-3">' + '<label>السعر  </label>'+
            '                                                <input value="0" type="number" name="shape_price[]"' +
            '                                                       class="values form-control col-6 form-control-solid mb-3 mb-lg-0"' +
            '                                                       placeholder="" required/>' +
            '                                             </div>' +
            '                                            <div class="col-3"> <label> الاسم بالعربية </label>'  +
            '                                                <input type="text" name="shape_ar_title[]"' +
            '                                                       class=" form-control col-6 form-control-solid mb-3 mb-lg-0"' +
            '                                                       placeholder="" required/>' +
            '                                            </div>' +
            '                                            <div class="col-3"> <label> الاسم بالانجليزية </label>'  +
            '                                                <input type="text" name="shape_en_title[]"' +
            '                                                       class=" form-control col-6 form-control-solid mb-3 mb-lg-0"' +
            '                                                       placeholder="" required/>' +
            '                                            </div>' +
            '                                            <div class="col-3">' +
            '                                                     <button type="button"' +
            '                                                        class="btn btn-light-danger me-3 delete_question">' +
            '                                                    <i class="bi bi-trash-fill fs-2x fs-2x"></i>' +
            '                                                </button>' +
            '                                             </div>' +
            '                                        </div>');
    });

    $(document).on('click', '.delete_question', function () {
        $(this).parent().parent().remove();
    });
</script>

<script>
    $("#add-question2").on("click", function () {
        $("#questions2").append('<div class="row">' +
            '                                            <div class="col-3">' + '<label>السعر  </label>'+
            '                                                <input value="0" type="number" name="addition_price[]"' +
            '                                                       class="values form-control col-6 form-control-solid mb-3 mb-lg-0"' +
            '                                                       placeholder="" required/>' +
            '                                             </div>' +
            '                                            <div class="col-3"> <label> الاسم بالعربية </label>'  +
            '                                                <input type="text" name="addition_ar_title[]"' +
            '                                                       class=" form-control col-6 form-control-solid mb-3 mb-lg-0"' +
            '                                                       placeholder="" required/>' +
            '                                            </div>' +
            '                                            <div class="col-3"> <label> الاسم بالانجليزية </label>'  +
            '                                                <input type="text" name="addition_en_title[]"' +
            '                                                       class=" form-control col-6 form-control-solid mb-3 mb-lg-0"' +
            '                                                       placeholder="" required/>' +
            '                                            </div>' +
            '                                            <div class="col-3">' +
            '                                                     <button type="button"' +
            '                                                        class="btn btn-light-danger me-3 delete_question">' +
            '                                                    <i class="bi bi-trash-fill fs-2x fs-2x"></i>' +
            '                                                </button>' +
            '                                             </div>' +
            '                                        </div>');
    });

    $(document).on('click', '.delete_question', function () {
        $(this).parent().parent().remove();
    });
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
                        url: '{{url("delete-Categories")}}',
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
                  
