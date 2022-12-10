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
                                <form id="invoice_form" class="form"   enctype="multipart/form-data" >
                                @csrf
                                <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                         id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                         data-kt-scroll-activate="{default: false, lg: true}"
                                         data-kt-scroll-max-height="auto"
                                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                         data-kt-scroll-offset="300px">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">اختار المنتج </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select form-control-solid mb-3 mb-lg-0 js-example-basic-products product_id"  id="product_id" data-num="1" id="js-example-basic-products" name="product_id"
                                            >
                                                @inject('products','App\Models\Product')
                                                @foreach($products->all() as $product)
                                                    <option value="{{$product->id}}">{{$product->ar_title}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="fv-row mb-7 " id="units_id">
                                            <label class="required fw-bold fs-6 mb-2">الوحدة</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->



                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الاحجام </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control" name="shape_id" id="shape_id" >
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        @if($type == 'income')
                                        <div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">سعر الشراء</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" step="0.001" name="purchase_price"
                                                   class="form-control form-control-solid mb-3 mb-lg-0 purchase_price"
                                                   placeholder="سعر الشراء" value="{{old('notes')}}" id="purchase_price"/>
                                            <!--end::Input-->


                                        </div>
                                        @endif
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">سعر البيع</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" step="0.001" name="sell_price"
                                                   id="sell_price"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="سعر الشراء" value="{{old('notes')}}" />
                                            <!--end::Input-->


                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الكمية</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" name="quantity"
                                                   class="form-control form-control-solid mb-3 mb-lg-0 quantity"
                                                   placeholder="الكمية" id="quantity" />
                                            <!--end::Input-->

                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">السعر الاجمالى</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" step="0.001"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="السعر الاجمالى" id="total_price"
                                                   disabled/>
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

                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show" style="margin-left: 30px;margin-right: 30px;">
                    <!--begin::Form-->
                    <form id="" enctype="multipart/form-data" action="{{url('store-invoices')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->


                        <div class="card-body pt-5">
                            <div class="row g-6 g-xl-9 ">
                                @if($type == 'income')

                                <div class="col-md-4 col-xl-3">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <label class="required fw-bold fs-6 mb-2">اسم المورد </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-select form-control-solid mb-3 mb-lg-0" id="js-example-basic-single" name="supplier_id"
                                        >
                                            <option value="">اختار المورد</option>

                                            @inject('suppliers','App\Models\Supplier')
                                            @foreach($suppliers->all() as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                @else
                                    <div class="col-md-4 col-xl-3">
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <label class="required fw-bold fs-6 mb-2">اسم العميل </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select form-control-solid mb-3 mb-lg-0" id="js-example-basic-single" name="supplier_id"
                                            >
                                                <option value="">اختار العميل</option>

                                                @inject('clients','App\Models\Client')
                                                @foreach($clients->all() as $client)
                                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-xl-3">
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <label class="required fw-bold fs-6 mb-2">اسم مستخدم الموقع </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select form-control-solid mb-3 mb-lg-0" id="js-example-basic-single" name="supplier_id"
                                            >
                                                <option value="">اختار مستخدم الموقع</option>

                                                @inject('users','App\Models\User')
                                                @foreach($users->all() as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                @endif
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


                        <!--end::Input group-->
                        <div class="d-flex flex-column fv-row mb-7 " id="" style="display: none">


                            <div class="row g-6 g-xl-9">
                                <div class="card mb-5">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-3 mb-1">اضافة منتجات الفاتورة</span>
                                            <span class="text-muted mt-1 fw-bold fs-7"></span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <a class="btn btn-light-primary me-3"  data-bs-toggle="modal"
                                               data-bs-target="#kt_modal_add_user">
                                                اضافة فاتورة
                                                <i class="bi bi-plus-circle-fill fs-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-3">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-4" id="users_table">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fw-bolder text-muted bg-light">
                                                    <th class="min-w-30px">م</th>
                                                    <th class="min-w-125px">اسم المنتج</th>
                                                    <th class="min-w-100px">الحجم</th>
                                                    <th class="min-w-100px">الوحدة</th>
                                                    <th class="min-w-100px">العدد</th>
                                                    @if($type == 'income')
                                                    <th class="min-w-100px">سعر الشراء</th>
                                                    @else
                                                        <th class="min-w-100px">سعر البيع</th>
                                                    @endif
                                                        <th class="min-w-100px">الاجمالي</th>
                                                    <th class="min-w-150px">الملاحظات</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody id="questions">

                                                </tbody>
                                                {{--<tfoot>
                                                @if(isset($data->coupon))
                                                    <tr style="color:red!important;">
                                                        <th colspan="4"> </th>
                                                        <th colspan="1">  كود الخصم  : {{$data->coupon->name}}</th>
                                                        <th colspan="2" > {{$data->coupon_percent}} - </th>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <th colspan="4"> </th>
                                                    <th colspan="1">الضرائب </th>
                                                    <th colspan="2">{{$data->tax}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"> </th>
                                                    <th colspan="1">خدمة توصيل </th>
                                                    <th colspan="2">{{$data->delivery_fees}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"> </th>
                                                    <th colspan="1">اجمالي الفاتورة </th>
                                                    <th colspan="2">{{$data->total_price + $data->tax + $data->delivery_cost   }}</th>
                                                </tr>
                                                </tfoot>--}}
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--begin::Body-->
                                </div>
                            </div>
                            <div class="separator"></div>


                            <!--end::Input-->
                        </div>

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
                                        <input type="number" step="0.001" name="tax"
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
                                        <input type="number" step="0.001" name="delivery_fees"
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
                                        <input type="number" step="0.001" name="discount"
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
        $(document).ready(function() {
            $('#js-example-basic-single').select2({});
            $('#js-example-basic-branch').select2({});
            $('.js-example-basic-products').select2({
                dropdownParent: $("#kt_modal_add_user")
            });


        });
        $("#invoice_form").on("submit", function (e) {
            e.preventDefault();
            var product_id = $('#product_id').val();
            var shape_id = $('#shape_id').val();
            var sell_price = $('#sell_price').val();
            var purchase_price = $('#purchase_price').val();
            var quantity = $('#quantity').val();
            var total_price = $('#total_price').val();
            var add_to_storage = $('.add_to_storage').val();
            var unit_id = $('#unit_id').val();
            $.ajax({
                type: "GET",
                url: "{{url('addInvoiceDetailRow1')}}",
                data: {'product_id': product_id,'shape_id':shape_id,'sell_price':sell_price,'purchase_price':purchase_price
                    ,'quantity':quantity
                    ,'unit_id':unit_id
                    ,'add_to_storage':add_to_storage
                    ,'total_price':total_price
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                },
                success: function (data) {
                    $('#kt_modal_add_user').modal('toggle');
                    $('#invoice_form').trigger("reset");
                    $("#questions").append(data);

                }
            })

        });
        @if($type == 'income')
        $("#quantity").on('click , change ,keyup',function() {
            var  quantity = $(this).val();
            var   purchase_price= $('#purchase_price').val();
            var total = quantity * purchase_price;
            document.getElementById("total_price").value = total;


        })
        $("#purchase_price").on('click , change ,keyup',function() {
            var  quantity = $(this).val();
            var   purchase_price= $('#quantity').val();
            var total = quantity * purchase_price;
            document.getElementById("total_price").value = total;


        })
        @else
        $("#quantity").on('click , change ,keyup',function() {
            var  quantity = $(this).val();
            var   purchase_price= $('#sell_price').val();
            var total = quantity * purchase_price;
            document.getElementById("total_price").value = total;


        })
        $("#sell_price").on('click , change ,keyup',function() {
            var  quantity = $(this).val();
            var   purchase_price= $('#quantity').val();
            var total = quantity * purchase_price;
            document.getElementById("total_price").value = total;


        })
        @endif


        $(document).on('click', '.delete_question', function () {
            $(this).parent().parent().remove();
        });
    </script>

    <script>

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
                    $('#shape_id').html(outs);

                    });
                $.get("{{ url('/get-products')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    console.log($data)
                    outs += '<label class="required fw-bold fs-6 mb-2">الوحدة</label>' +
                        '<input value="'+$data+'" type="text"' +
                        'class="form-control form-control-solid mb-3 mb-lg-0 purchase_price" id="unit_id" disabled>'
                    $('#units_id').html(outs);

                });
            }
        });

    </script>

@endsection

