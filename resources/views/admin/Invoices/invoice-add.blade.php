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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات السندات</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تعديل بيانات السندات</li>
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
                        <h3 class="fw-bolder m-0">تعديل بيانات السندات</h3>
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
                                <div class="col-md-6 col-xl-4">
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
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <label class=" fw-bold fs-6 mb-2"> اختار التاريخ </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!--end::Input-->
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
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
                                <div class="col-md-6 col-xl-4">
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


                        <div class="card-body pt-5">
                            <div class="row g-6 g-xl-9 ">
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <label class="required fw-bold fs-6 mb-2">اختار المنتج </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-select form-control-solid mb-3 mb-lg-0" id="js-example-basic-products" name="supplier_id"
                                        >
                                            @inject('products','App\Models\Product')
                                            @foreach($products->all() as $product)
                                                <option value="{{$product->id}}">{{$product->ar_title}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">سعر الشراء</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="purchase_price"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="سعر الشراء" value="{{old('notes')}}" />
                                        <!--end::Input-->

                                    </div>

                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Label-->
                                        <label class="required fw-bold fs-6 mb-2">سعر البيع</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="sell_price"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="سعر الشراء" value="{{old('notes')}}" />
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
            $('#js-example-basic-products').select2({});
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
    </script>

@endsection

