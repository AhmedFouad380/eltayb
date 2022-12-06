@extends('admin.layouts.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">اضافة فاتورة شراء</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">اضافة فاتورة شراء</li>
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
                        <h3 class="fw-bolder m-0">اضافة فاتورة شراء</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show" style="margin-left: 30px;margin-right: 30px;">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-receipts')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->


                        <div class="card-body pt-5">
                            <div class="row g-6 g-xl-9 ">
                                <div class="col-md-4 col-xl-3">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <label class="required fw-bold fs-6 mb-2">اسم المورد </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-select form-control-solid mb-3 mb-lg-0" id="js-example-basic-single" name="supplier_id"
                                        >
                                            @inject('suppliers','App\Models\Supplier')
                                            @foreach($suppliers->all() as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-4 col-xl-3">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <label class=" fw-bold fs-6 mb-2">  التاريخ </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!--end::Input-->
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-3">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <label class="required fw-bold fs-6 mb-2">نوع الفاتورة</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid mb-3 mb-lg-0" name="type"
                                                required
                                                disabled
                                        >
                                            @foreach(config('enum.invoice_type') as $key => $value)
                                                <option value="{{ $key }}" @if($type === $key) selected @endif >
                                                    {{ $value }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-3">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <label class="required fw-bold fs-6 mb-2">اختار الفرع</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid mb-3 mb-lg-0" name="branch_id" id="js-example-basic-branch"

                                        >
                                            @inject('branches','App\Models\Branch')
                                            @foreach($branches->all() as $branch)
                                                <option value="{{$branch->id}}">{{$branch->ar_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="separator"></div>

                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                             data-bs-target="#kt_account_profile_details" aria-expanded="true"
                             aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">اضافة بيانات الفاتورة</h3>
                            </div>
                            <!--end::Card title-->
                        </div>

                        <!--end::Input group-->
                        <div class="d-flex flex-column fv-row mb-7 " id="questions" style="display: none">
                            <div class="row">
                                <!--begin::Label-->
                                <label> اضافة منتج </label>
                                <br>
                                <div class="col-3">
                                    <button type="button" id="add-question"
                                            class="btn btn-light-primary me-3">
                                        <i class="bi bi-plus-circle-fill fs-2x"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row g-6 g-xl-9 ">
                                    <div class="col-md-6 col-xl-2">
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <label class="required fw-bold fs-6 mb-2">اختار المنتج </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 product_id"  data-num="1" id="js-example-basic-products" name="product_id[]"
                                            >
                                                @inject('products','App\Models\Product')
                                                @foreach($products->all() as $product)
                                                    <option value="{{$product->id}}">{{$product->ar_title}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>
                                    <div class="col-md-6 col-xl-2">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">الاحجام </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control" id="shape1" name="shape_id" id="shape_id[]" >
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-6 col-xl-2">
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">سعر الشراء</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="purchase_price[]"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="سعر الشراء" value="{{old('notes')}}" />
                                            <!--end::Input-->

                                        </div>

                                    </div>
                                    <div class="col-md-6 col-xl-2">
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">سعر البيع</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="sell_price[]"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="سعر الشراء" value="{{old('notes')}}" />
                                            <!--end::Input-->

                                        </div>

                                    </div>

                                    <div class="col-md-6 col-xl-2">
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الكمية</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="quantity[]"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الكمية" value="{{old('quantity')}}" />
                                            <!--end::Input-->

                                        </div>

                                    </div>
                                    <div class="col-md-6 col-xl-2">
                                        <div class="card card-xl-stretch mb-xl-8">

                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <label class="form-check-label" for="flexSwitchDefault">مفعل
                                                    ؟</label>
                                                <input class="form-check-input" name="is_active[]" type="hidden"
                                                       value="inactive" id="flexSwitchDefault"/>
                                                <input
                                                    class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                    name="is_active" type="checkbox"
                                                    value="active" id="flexSwitchDefault" checked/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--end::Input-->
                        </div>


                        <div class="separator"></div>

                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                             data-bs-target="#kt_account_profile_details" aria-expanded="true"
                             aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">بيانات اخرى للفاتورة</h3>
                            </div>
                            <!--end::Card title-->
                        </div>

                        <!--end::Input group-->
                        <div class="card-body pt-5">
                            <div class="row g-6 g-xl-9 ">

                                <div class="col-md-6 col-xl-2">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2"> ضريبة مضافة</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="tax"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="ضريبة مضافة" value="{{old('tax')}}" />
                                        <!--end::Input-->

                                    </div>

                                </div>
                                <div class="col-md-6 col-xl-2">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">مصاريف توصيل</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="delivery_fees"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="مصاريف توصيل" value="{{old('delivery_fees')}}" />
                                        <!--end::Input-->

                                    </div>

                                </div>
                                <div class="col-md-6 col-xl-2">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">خصم</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="discount"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="خصم" value="{{old('discount')}}" />
                                        <!--end::Input-->

                                    </div>

                                </div>

                            </div>

                        </div>



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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var num = 2;
        $("#add-question").on("click", function () {
            $.ajax({
                type: "GET",
                url: "{{url('addInvoiceDetailRow')}}",
                data: {"num": num},
                success: function (data) {
                    $("#questions").append(data);
                    num++;
                }
            })

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
    <script>
        $(document).ready(function() {
            $('#js-example-basic-single').select2({});
            $('#js-example-basic-branch').select2({});
            // $('#js-example-basic-products').select2({});
        });
        $("#payment_type").change(function () {
            var type = $(this).val();
            if($(this).val() == 'bank_transfer'){
                document.getElementById('transfer_number').style.display = 'block';
                document.getElementById('cheque_number').style.display = 'none';

            }else if($(this).val() == 'cheque'){
                document.getElementById('transfer_number').style.display = 'none';
                document.getElementById('cheque_number').style.display = 'block';
            }else{
                document.getElementById('transfer_number').style.display = 'none';
                document.getElementById('cheque_number').style.display = 'none';
            }
        });

        $(".product_id").change(function () {
            var wahda = $(this).val();
            var num = $(this).data('num');
            if (wahda != '') {
                $.get("{{ URL::to('/get-Shapes')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    $.each($data, function (title, id) {
                        console.log(title)
                        outs += '<option value="' + id + '">' + title + '</option>'
                    });
                    $('#shape'+num).html(outs);

                    });
            }
        });
    </script>

@endsection

